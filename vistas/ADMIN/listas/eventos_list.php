<?php
// Incluir conexión a base de datos
include($_SERVER['DOCUMENT_ROOT'] . '/intecapp/modelos/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/intecapp/controladores/session.php');

// Normalizar el cargo del usuario (eliminar espacios extra)
$cargo = isset($user['cargo']) ? trim($user['cargo']) : '';
$userId = isset($user['id']) ? $user['id'] : 0;

function e($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

// Construir consulta SQL según el rol del usuario
if ($cargo == "Admin") {
    $sql = "SELECT e.*, t.nombre_taller, u.nombre AS instructor_nombre, e.estado AS estado_e 
            FROM eventos AS e 
            INNER JOIN talleres AS t ON e.id_talleres = t.id 
            INNER JOIN usuario AS u ON u.id = e.id_instructor";
} elseif ($cargo == "Instructor") {
    $sql = "SELECT e.*, t.nombre_taller, u.nombre AS instructor_nombre, e.estado AS estado_e 
            FROM eventos AS e 
            INNER JOIN talleres AS t ON e.id_talleres = t.id 
            INNER JOIN usuario AS u ON u.id = e.id_instructor 
            WHERE e.id_instructor = '$userId'";
} else {
    $sql = "SELECT e.*, t.nombre_taller, u.nombre AS instructor_nombre, e.estado AS estado_e 
            FROM eventos AS e 
            INNER JOIN talleres AS t ON e.id_talleres = t.id 
            INNER JOIN usuario AS u ON u.id = e.id_instructor 
            WHERE e.id_instructor = '$userId'";
}

// Ejecutar consulta y recorrer resultados
$query = $conn->query($sql);
if (!$query) {
    echo '<tr><td colspan="14">Error al cargar eventos: ' . htmlspecialchars($conn->error) . '</td></tr>';
    return;
}

if ($query->num_rows === 0) {
    return;
}
while ($row = $query->fetch_assoc()) {
    $id_eventos = $row['id_eventos'];
?>
    <tr>
        <td><?php echo e($row['anio_evento']);?></td>
        <td><?php echo e($row['nombre_taller']);?></td>
        <td><?php echo e($row['programa']);?></td>
        <td><?php echo e($row['nombre_evento']);?></td>
        <td><?php echo e(date("d/m/Y", strtotime($row['f_inicio'])));?></td>
        <td><?php echo e(date("d/m/Y", strtotime($row['f_fin'])));?></td>
        <td><?php echo !empty($row['hora_entrada']) ? e(date('H:i', strtotime($row['hora_entrada']))) : '-';?></td>
        <td><?php echo !empty($row['hora_salida']) ? e(date('H:i', strtotime($row['hora_salida']))) : '-';?></td>
        <td><?php
                $estatilla = isset($row['Estatilla']) ? $row['Estatilla'] : '';
                if (empty($estatilla) && !empty($row['hora_entrada']) && !empty($row['hora_salida'])) {
                    try {
                        $fechaUno = new DateTime('2000-01-01 ' . $row['hora_entrada']);
                        $fechaDos = new DateTime('2000-01-01 ' . $row['hora_salida']);
                        $estatilla = $fechaUno->diff($fechaDos)->format('%H:%i');
                    } catch (Exception $e) {
                        $estatilla = '-';
                    }
                } else if (!empty($estatilla)) {
                    $estatilla = date('H:i', strtotime($estatilla));
                }
                echo e(!empty($estatilla) ? $estatilla : '-');
            ?></td>
        <td><?php echo e(isset($row['instructor_nombre']) ? $row['instructor_nombre'] : '-');?></td>
        <td><?php echo e(isset($row['modalidad']) ? $row['modalidad'] : '-');?></td>
        <td><?php echo e(isset($row['modalidad']) && $row['modalidad'] === 'Virtual' ? (isset($row['Url']) && $row['Url'] !== '' ? $row['Url'] : '-') : (isset($row['Modulo']) && $row['Modulo'] !== '' ? $row['Modulo'] : '-'));?></td>
        
        <td>
        <?php
        if ($cargo == "Admin" || $cargo == "Instructor") {
            if ($row['estado_e'] == "Activo" || $row['estado_e'] == "En Proceso") {
            ?>
                <a class="btn btn-block btn-outline-primary btn-sm" 
                href="<?php echo e("/intecapp/modelos/cambiar_estado_evento.php?id_eventos=$id_eventos"); ?>"
                onClick="return confirm('¿Está seguro de finalizar este evento? Se registrará la asistencia y se removerá de la lista.');">
                    Activo (Terminar)
                </a>
            <?php
            } else {
                echo e($row['estado_e']);
            }
        } else {
            echo e($row['estado_e']);
        }
        ?>
        </td>
        
        <?php
        if ($cargo == "Admin" || $cargo == "Instructor") {
        ?>
            <td>
                <button class="btn btn-warning btn-sm" onclick="editar(<?php echo $id_eventos;?>)" title="Editar Evento">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-danger btn-sm" onclick="eliminar(<?php echo $id_eventos;?>)" title="Eliminar Evento">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        <?php
        } else {
            // Formato para usuarios sin permisos de modificación
            echo "<td> - - - - - - </td>";
        }
        ?>
    </tr>
<?php 
}
?>