<?php
session_start();
include('db.php');
include('password_helper.php');

if (!isset($_SESSION['admin_intecap'])) {
    header('location: ../index.php');
    exit;
}

$password = $_POST['password'] ?? '';
$password1 = $_POST['password1'] ?? '';

if ($password === '' || strlen($password) < 8 || $password !== $password1) {
    echo "<script>alert('Las contraseñas deben coincidir y tener al menos 8 caracteres.'); history.back();</script>";
    exit;
}

asegurarColumnaPasswordTemporal($conn);
$hash = hashPasswordSeguro($password);
$idUsuario = (int) $_SESSION['admin_intecap'];
$stmt = $conn->prepare(
    "UPDATE usuario SET password = ?, password_temporal = 0 WHERE id = ?"
);
$stmt->bind_param("si", $hash, $idUsuario);
$stmt->execute();
$stmt->close();

session_regenerate_id(true);
unset($_SESSION['password_temporal']);
header('location: ../index.php');
exit;
