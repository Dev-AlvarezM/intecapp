<?php
// modelos/mantenimiento_add.php
session_start();
include('db.php');

$id_taller    = $_POST["id_taller"];
$id_encargado = $_POST["id_encargado"];
$f_reporte    = $_POST['f_reporte'];
$f_realizado  = (isset($_POST["f_realizado"]) && $_POST["f_realizado"] != '') ? $_POST["f_realizado"] : 'NULL';
$descripcion  = $_POST['descripcion'];
$estado       = 'no realizado';

// 1. Insertar mantenimiento
mysqli_query($conn,
    "INSERT INTO mantenimiento (id_taller, f_reporte, f_realizado, descripcion, estado, id_encargado)
     VALUES('$id_taller','$f_reporte', $f_realizado, '$descripcion', '$estado','$id_encargado')"
) or die(mysqli_error($conn));

// 2. Insertar notificación para el encargado asignado
//    id_destino debe coincidir con $_SESSION['admin_intecap'] del encargado
$descripcion_safe = mysqli_real_escape_string($conn, $descripcion);
$mensaje = "Nuevo mantenimiento asignado: " . $descripcion_safe;

mysqli_query($conn,
    "INSERT INTO notificaciones (mensaje, id_destino, leida)
     VALUES('$mensaje', '$id_encargado', 0)"
) or die(mysqli_error($conn));

echo "<script>document.location='../vistas/ADMIN/MANTENIMIENTO.php'</script>";
?>