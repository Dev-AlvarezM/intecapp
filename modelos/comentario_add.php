<?php
if (session_status() === PHP_SESSION_NONE) session_start();
include('db.php');
include_once('mantenimiento_access.php');
include_once('comentario_schema.php');

$id_mantenimiento = isset($_POST['id_mantenimiento']) ? (int) $_POST['id_mantenimiento'] : 0;
$Comentario = isset($_POST['Comentario']) ? trim($_POST['Comentario']) : '';
$id_usuario = isset($_SESSION['admin_intecap']) ? (int) $_SESSION['admin_intecap'] : 0;

if ($id_usuario <= 0 || $id_mantenimiento <= 0 || !usuarioPuedeAccederConversacionMantenimiento($conn, $id_mantenimiento, $id_usuario)) {
    http_response_code(403);
    exit('No tienes permiso para responder en esta conversación.');
}

if ($Comentario === '') {
    $_SESSION['comentario_error'] = 'No se puede enviar un comentario en blanco.';
    header('Location: ../vistas/ADMIN/COMENTARIOS.php?id=' . $id_mantenimiento);
    exit;
}

asegurarColumnaUsuarioComentario($conn);
$Comentario = substr($Comentario, 0, 150);
$stmt = $conn->prepare('INSERT INTO comentarios (id_mantenimiento, Comentario, id_usuario) VALUES (?, ?, ?)');
$stmt->bind_param('isi', $id_mantenimiento, $Comentario, $id_usuario);
$stmt->execute();
$stmt->close();

header('Location: ../vistas/ADMIN/COMENTARIOS.php?id=' . $id_mantenimiento);
exit;

?>
