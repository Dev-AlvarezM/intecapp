<?php
// Incluir conexión a base de datos
include('../../modelos/db.php');

// Normalizar el cargo del usuario (eliminar espacios extra)
$cargo = trim($user['cargo']);

// Construir consulta SQL según el filtro seleccionado
if ($estado=='Pendiente') {
    // Mostrar solo mantenimientos no realizados
    $sql = "SELECT m.*, t.nombre_taller AS nombre_taller, m.id as id_mantenimiento, m.estado as estado_m, u.nombre AS nombre_mantenimiento, u2.nombre AS nombre_reporta FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado LEFT JOIN usuario as u2 ON u2.id = m.id_solicitante WHERE m.estado = 'no realizado' ORDER BY m.f_reporte DESC, m.id DESC";
}elseif ($estado=='Realizados') {
    // Mostrar solo mantenimientos realizados
    $sql = "SELECT m.*, t.nombre_taller AS nombre_taller, m.id as id_mantenimiento, m.estado as estado_m, u.nombre AS nombre_mantenimiento, u2.nombre AS nombre_reporta FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado LEFT JOIN usuario as u2 ON u2.id = m.id_solicitante WHERE m.estado = 'Realizada' ORDER BY m.f_reporte DESC, m.id DESC";
}elseif ($estado=='Mes') {
    // Mostrar mantenimientos del mes actual
    $mes = date("m");
    $ano = date("Y");
    $sql = "SELECT m.*, t.nombre_taller AS nombre_taller, m.id as id_mantenimiento, m.estado as estado_m, u.nombre AS nombre_mantenimiento, u2.nombre AS nombre_reporta FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado LEFT JOIN usuario as u2 ON u2.id = m.id_solicitante WHERE MONTH(f_reporte) = $mes AND YEAR(f_reporte) = $ano ORDER BY m.f_reporte DESC, m.id DESC";
}elseif ($estado=='Rango') {
    // Mostrar mantenimientos dentro de un rango de fechas específico
    if(isset($_POST['buscar_fechas']))
    {
        $sql = "SELECT m.*, t.nombre_taller AS nombre_taller, m.id as id_mantenimiento, m.estado as estado_m, u.nombre AS nombre_mantenimiento, u2.nombre AS nombre_reporta FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado LEFT JOIN usuario as u2 ON u2.id = m.id_solicitante WHERE f_reporte BETWEEN '$fecha_inicio' and '$fecha_final' ORDER BY m.f_reporte DESC, m.id DESC";
    }else{
        $fecha_inicio = 0;
        $fecha_final = 0;
        $sql = "SELECT m.*, t.nombre_taller AS nombre_taller, m.id as id_mantenimiento, m.estado as estado_m, u.nombre AS nombre_mantenimiento, u2.nombre AS nombre_reporta FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado LEFT JOIN usuario as u2 ON u2.id = m.id_solicitante WHERE f_reporte BETWEEN '$fecha_inicio' and '$fecha_final' ORDER BY m.f_reporte DESC, m.id DESC";
    }
}elseif ($estado=='General') {
    // Mostrar todos los mantenimientos
    $sql = "SELECT m.*, t.nombre_taller AS nombre_taller, m.id as id_mantenimiento, m.estado as estado_m, u.nombre AS nombre_mantenimiento, u2.nombre AS nombre_reporta FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado LEFT JOIN usuario as u2 ON u2.id = m.id_solicitante ORDER BY m.f_reporte DESC, m.id DESC";
}
// Ejecutar consulta y recorrer resultados
$query = $conn->query($sql) or die("Error en la consulta: " . $conn->error);
while($row = $query->fetch_assoc()){
    $id_mantenimiento = $row['id_mantenimiento'];
?>
    <!-- Fila de tabla con datos del mantenimiento -->
    <?php
        $estado_m = isset($row['estado_m']) ? trim((string) $row['estado_m']) : '';
        if ($estado_m === '' || $estado_m === '0') {
            $estado_m = 'no realizado';
        }
    ?>
    <tr>
        <!-- Año del reporte -->
        <td> <?php echo date("Y", strtotime($row['f_reporte']));?> </td>
        <!-- Nombre del encargado -->
        <td><?php echo htmlspecialchars($row['nombre_mantenimiento']); ?></td>
        <!-- Nombre de quien reportó -->
        <td><?php echo htmlspecialchars($row['nombre_reporta']); ?></td>         
        <!-- Nombre del taller -->
        <td><?php echo htmlspecialchars($row['nombre_taller']);?></td>        
        <!-- Fecha de reporte -->
        <td><?php echo date("d/m/Y", strtotime($row['f_reporte']));?></td>
        <!-- Fecha de realización (solo se muestra si el mantenimiento está realizado) -->
        <td><?php echo ($estado_m == 'Realizada' && $row['f_realizado'] != NULL) ? date("d/m/Y", strtotime($row['f_realizado'])) : '--'; ?></td>
        <!-- Descripción del mantenimiento -->
        <td><?php echo htmlspecialchars($row['descripcion']);?></td>
        <!-- Columna de estado con opción de cambio -->

    <td>
        <?php
        // Mostrar botón para cambiar estado si es pendiente y el usuario es Admin o Mantenimiento
        if ($estado_m =='no realizado' && ($cargo == "Admin" || $cargo == "Mantenimiento")) { 
        ?>
        <a class="small-box-footer btn-print" href="<?php  echo "../../modelos/cambiar_estado.php?id_mantenimiento=$id_mantenimiento&estado=".urlencode($estado_m);?>" onClick="return confirm('¿Está seguro de que quieres cambiar de estado a Realizada?');" >No realizado</a>  
        <?php
        }
        // Mostrar estado realizado como texto si está en estado Realizada
        elseif ($estado_m == 'Realizada' && ($cargo == "Admin" || $cargo == "Mantenimiento")) {
            echo $estado_m;
        ?>               
        <?php
        } 
        // Mostrar estado para otros usuarios
        else {
            echo $estado_m;
        }       
        ?>
    </td>
        <!-- Columna de acciones (comentarios, editar, eliminar) -->
        <td>
            <?php if ($cargo == "Admin" || $cargo == "Instructor" || $cargo == "Mantenimiento") { ?>
                <button class="btn btn-primary btn-sm" title="Agregar Comentario" onclick="comentario(<?php echo $id_mantenimiento; ?>)">
                    <i class="fas fa-comments"></i>
                </button>
            <?php } ?>
        
            <?php if ($cargo == "Admin") { ?>
                <button class="btn btn-warning btn-sm" onclick="editar(<?php echo $id_mantenimiento;?>)">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-danger btn-sm" onclick="eliminar(<?php echo $id_mantenimiento;?>)">
                    <i class="fas fa-trash"></i>
                </button>
            <?php } ?>
        </td>
    </tr>
    
<?php 
    }