<?php
include('db.php');
if (session_status() === PHP_SESSION_NONE) session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/intecapp/controladores/session.php');

if (!in_array($user['cargo'], ['Admin', 'Instructor'], true)) {
    http_response_code(403);
    exit('Acceso denegado');
}

$checkCol = $conn->query("SHOW COLUMNS FROM talleres LIKE 'id_instructor'");
if ($checkCol && $checkCol->num_rows === 0) {
   $conn->query("ALTER TABLE talleres ADD COLUMN id_instructor INT NULL AFTER anio");
}

$id = $_POST["id"];
$anio = $_POST["anio"];
$nombre_taller = $_POST['nombre_taller'];
$participantes = $_POST['participantes'];
$condicion = $_POST['condicion'];
$id_instructor = isset($_POST['id_instructor']) ? (int) $_POST['id_instructor'] : 0;

if ($user['cargo'] === 'Instructor') {
    $id_instructor = (int) $user['id'];
} else {
    $id_instructor = $id_instructor > 0 ? $id_instructor : null;
}
$whereOwnership = $user['cargo'] === 'Instructor'
    ? ' AND id_instructor = ' . (int) $user['id']
    : '';
$stmt = $conn->prepare("UPDATE talleres
    SET anio = ?, nombre_taller = ?, id_instructor = ?, participantes = ?, condicion = ?
    WHERE id = ?$whereOwnership");
$stmt->bind_param("ssissi", $anio, $nombre_taller, $id_instructor, $participantes, $condicion, $id);

if (!$stmt->execute()) {
    $error = htmlspecialchars($stmt->error, ENT_QUOTES, 'UTF-8');
    $stmt->close();
    exit('Error al actualizar el taller: ' . $error);
}

$stmt->close();
echo "<script type='text/javascript'>alert('Registro actualizado correctamente.');</script>";
echo "<script>document.location='../vistas/ADMIN/TALLERES.php'</script>";
?>
