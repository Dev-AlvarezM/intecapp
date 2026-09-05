<?php
//session_start();
include('db.php');

$checkCol = $conn->query("SHOW COLUMNS FROM talleres LIKE 'id_instructor'");
if ($checkCol && $checkCol->num_rows === 0) {
    $conn->query("ALTER TABLE talleres ADD COLUMN id_instructor INT NULL AFTER anio");
}

$anio = $_POST["anio"];
$nombre_taller = $_POST['nombre_taller'];
$participantes = $_POST['participantes'];
$condicion = $_POST['condicion'];
$id_instructor = isset($_POST['nom_instructor']) ? (int) $_POST['nom_instructor'] : 0;
$estado = 'Disponible';

$instructorValue = $id_instructor > 0 ? "$id_instructor" : "NULL";

mysqli_query($conn, "INSERT INTO talleres (anio, nombre_taller, id_instructor, participantes, condicion, estado) 
    VALUES('$anio', '$nombre_taller', $instructorValue, '$participantes', '$condicion', '$estado')") or die(mysqli_error($conn));

 echo "<script>document.location='../vistas/ADMIN/TALLERES.php'</script>";

?>
