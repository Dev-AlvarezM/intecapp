<?php
// Incluir conexión a base de datos
include('../../modelos/db.php');

// Construir consulta SQL según el filtro seleccionado
if ($estado=='Pendiente') {
    // Mostrar solo mantenimientos no realizados
    $sql = "SELECT *,m.id as id_mantenimiento, m.estado as estado_m FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado WHERE m.estado = 'no realizado' ";
}elseif ($estado=='Realizados') {
    // Mostrar solo mantenimientos realizados
    $sql = "SELECT *,m.id as id_mantenimiento, m.estado as estado_m FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado WHERE m.estado = 'Realizada' ";
}elseif ($estado=='Mes') {
    // Mostrar mantenimientos del mes actual
    $mes = date("m");
    $ano = date("Y");
    $sql = "SELECT *,m.id as id_mantenimiento, m.estado as estado_m FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado WHERE MONTH(f_reporte) = $mes AND YEAR(f_reporte) = $ano";
}elseif ($estado=='Rango') {
    // Mostrar mantenimientos dentro de un rango de fechas específico
    if(isset($_POST['buscar_fechas']))
    {
        $sql = "SELECT *,m.id as id_mantenimiento, m.estado as estado_m FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado WHERE f_reporte BETWEEN '$fecha_inicio' and '$fecha_final'";
    }else{
        $fecha_inicio = 0;
        $fecha_final = 0;
        $sql = "SELECT *,m.id as id_mantenimiento, m.estado as estado_m FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado WHERE f_reporte BETWEEN '$fecha_inicio' and '$fecha_final'";
    }
}elseif ($estado=='General') {
    // Mostrar todos los mantenimientos
    $sql = "SELECT *,m.id as id_mantenimiento, m.estado as estado_m FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado";
}
// Ejecutar consulta y recorrer resultados
$query = $conn->query($sql);
while($row = $query->fetch_assoc()){
    $id_mantenimiento = $row['id_mantenimiento'];
?>
    <!-- Fila de tabla con datos del mantenimiento -->
    <tr>
        <!-- Año del reporte -->
        <td> <?php echo date("Y", strtotime($row['f_reporte']));?> </td>
        <!-- Nombre del encargado -->
        <td> <?php echo $row['nombre'];?> </td>
        <!-- Nombre del taller -->
        <td><?php echo $row['nombre_taller'];?></td>        
       
        <!-- Fecha de reporte -->
        <td><?php echo date("d/m/Y", strtotime($row['f_reporte']));?></td>
        <!-- Fecha de realización (solo se muestra si el mantenimiento está realizado) -->
        <td><?php echo ($row['estado_m'] == 'Realizada' && $row['f_realizado'] != NULL) ? date("d/m/Y", strtotime($row['f_realizado'])) : '--'; ?></td>
        <!-- Descripción del mantenimiento -->
        <td><?php echo $row['descripcion'];?></td>
      <!-- Columna de estado con opción de cambio -->
      <td>
<?php
// Mostrar botón para cambiar estado si es pendiente y el usuario es Admin o Instructor
if ($row['estado_m'] =='no realizado' || ($user['cargo'] == "Admin" && $user['cargo'] == "Instructor")) { 
?>
<a class="small-box-footer btn-print" href="<?php  echo "../../modelos/cambiar_estado.php?id_mantenimiento=$id_mantenimiento&estado=".urlencode($estado);?>" onClick="return confirm('¿Está seguro de que quieres cambiar de estado a Realizada?');" >No realizado</a>  
<?php
}
// Mostrar estado realizado como texto si está en estado Realizada
elseif ($row['estado_m'] == 'Realizada' && ($user['cargo'] == "Admin" || $user['cargo'] == "Instructor")) {
    echo $row['estado_m'];
?>               
<?php
} 
// Mostrar estado para otros usuarios
else {
    echo $row['estado_m'];
}       
?>
</td>
        <!-- Columna de acciones (comentarios, editar, eliminar) -->
        <td>
             <?php if ($user['cargo'] == "Admin" || $user['cargo'] == "Instructor") { ?>
    <!-- Botón para agregar comentarios -->
    <button class="btn btn-primary btn-sm" title="Agregar Comentario" onclick="comentario(<?php echo $id_mantenimiento; ?>)">
        <i class="fas fa-comments"></i>
    </button>
<?php } ?>
                  
<?php
        // Botones de editar y eliminar solo para administradores
        if ($user['cargo']=="Admin") {
        ?>
            <!-- Botón para editar mantenimiento -->
                <button class="btn btn-warning btn-sm" onclick="editar(<?php echo $id_mantenimiento;?>)">
                    <i class="fas fa-edit"></i>
                </button>
                <!-- Botón para eliminar mantenimiento -->
                <button class="btn btn-danger btn-sm" onclick="eliminar(<?php echo $id_mantenimiento;?>)">
                    <i class="fas fa-trash"></i>
                </button>   
                </td>
        <?php
        }else  {
            ?>
            </td> 
        <?php
        }
        ?>
          
    
<?php 
    }