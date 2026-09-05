<?php
//session_start();
include('db.php');

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

$instructorValue = $id_instructor > 0 ? "$id_instructor" : "NULL";

mysqli_query($conn, "UPDATE talleres SET anio = '$anio', nombre_taller = '$nombre_taller', id_instructor = $instructorValue, participantes = '$participantes', condicion = '$condicion' WHERE id = '$id' ") or die(mysqli_error($conn));

echo "<script type='text/javascript'>alert('Registro actualizado correctamente.');</script>";
echo "<script>document.location='../vistas/ADMIN/TALLERES.php'</script>";
?>
