<?php
//session_start();
include('db.php');

$id_eventos = $_POST["id_eventos"];
$anio_evento = $_POST["anio_evento"];
$id_talleres = $_POST['id_talleres'];
$programa = $_POST['programa'];
$nombre_evento = $_POST['nombre_evento'];
$f_inicio = $_POST["f_inicio"];
$f_fin = $_POST['f_fin'];
$id_instructor = $_POST['id_instructor'];
$modalidad = $_POST['modalidad'];
$estado = $_POST["estado"];

mysqli_query($conn,"UPDATE eventos SET anio_evento = '$anio_evento', id_talleres = '$id_talleres', programa = '$programa', nombre_evento = '$nombre_evento', f_inicio = '$f_inicio', f_fin = '$f_fin', id_instructor = '$id_instructor', modalidad = '$modalidad', estado = '$estado' WHERE id_eventos = '$id_eventos' ")or die(mysqli_error($con));

echo "<script type='text/javascript'>alert('Registro actualizado correctamente.');</script>";
echo "<script>document.location='../vistas/ADMIN/EVENTOS.php'</script>";
?>
