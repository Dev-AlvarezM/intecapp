<?php

include('db.php');

$instructor = $_POST["instructor"];

$id = $_POST["id"];
$contraseña = $_POST["contraseña"];
$contraseña1 = $_POST['contraseña1'];

if ($contraseña==$contraseña1) {
    //encriptando contraseña
	$pass=md5($contraseña);
	$salt="a1Bz20ydqelm8m1wql";
	$pass=$salt.$pass;
	///finzalizo encriptacion

    mysqli_query($conn,"UPDATE usuario SET contraseña = '$pass' WHERE id = '$id' ")or die(mysqli_error($con));

    if ($instructor==1) {
        echo "<script type='text/javascript'>alert('Registro actualizado correctamente.');</script>";
        echo "<script>document.location='../vistas/ADMIN/INSTRUCTORES.php'</script>";
    }else{
        echo "<script type='text/javascript'>alert('Registro actualizado correctamente.');</script>";
        echo "<script>document.location='../vistas/ADMIN/USUARIO.php'</script>";
    }

}else{

    if ($instructor==1) {
        echo "<script type='text/javascript'>alert('Error al actualizar, ningun dato ha sido actualizado!');</script>";
        echo "<script>document.location='../vistas/ADMIN/INSTRUCTORES.php'</script>";
    }else{
        echo "<script>document.location='../vistas/ADMIN/USUARIO.php'</script>";
    }

}

?>