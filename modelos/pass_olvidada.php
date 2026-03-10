<?php

include('db.php');

$nom_usuario = $_POST["nom_usuario"];
$contraseña = $_POST["contraseña"];
$contraseña1 = $_POST['contraseña1'];

$sqlD = "SELECT * FROM usuario WHERE nom_usuario = '$nom_usuario'";
$queryD = $conn->query($sqlD);

if($queryD->num_rows == 1){
    
    if ($contraseña==$contraseña1) {
        //encriptando contraseña
        $pass=md5($contraseña);
        $salt="a1Bz20ydqelm8m1wql";
        $pass=$salt.$pass;
        ///finzalizo encriptacion

        mysqli_query($conn,"UPDATE usuario SET contraseña = '$pass' WHERE nom_usuario = '$nom_usuario' ")or die(mysqli_error($con));

        echo "<script>document.location='../vistas/LOGIN/cambio de contraseña.html'</script>";

    }else{

        echo "<script type='text/javascript'>alert('Error al actualizar, ningun dato ha sido actualizado!');</script>";
        echo "<script>document.location='../vistas/LOGIN/recuperacion de contraseña.php'</script>";
    }
}
else{
    echo "<script type='text/javascript'>alert('No se pudo actualizar, Usuario no encontrado.');</script>";
    echo "<script>document.location='../vistas/LOGIN/recuperacion de contraseña.php'</script>";
}




?>