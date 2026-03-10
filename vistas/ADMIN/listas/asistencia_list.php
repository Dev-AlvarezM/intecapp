<?php
include('../../modelos/db.php');

$sql = "SELECT * FROM asistencia as a INNER JOIN eventos as e ON a.id_evento = e.id_eventos INNER JOIN talleres as t ON e.id_talleres = t.id INNER JOIN usuario as u ON u.id = a.id_usuario";
$query = $conn->query($sql);
while($row = $query->fetch_assoc()){

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
        <td><?php echo $row['modalidad'];?></td>
        <td><?php echo $dateInterval->format('%H horas %i minutos').PHP_EOL;?></td>
        <td><?php echo $row['hora_entrada'];?></td>
        <td><?php echo $row['hora_salida'];?></td>
        <td><?php echo $row['estado'];?></td>
    </tr>
<?php 
    }
?>

