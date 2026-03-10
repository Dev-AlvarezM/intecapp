<?php
include('../../modelos/db.php');

if ($estado=='Pendiente') {
    $sql = "SELECT *,m.id as id_mantenimiento, m.estado as estado_m FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado WHERE m.estado = 'no realizado' ";
}elseif ($estado=='Realizados') {
    $sql = "SELECT *,m.id as id_mantenimiento, m.estado as estado_m FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado WHERE m.estado = 'Realizada' ";
}elseif ($estado=='Mes') {
    $mes = date("m");
    $ano = date("Y");
    $sql = "SELECT *,m.id as id_mantenimiento, m.estado as estado_m FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado WHERE MONTH(f_reporte) = $mes AND YEAR(f_reporte) = $ano";
}elseif ($estado=='Rango') {
    if(isset($_POST['buscar_fechas']))
    {
        $sql = "SELECT *,m.id as id_mantenimiento, m.estado as estado_m FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado WHERE f_reporte BETWEEN '$fecha_inicio' and '$fecha_final'";
    }else{
        $fecha_inicio = 0;
        $fecha_final = 0;
        $sql = "SELECT *,m.id as id_mantenimiento, m.estado as estado_m FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado WHERE f_reporte BETWEEN '$fecha_inicio' and '$fecha_final'";
    }
}elseif ($estado=='General') {
    $sql = "SELECT *,m.id as id_mantenimiento, m.estado as estado_m FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado";
}
$query = $conn->query($sql);
while($row = $query->fetch_assoc()){
    $id_mantenimiento = $row['id_mantenimiento'];
?>
    <tr>
        <td> <?php echo date("Y", strtotime($row['f_reporte']));?> </td>
        <td> <?php echo $row['nombre'];?> </td>
        <td><?php echo $row['nombre_taller'];?></td>        
       
        <td><?php echo date("d/m/Y", strtotime($row['f_reporte']));?></td>
        <td><?php echo date("d/m/Y", strtotime($row['f_realizado']));?></td>
        <td><?php echo $row['descripcion'];?></td>
      <td>
<?php
if ($row['estado_m'] =='no realizado' and $user['cargo']=="Admin" || $user['cargo']=="Instructor") { 
?>
<a class="small-box-footer btn-print" href="<?php  echo "../../modelos/cambiar_estado.php?id_mantenimiento=$id_mantenimiento";?>" onClick="return confirm('¿Está seguro de que quieres cambiar de estado?');" >No realizado</a>  
<?php
}
elseif ($row['estado_m'] == 'Realizada' && ($user['cargo'] == "Admin" || $user['cargo'] == "Instructor")) {

echo $row['estado_m'];
?>               
<?php
} 
else {
    echo $row['estado_m'];
}       
?>
</td>
        <td>
             <?php if ($user['cargo'] == "Admin" || $user['cargo'] == "Instructor") { ?>
    <button class="btn btn-primary btn-sm" title="Agregar Comentario" onclick="comentario(<?php echo $id_mantenimiento; ?>)">
        <i class="fas fa-comments"></i>
    </button>
<?php } ?>

                  
<?php

        if ($user['cargo']=="Admin") {
        ?>

            
                <button class="btn btn-warning btn-sm" onclick="editar(<?php echo $id_mantenimiento;?>)">
                    <i class="fas fa-edit"></i> <!-- Icono de editar -->
                </button>
                <button class="btn btn-danger btn-sm" onclick="eliminar(<?php echo $id_mantenimiento;?>)">
                    <i class="fas fa-trash"></i> <!-- Icono de editar -->
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