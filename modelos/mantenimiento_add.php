<?php
//session_start();
include('db.php');

$id_taller = $_POST["id_taller"];
$id_encargado = $_POST["id_encargado"];
$f_reporte = $_POST['f_reporte'];
// Si f_realizado está vacío, establecerlo a NULL para que aparezca como pendiente
$f_realizado = (isset($_POST["f_realizado"]) && $_POST["f_realizado"] != '') ? $_POST["f_realizado"] : 'NULL';
$descripcion = $_POST['descripcion'];
// Por defecto, los nuevos mantenimientos se crean como "no realizado"
$estado = 'no realizado';

mysqli_query($conn,"INSERT INTO mantenimiento (id_taller, f_reporte, f_realizado, descripcion, estado,id_encargado) 
    VALUES('$id_taller','$f_reporte', $f_realizado, '$descripcion', '$estado','$id_encargado')")or die(mysqli_error($con));
    		
echo "<script>document.location='../vistas/ADMIN/MANTENIMIENTO.php'</script>";

?>
