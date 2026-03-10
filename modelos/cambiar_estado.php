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
$f_realizado = date('Y-m-d');

mysqli_query($conn,"UPDATE mantenimiento SET estado='Realizada', f_realizado = '$f_realizado' WHERE id='$id_mantenimiento'")or die(mysqli_error());

echo "<script type='text/javascript'>alert('Se cambiar de estado correctamente!');</script>";
echo "<script>document.location='../vistas/ADMIN/MANTENIMIENTO.php'</script>";

?>