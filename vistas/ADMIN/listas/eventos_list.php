<?php
// Incluir conexión a base de datos
include($_SERVER['DOCUMENT_ROOT'] . '/intecapp/modelos/db.php');
include($_SERVER['DOCUMENT_ROOT'] . '/intecapp/controladores/session.php');
include($_SERVER['DOCUMENT_ROOT'] . '/intecapp/modelos/cambiar_estado_evento.php');

// Normalizar el cargo del usuario (eliminar espacios extra)
$cargo = isset($user['cargo']) ? trim($user['cargo']) : '';
$userId = isset($user['id']) ? $user['id'] : 0;

// Construir consulta SQL según el rol del usuario
if ($cargo == "Admin" || $cargo == "Instructor") {
    $sql = "SELECT *, e.id_eventos as id_eventos, e.estado as estado_e, e.Estatilla as Estatilla 
            FROM eventos as e 
            INNER JOIN talleres as t ON e.id_talleres = t.id 
            INNER JOIN usuario as u ON u.id = e.id_instructor";
} else {
    // CORRECCIÓN: Se usa "e.id_eventos as id_eventos" para que coincida con el Admin
    $sql = "SELECT *, e.id_eventos as id_eventos, e.estado as estado_e, e.Estatilla as Estatilla 
            FROM eventos as e 
            INNER JOIN talleres as t ON e.id_talleres = t.id 
            INNER JOIN usuario as u ON u.id = e.id_instructor 
            WHERE e.id_instructor = '$userId'";
}

// Ejecutar consulta y recorrer resultados
$query = $conn->query($sql);
while($row = $query->fetch_assoc()){
    $id_eventos = $row['id_eventos'];
?>
    <tr>
        <td><?php echo $row['anio_evento'];?></td>
        <td><?php echo $row['nombre_taller'];?></td>
        <td><?php echo $row['programa'];?></td>
        <td><?php echo $row['nombre_evento'];?></td>
        <td><?php echo date("d/m/Y", strtotime($row['f_inicio']));?></td>
        <td><?php echo date("d/m/Y", strtotime($row['f_fin']));?></td>
        <td><?php echo $row['hora_entrada'];?></td>
        <td><?php echo $row['hora_salida'];?></td>
        <td><?php echo $row['Estatilla'] ?? '-';?></td>
        <td><?php echo $row['nombre'];?></td>
        <td><?php echo $row['modalidad'];?></td>
        
        <td>
        <?php
        if ($cargo == "Admin" || $cargo == "Instructor") {
            // Si el estado en tu BD viene como 'Activo' o 'En Proceso'
            if ($row['estado_e'] == "Activo" || $row['estado_e'] == "En Proceso") {
            ?>
                <a class="btn btn-block btn-outline-primary btn-sm" 
                href="<?php echo "/intecapp/modelos/cambiar_estado_evento.php?id_eventos=$id_eventos"; ?>"
                onClick="return confirm('¿Está seguro de finalizar este evento? Se registrará la asistencia y se removerá de la lista.');">
                    Activo (Terminar)
                </a>
            <?php
            } else {
                // Si ya está en otro estado (ej. Terminado), solo muestra el texto plano
                echo $row['estado_e'];
            }
        } else {
            // Si el usuario es instructor u otro rol, solo ve el texto plano 'Activo'
            echo $row['estado_e'];
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