<?php
include($_SERVER['DOCUMENT_ROOT'] . '/intecapp/modelos/db.php');

$sql = "SELECT a.*, u.nombre, u.cargo FROM asistencia a LEFT JOIN usuario u ON a.id_usuario = u.id";
$query = $conn->query($sql);
while($row = $query->fetch_assoc()){
    $id_asistencia = $row['id'];

    $hora_entrada = $row['hora_entrada'];
    $hora_salida = $row['hora_salida'];

    $fechaUno=new DateTime($hora_entrada);
    $fechaDos=new DateTime($hora_salida);

    $dateInterval = $fechaUno->diff($fechaDos);
?>
    <tr>
        <td><?php echo $row['fecha'];?></td>
        <td><?php echo $row['nombre_taller'];?></td>
        
        <td><?php echo $row['nombre_evento'];?></td>
        
        <td><?php echo $row['nombre'];?></td>
        <td><?php echo $row['cargo'];?></td>
        <td><?php echo $row['modalidad'] ?? '-';?></td>
        <td><?php echo $row['estatilla'] ?? '-';?></td>
        <td><?php echo $row['hora_entrada'];?></td>
        <td><?php echo $row['hora_salida'];?></td>
        <td><?php echo $row['estado'];?></td>
    </tr>
<?php 
    }
?>