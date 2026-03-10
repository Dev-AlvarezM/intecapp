<?php
//session_start();
include('db.php');

$instructor = $_POST["instructor"];

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$direccion = $_POST['direccion'];
$cargo = $_POST['cargo'];
$nom_usuario = $_POST['nom_usuario'];
$estado = $_POST['estado'];
	
mysqli_query($conn,"UPDATE usuario SET nombre = '$nombre', direccion = '$direccion', cargo = '$cargo', nom_usuario = '$nom_usuario', estado = '$estado' WHERE id = '$id' ")or die(mysqli_error($con));

echo "<script type='text/javascript'>alert('Registro actualizado correctamente.');</script>";

if ($instructor==1) {
    echo "<script>document.location='../vistas/ADMIN/INSTRUCTORES.php'</script>";
}else{
    echo "<script>document.location='../vistas/ADMIN/USUARIO.php'</script>";
}
?>