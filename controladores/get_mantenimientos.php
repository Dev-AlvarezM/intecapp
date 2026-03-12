<?php
// controladores/get_mantenimientos.php
// Estructura: intecapp/controladores/ y intecapp/modelos/db.php

if (session_status() === PHP_SESSION_NONE) session_start();

ob_start();
error_reporting(0);
ini_set('display_errors', 0);

include '../modelos/db.php';

ob_clean();

header('Content-Type: application/json');

if (!isset($_SESSION['admin_intecap'])) {
    echo json_encode(['filas' => []]);
    exit;
}

$id_sesion = intval($_SESSION['admin_intecap']);
$user      = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM usuario WHERE id = $id_sesion"));
$estado    = isset($_GET['estado']) ? $_GET['estado'] : 'General';

if ($estado == 'Pendiente') {
    $sql = "SELECT m.*, m.id as id_mantenimiento, m.estado as estado_m,
                   t.nombre_taller, u.nombre, u.cargo
            FROM mantenimiento m
            INNER JOIN talleres t ON m.id_taller = t.id
            INNER JOIN usuario  u ON u.id = m.id_encargado
            WHERE m.estado = 'no realizado'";

} elseif ($estado == 'Realizados') {
    $sql = "SELECT m.*, m.id as id_mantenimiento, m.estado as estado_m,
                   t.nombre_taller, u.nombre, u.cargo
            FROM mantenimiento m
            INNER JOIN talleres t ON m.id_taller = t.id
            INNER JOIN usuario  u ON u.id = m.id_encargado
            WHERE m.estado = 'Realizada'";

} elseif ($estado == 'Mes') {
    $mes = date("m");
    $ano = date("Y");
    $sql = "SELECT m.*, m.id as id_mantenimiento, m.estado as estado_m,
                   t.nombre_taller, u.nombre, u.cargo
            FROM mantenimiento m
            INNER JOIN talleres t ON m.id_taller = t.id
            INNER JOIN usuario  u ON u.id = m.id_encargado
            WHERE MONTH(f_reporte) = $mes AND YEAR(f_reporte) = $ano";

} else {
    $sql = "SELECT m.*, m.id as id_mantenimiento, m.estado as estado_m,
                   t.nombre_taller, u.nombre, u.cargo
            FROM mantenimiento m
            INNER JOIN talleres t ON m.id_taller = t.id
            INNER JOIN usuario  u ON u.id = m.id_encargado";
}

$result = mysqli_query($conn, $sql);
$filas  = [];

while ($row = mysqli_fetch_assoc($result)) {
    $id          = $row['id_mantenimiento'];
    $anio        = date("Y", strtotime($row['f_reporte']));
    $f_reporte   = date("d/m/Y", strtotime($row['f_reporte']));
    $f_realizado = ($row['estado_m'] == 'Realizada' && !empty($row['f_realizado']))
                   ? date("d/m/Y", strtotime($row['f_realizado'])) : '--';

    $url_cambio = "/intecapp/modelos/cambiar_estado.php?id_mantenimiento=$id&estado=" . urlencode($estado);
    $celda_estado = ($row['estado_m'] == 'no realizado')
        ? "<a href='$url_cambio' onclick=\"return confirm('¿Cambiar estado a Realizada?');\">No realizado</a>"
        : htmlspecialchars($row['estado_m']);

    $acciones = '';
    if ($user['cargo'] == 'Admin' || $user['cargo'] == 'Instructor') {
        $acciones .= "<button class='btn btn-primary btn-sm' onclick='comentario($id)'><i class='fas fa-comments'></i></button> ";
    }
    if ($user['cargo'] == 'Admin') {
        $acciones .= "<button class='btn btn-warning btn-sm' onclick='editar($id)'><i class='fas fa-edit'></i></button> ";
        $acciones .= "<button class='btn btn-danger btn-sm' onclick='eliminar($id)'><i class='fas fa-trash'></i></button>";
    }

    $filas[] = [
        'anio'        => $anio,
        'nombre'      => htmlspecialchars($row['nombre']),
        'taller'      => htmlspecialchars($row['nombre_taller']),
        'f_reporte'   => $f_reporte,
        'f_realizado' => $f_realizado,
        'descripcion' => htmlspecialchars($row['descripcion']),
        'estado'      => $celda_estado,
        'acciones'    => $acciones,
    ];
}

echo json_encode(['filas' => $filas]);
?>