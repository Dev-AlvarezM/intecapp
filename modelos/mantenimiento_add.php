<?php
// modelos/mantenimiento_add.php
if (session_status() === PHP_SESSION_NONE) session_start();
include('db.php');
include('config.php');

// Necesitamos saber quién solicita el mantenimiento para poder avisarle
// después cuando se marque como realizado.
if (!isset($_SESSION['admin_intecap']) || trim($_SESSION['admin_intecap']) == '') {
    header('location: ' . BASE_URL . '/index.php');
    exit;
}
$id_solicitante = (int) $_SESSION['admin_intecap'];

$id_taller    = $_POST["id_taller"];
$id_encargado = (int) $_POST["id_encargado"];
$f_reporte    = $_POST['f_reporte'];
$f_realizado  = (isset($_POST["f_realizado"]) && $_POST["f_realizado"] != '') ? $_POST["f_realizado"] : null;
$descripcion  = $_POST['descripcion'];
$estado       = 'no realizado';

// 1. Insertar mantenimiento (consulta preparada + guardamos quién lo solicita)
$stmt = $conn->prepare(
    "INSERT INTO mantenimiento (id_taller, f_reporte, f_realizado, descripcion, estado, id_encargado, id_solicitante)
     VALUES (?, ?, ?, ?, ?, ?, ?)"
);
$stmt->bind_param("ssssiii", $id_taller, $f_reporte, $f_realizado, $descripcion, $estado, $id_encargado, $id_solicitante);
$stmt->execute();
$stmt->close();

// 2. Notificar la NUEVA solicitud de mantenimiento a:
//    - el encargado de mantenimiento asignado
//    - todos los usuarios con cargo 'Admin'
//    (antes se avisaba a TODOS los usuarios activos; ahora solo a estos dos grupos)
$mensaje = "Nuevo mantenimiento asignado: " . $descripcion;

$stmtDestinos = $conn->prepare(
    "SELECT id FROM usuario
     WHERE estado = 'activo'
       AND (id = ? OR cargo = 'Admin')"
);
$stmtDestinos->bind_param("i", $id_encargado);
$stmtDestinos->execute();
$destinos = $stmtDestinos->get_result();

$stmtNoti = $conn->prepare(
    "INSERT INTO notificaciones (mensaje, id_destino, leida) VALUES (?, ?, 0)"
);
while ($u = $destinos->fetch_assoc()) {
    $idDestino = (int) $u['id'];
    $stmtNoti->bind_param("si", $mensaje, $idDestino);
    $stmtNoti->execute();
}
$stmtNoti->close();
$stmtDestinos->close();

echo "<script>document.location='../vistas/ADMIN/MANTENIMIENTO.php'</script>";
?>