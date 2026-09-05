<?php
/**
 * Paso 2 de la recuperación de contraseña.
 *
 * CAMBIO respecto a la versión anterior:
 *  Antes se validaba el token contra la tabla `recuperacion_password`
 *  (columnas token / expira / usado). Ahora el token es un JWT que se
 *  autovalida (firma + expiración) y el "single use" se logra
 *  comparando un fragmento del hash de la contraseña actual guardado
 *  dentro del propio token: si ya cambiaste la contraseña con ese
 *  enlace (o de cualquier otra forma), el token deja de ser válido
 *  aunque todavía no haya expirado.
 */

include('db.php');
include('password_helper.php');
include('jwt_helper.php');

$volverError = function ($mensaje) {
    echo "<script type='text/javascript'>alert('" . addslashes($mensaje) . "');</script>";
    echo "<script>document.location='../index.php'</script>";
    exit;
};

$token       = $_POST['token']        ?? '';
$password  = $_POST['password']   ?? '';
$password1 = $_POST['password1']  ?? '';

if ($token === '') {
    $volverError('Enlace inválido.');
}

if ($password === '' || $password !== $password1) {
    echo "<script type='text/javascript'>alert('Las contraseñas no coinciden.');</script>";
    echo "<script>document.location='../vistas/LOGIN/restablecer_contrasena.php?token=" . urlencode($token) . "'</script>";
    exit;
}

$payload = verificarJWT($token, JWT_SECRET);

if ($payload === null || !isset($payload['uid'], $payload['phv'])) {
    $volverError('El enlace de recuperación no es válido o ya expiró. Solicita uno nuevo.');
}

$idUsuario = (int) $payload['uid'];

// Confirmar que la contraseña no haya cambiado desde que se generó el link
// (esto reemplaza la columna "usado" de la tabla vieja).
$stmt = $conn->prepare("SELECT password FROM usuario WHERE id = ?");
$stmt->bind_param("i", $idUsuario);
$stmt->execute();
$fila = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$fila || substr($fila['password'], 0, 12) !== $payload['phv']) {
    $volverError('Este enlace ya fue utilizado o ya no es válido. Solicita uno nuevo.');
}

// Encriptar la nueva contraseña con hash seguro (bcrypt)
$pass = hashPasswordSeguro($password);

$stmtUpdate = $conn->prepare("UPDATE usuario SET password = ? WHERE id = ?");
$stmtUpdate->bind_param("si", $pass, $idUsuario);
$stmtUpdate->execute();
$stmtUpdate->close();

echo "<script>document.location='../vistas/LOGIN/cambio de contraseña.html'</script>";