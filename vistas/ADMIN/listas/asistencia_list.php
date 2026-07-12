<?php
include($_SERVER['DOCUMENT_ROOT'] . '/intecapp/modelos/db.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$usuarioSesion = '';
if (isset($user['nombre'])) {
    $usuarioSesion = $user['nombre'];
} elseif (isset($_SESSION['admin_intecap'])) {
    $usuarioSesion = 'Usuario #' . $_SESSION['admin_intecap'];
}

// Aseguramos que $user esté disponible cuando el archivo se carga directamente
if (!isset($user)) {
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/intecapp/controladores/session.php')) {
        include_once($_SERVER['DOCUMENT_ROOT'] . '/intecapp/controladores/session.php');
    }
}

$cargo = isset($user['cargo']) ? trim($user['cargo']) : '';
$cargo_lc = strtolower($cargo);
$filtroUsuario = '';
if ($cargo_lc === 'instructor') {
    $idUsuario = isset($user['id']) ? intval($user['id']) : (isset($_SESSION['admin_intecap']) ? intval($_SESSION['admin_intecap']) : 0);
    if ($idUsuario > 0) {
        $filtroUsuario = " WHERE a.id_usuario = $idUsuario";
    }
}

$sql = "SELECT a.*, u.nombre, u.cargo FROM asistencia a LEFT JOIN usuario u ON a.id_usuario = u.id" . $filtroUsuario . " ORDER BY a.fecha DESC, a.hora_entrada DESC, a.id DESC";
$query = $conn->query($sql);

function formatearHora($valor) {
    if (empty($valor)) {
        return '-';
    }

    $timestamp = strtotime($valor);
    return $timestamp ? date('H:i', $timestamp) : '-';
}

while($row = $query->fetch_assoc()){
    $id_asistencia = $row['id'];

    $hora_entrada = $row['hora_entrada'];
    $hora_salida = $row['hora_salida'];

    $estadia = '-';
    if (!empty($hora_entrada) && !empty($hora_salida)) {
        $fechaUno = new DateTime($hora_entrada);
        $fechaDos = new DateTime($hora_salida);
        $dateInterval = $fechaUno->diff($fechaDos);
        // Usar %h (horas) y %i (minutos) en DateInterval::format
        $estadia = $dateInterval->format('%h:%i');
    }
?>
    <tr>
        <td><?php echo $row['fecha'];?></td>
        <td><?php echo $row['nombre_taller'];?></td>
        
        <td><?php echo $row['nombre_evento'];?></td>
        
        <td><?php echo $row['nombre'];?></td>
        <td><?php echo $row['cargo'];?></td>
        <td><?php echo $row['modalidad'] ?? '-';?></td>
        <td><?php echo $estadia;?></td>
        <td><?php echo formatearHora($hora_entrada);?></td>
        <td><?php echo formatearHora($hora_salida);?></td>
        <td><?php echo $row['estado'];?></td>
    </tr>
<?php 
    }
?>