<?php 
//session_start();
include('db.php');

if(isset($_REQUEST['id_mantenimiento']))
{
    $id_mantenimiento=$_REQUEST['id_mantenimiento'];
}else
{
    $id_mantenimiento=$_POST['id_mantenimiento'];
}

// Obtener el estado actual del filtro para mantenerlo después del cambio
$estado = isset($_REQUEST['estado']) ? htmlspecialchars($_REQUEST['estado']) : 'General';

// Registrar la fecha actual cuando se marca como realizado
$f_realizado = date('Y-m-d');

mysqli_query($conn,"UPDATE mantenimiento SET estado='Realizada', f_realizado = '$f_realizado' WHERE id='$id_mantenimiento'")or die(mysqli_error());

echo "<script type='text/javascript'>alert('Se cambió de estado correctamente!');</script>";
// Redirigir manteniendo el filtro activo
echo "<script>document.location='../vistas/ADMIN/MANTENIMIENTO.php?estado=".$estado."'</script>";

?>