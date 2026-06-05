<?php 
@session_start();
include('db.php');

// Validar que el usuario esté autenticado
if(!isset($_SESSION['admin_intecap']) || trim($_SESSION['admin_intecap']) == ''){
    header('location: ../index.php');
    exit();
}

// Obtener datos del usuario
$sql = "SELECT * FROM usuario WHERE id = '".$_SESSION['admin_intecap']."'";
$query = $conn->query($sql);
$user = $query->fetch_assoc();

// Validar que solo Admin y Mantenimiento puedan cambiar el estado
$cargo = trim($user['cargo']);
if ($cargo != "Admin" && $cargo != "Mantenimiento") {
    echo "<script type='text/javascript'>alert('No tienes permiso para cambiar el estado.');</script>";
    echo "<script>history.back();</script>";
    exit();
}

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