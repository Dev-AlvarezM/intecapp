<?php
include('db.php');
if (session_status() === PHP_SESSION_NONE) session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/intecapp/controladores/session.php');

if(isset($_REQUEST['id'])){
    $id = (int) $_REQUEST['id'];
} else {
    $id = (int) $_POST['id'];
}

if (!in_array($user['cargo'], ['Admin', 'Instructor'], true)) {
    http_response_code(403);
    echo 'Acceso denegado';
    exit;
}

$sql = "SELECT * FROM talleres WHERE id = $id";
if ($user['cargo'] === 'Instructor') {
    $sql .= " AND id_instructor = " . (int) $user['id'];
}
$query = $conn->query($sql);
$row = $query->fetch_assoc();

if (!$row) {
    http_response_code(404);
    echo 'Taller no encontrado';
    exit;
}

?>
