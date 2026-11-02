<?php
include('db.php');
if (session_status() === PHP_SESSION_NONE) session_start();
include(__DIR__ . '/../controladores/session.php');

$checkCol = $conn->query("SHOW COLUMNS FROM talleres LIKE 'id_instructor'");
if ($checkCol && $checkCol->num_rows === 0) {
    $conn->query("ALTER TABLE talleres ADD COLUMN id_instructor INT NULL AFTER anio");
}

$anio = $_POST["anio"];
$nombre_taller = $_POST['nombre_taller'];
$participantes = (int) $_POST['participantes'];
$condicion = $_POST['condicion'];
$mobiliario = $_POST['mobiliario'] ?? '';
$id_instructor = isset($_POST['nom_instructor']) ? (int) $_POST['nom_instructor'] : 0;
if ($user['cargo'] === 'Instructor') {
    $id_instructor = (int) $user['id'];
}
$id_instructor = $id_instructor > 0 ? $id_instructor : null;
$estado = 'Disponible';

$stmt = $conn->prepare("INSERT INTO talleres
    (anio, nombre_taller, id_instructor, participantes, condicion, mobiliario, estado)
    VALUES (?, ?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    http_response_code(500);
    exit('Error al preparar el registro del taller: ' . htmlspecialchars($conn->error, ENT_QUOTES, 'UTF-8'));
}

$stmt->bind_param("ssiisss", $anio, $nombre_taller, $id_instructor, $participantes, $condicion, $mobiliario, $estado);
if (!$stmt->execute()) {
    $error = htmlspecialchars($stmt->error, ENT_QUOTES, 'UTF-8');
    $stmt->close();
    http_response_code(500);
    exit('Error al guardar el taller: ' . $error);
}

$stmt->close();

echo "<script>document.location='../vistas/ADMIN/TALLERES.php'</script>";
