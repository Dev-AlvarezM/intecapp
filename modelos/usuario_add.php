<?php
//session_start();
include('db.php');

$instructor = $_POST["instructor"];

$nombre = $_POST["nombre"];
$direccion = $_POST['direccion'];
$cargo = $_POST['cargo'];
$nom_usuario = $_POST['nom_usuario'];
$contraseña = $_POST['contraseña'];
$estado = $_POST['estado'];

$pass=md5($contraseña);
$salt="a1Bz20ydqelm8m1wql";
$pass=$salt.$pass;

mysqli_query($conn,"INSERT INTO usuario (nombre, direccion, cargo, 	nom_usuario	, contraseña, estado)
    VALUES('$nombre','$direccion','$cargo','$nom_usuario','$pass','$estado')")or die(mysqli_error($con));
if ($instructor==1) {
    echo "<script>document.location='../vistas/ADMIN/INSTRUCTORES.php'</script>";
}else{
    echo "<script>document.location='../vistas/ADMIN/USUARIO.php'</script>";
}
?>