<?php
//session_start();
include('db.php');

if (session_status() === PHP_SESSION_NONE) session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/intecapp/controladores/session.php');

if(isset($_REQUEST['id'])){
    $id = (int) $_REQUEST['id'];
} else {
    $id = (int) $_POST['id'];
}

$sql = "SELECT * FROM mantenimiento WHERE id = $id";
$query = $conn->query($sql);
$row = $query->fetch_assoc();

if (!$row) {
    http_response_code(404);
    echo 'No existe el mantenimiento';
    exit;
}

// Permisos: sólo Admin, el encargado asignado o quien lo solicitó pueden ver este registro
if ($user['cargo'] !== 'Admin' && (int)$row['id_encargado'] !== (int)$id_sesion && (int)$row['id_solicitante'] !== (int)$id_sesion) {
    http_response_code(403);
    echo 'Acceso denegado';
    exit;
}

?>