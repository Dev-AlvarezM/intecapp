<?php
//session_start();
include('db.php');

$id_taller = $_POST["id_taller"];
$id_encargado = $_POST["id_encargado"];
$f_reporte = $_POST['f_reporte'];
$f_realizado = $_POST["f_realizado"];
$descripcion = $_POST['descripcion'];
$estado = $_POST['estado'];

mysqli_query($conn,"INSERT INTO mantenimiento (id_taller, f_reporte, f_realizado, descripcion, estado,id_encargado) 
    VALUES('$id_taller','$f_reporte', '$f_realizado', '$descripcion', '$estado','$id_encargado')")or die(mysqli_error($con));
    		
echo "<script>document.location='../vistas/ADMIN/MANTENIMIENTO.php'</script>";

?>
