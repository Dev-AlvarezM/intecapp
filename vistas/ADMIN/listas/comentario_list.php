<?php
include('../../modelos/db.php');

$id =$_REQUEST['id'];
$sql = "SELECT *,m.id as id_mantenimiento, m.estado as estado_m FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado WHERE m.id = '$id' ";
$query = $conn->query($sql);
while($row = $query->fetch_assoc()){
?>
    <tr>
        <td> <?php echo $row['anio'];?> </td>
        <td> <?php echo $row['nombre'];?> </td>
        <td><?php echo $row['nombre_taller'];?></td>
        <td><?php echo date("d/m/Y", strtotime($row['f_reporte']));?></td>
        <td><?php echo date("d/m/Y", strtotime($row['f_realizado']));?></td>
        <td><?php echo $row['estado_m'];?></td>
    </tr>
<?php 
    }
?>