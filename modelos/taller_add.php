<?php
//session_start();
include('db.php');

$anio = $_POST["anio"];
$nombre_taller = $_POST['nombre_taller'];
$participantes = $_POST['participantes'];
$condicion = $_POST['condicion'];
$hora_entrada = $_POST['hora_entrada'];
$hora_salida = $_POST['hora_salida'];
$estado = $_POST['estado'];


mysqli_query($conn,"INSERT INTO talleres (anio, nombre_taller, participantes, condicion, hora_entrada, hora_salida, estado) 
    VALUES('$anio','$nombre_taller','$participantes','$condicion','$hora_entrada','$hora_salida','$estado')")or die(mysqli_error($con));
    		
echo "<script>document.location='../vistas/ADMIN/TALLERES.php'</script>";

?>
