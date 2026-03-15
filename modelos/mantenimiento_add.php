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

// 2. Insertar notificación para TODOS los usuarios activos
$descripcion_safe = mysqli_real_escape_string($conn, $descripcion);
$mensaje = "Nuevo mantenimiento asignado: " . $descripcion_safe;

$usuarios = mysqli_query($conn, "SELECT id FROM usuario WHERE estado = 'activo'");
while ($u = mysqli_fetch_assoc($usuarios)) {
    mysqli_query($conn,
        "INSERT INTO notificaciones (mensaje, id_destino, leida)
         VALUES('$mensaje', '{$u['id']}', 0)"
    );
}

echo "<script>document.location='../vistas/ADMIN/MANTENIMIENTO.php'</script>";
?>