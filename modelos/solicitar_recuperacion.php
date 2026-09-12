<?php
include('db.php');
include('password_helper.php');
session_start();

$volver = '../vistas/LOGIN/recuperacion de contraseña.php';

$nom_usuario = trim($_POST['nom_usuario'] ?? '');
$correo      = trim($_POST['correo'] ?? '');

if ($nom_usuario === '' || $correo === '') {
    echo "<script>alert('Debes ingresar tu usuario y tu correo.');</script>";
    echo "<script>document.location='$volver'</script>";
    exit;
}

$stmt = $conn->prepare("SELECT id, nombre, correo FROM usuario WHERE nom_usuario = ?");
$stmt->bind_param("s", $nom_usuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows !== 1) {
    $stmt->close();
    echo "<script>alert('No se encontró ningún usuario con ese nombre de usuario.');</script>";
    echo "<script>document.location='$volver'</script>";
    exit;
}

$usuario = $resultado->fetch_assoc();
$stmt->close();

$correoReal = trim((string) ($usuario['correo'] ?? ''));
if ($correoReal === '' || strcasecmp($correo, $correoReal) !== 0) {
    echo "<script>alert('El correo ingresado no coincide con el correo registrado para este usuario.');</script>";
    echo "<script>document.location='$volver'</script>";
    exit;
}

asegurarColumnaPasswordTemporal($conn);

$alfabeto = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz23456789';
$passwordTemporal = '';
for ($i = 0; $i < 12; $i++) {
    $passwordTemporal .= $alfabeto[random_int(0, strlen($alfabeto) - 1)];
}

$hash = hashPasswordSeguro($passwordTemporal);
$stmtUpdate = $conn->prepare(
    "UPDATE usuario SET password = ?, password_temporal = 1 WHERE id = ?"
);
$idUsuario = (int) $usuario['id'];
$stmtUpdate->bind_param("si", $hash, $idUsuario);
$stmtUpdate->execute();
$stmtUpdate->close();

$_SESSION['password_temporal_generada'] = $passwordTemporal;
$_SESSION['usuario_password_temporal'] = $nom_usuario;
header('location: ../vistas/LOGIN/mostrar_contrasena_temporal.php');
exit;