<?php session_start();

include('db.php');
include_once('mantenimiento_access.php');

$id = isset($_REQUEST['id']) ? (int) $_REQUEST['id'] : 0;
$id_usuario = isset($_SESSION['admin_intecap']) ? (int) $_SESSION['admin_intecap'] : 0;
$stmt = $conn->prepare('SELECT id_mantenimiento FROM comentarios WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$comentario = $stmt->get_result()->fetch_assoc();
$stmt->close();
$id_mantenimiento = $comentario ? (int) $comentario['id_mantenimiento'] : 0;

if ($id_usuario <= 0 || $id_mantenimiento <= 0 || !usuarioPuedeAccederConversacionMantenimiento($conn, $id_mantenimiento, $id_usuario)) {
    http_response_code(403);
    exit('No tienes permiso para eliminar este comentario.');
}

$stmt = $conn->prepare('DELETE FROM comentarios WHERE id = ?');
$stmt->bind_param('i', $id);
$stmt->execute();
$stmt->close();
header('Location: ../vistas/ADMIN/COMENTARIOS.php?id=' . $id_mantenimiento);
exit;
?>