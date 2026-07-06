<?php
/**
 * Paso 2 de la recuperación de contraseña.
 *
 * Ya NO cambia la contraseña solo con el nombre de usuario (eso permitía
 * que cualquiera cambiara la contraseña de cualquiera). Ahora exige un
 * token válido, no usado y no vencido, generado en solicitar_recuperacion.php
 * y entregado únicamente por correo al dueño real de la cuenta.
 */

include('db.php');

$volverError = function ($mensaje) {
    echo "<script type='text/javascript'>alert('" . addslashes($mensaje) . "');</script>";
    echo "<script>document.location='../index.php'</script>";
    exit;
};

$token       = $_POST['token']        ?? '';
$contraseña  = $_POST['contraseña']   ?? '';
$contraseña1 = $_POST['contraseña1']  ?? '';

if ($token === '') {
    $volverError('Enlace inválido.');
}

if ($contraseña === '' || $contraseña !== $contraseña1) {
    echo "<script type='text/javascript'>alert('Las contraseñas no coinciden.');</script>";
    echo "<script>document.location='../vistas/LOGIN/restablecer_contrasena.php?token=" . urlencode($token) . "'</script>";
    exit;
}

$stmt = $conn->prepare("SELECT id_usuario, expira, usado FROM recuperacion_password WHERE token = ?");
$stmt->bind_param("s", $token);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows !== 1) {
    $stmt->close();
    $volverError('El enlace de recuperación no es válido.');
}

$fila = $resultado->fetch_assoc();
$stmt->close();

if ((int) $fila['usado'] === 1) {
    $volverError('Este enlace ya fue utilizado. Solicita uno nuevo.');
}

if (strtotime($fila['expira']) < time()) {
    $volverError('Este enlace ya expiró. Solicita uno nuevo.');
}

$idUsuario = (int) $fila['id_usuario'];

// Encriptar la nueva contraseña (mismo esquema usado en el resto del sistema)
$salt = "a1Bz20ydqelm8m1wql";
$pass = $salt . md5($contraseña);

$stmtUpdate = $conn->prepare("UPDATE usuario SET contraseña = ? WHERE id = ?");
$stmtUpdate->bind_param("si", $pass, $idUsuario);
$stmtUpdate->execute();
$stmtUpdate->close();

// Invalidar el token para que no se pueda volver a usar.
$stmtUsado = $conn->prepare("UPDATE recuperacion_password SET usado = 1 WHERE token = ?");
$stmtUsado->bind_param("s", $token);
$stmtUsado->execute();
$stmtUsado->close();

echo "<script>document.location='../vistas/LOGIN/cambio de contraseña.html'</script>";