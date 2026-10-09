<?php
// Inicia la sesión para verificar que el usuario esté autenticado.
session_start();
include('db.php');
include('password_helper.php');

// Si no existe sesión del administrador, se redirige al inicio de sesión.
if (!isset($_SESSION['admin_intecap'])) {
    header('location: ../index.php');
    exit;
}

// Obtiene la nueva contraseña y su confirmación desde el formulario.
$password = $_POST['password'] ?? '';
$password1 = $_POST['password1'] ?? '';

// Verifica que la contraseña cumpla con la longitud mínima y que ambas coincidan.
if ($password === '' || strlen($password) < 8 || $password !== $password1) {
    echo "<script>alert('Las contraseñas deben coincidir y tener al menos 8 caracteres.'); history.back();</script>";
    exit;
}

// Asegura que la columna de contraseña temporal exista antes de usarla.
asegurarColumnaPasswordTemporal($conn);

// Genera un hash seguro para guardar la contraseña en la base de datos.
$hash = hashPasswordSeguro($password);
$idUsuario = (int) $_SESSION['admin_intecap'];

// Actualiza la contraseña del usuario y marca que ya no es temporal.
$stmt = $conn->prepare(
    "UPDATE usuario SET password = ?, password_temporal = 0 WHERE id = ?"
);
$stmt->bind_param("si", $hash, $idUsuario);
$stmt->execute();
$stmt->close();

// Regenera la sesión para evitar fijación de la sesión y elimina la bandera temporal.
session_regenerate_id(true);
unset($_SESSION['password_temporal']);

// Redirige final al inicio tras cambiar la contraseña correctamente.
header('location: ../index.php');
exit;
