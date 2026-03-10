<?php
//session_start();
include('db.php');

$anio_evento = $_POST["anio_evento"];
$id_talleres = $_POST['id_talleres'];
$programa = $_POST['programa'];
$nombre_evento = $_POST['nombre_evento'];
$f_inicio = $_POST["f_inicio"];
$f_fin = $_POST['f_fin'];
$id_instructor = $_POST['id_instructor'];
$modalidad = $_POST['modalidad'];
$estado = $_POST["estado"];

mysqli_query($conn,"INSERT INTO eventos (anio_evento, id_talleres, programa, nombre_evento, f_inicio, f_fin, id_instructor, modalidad, estado) 
    VALUES('$anio_evento','$id_talleres','$programa','$nombre_evento','$f_inicio','$f_fin','$id_instructor','$modalidad','$estado')")or die(mysqli_error($con));
    		
echo "<script>document.location='../vistas/ADMIN/EVENTOS.php'</script>";

?>
