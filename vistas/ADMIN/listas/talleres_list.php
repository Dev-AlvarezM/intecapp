<?php
include('../../modelos/db.php');


$sql = "SELECT * FROM talleres";
$query = $conn->query($sql);
while($row = $query->fetch_assoc()){
    $id_taller = $row['id'];

    $hora_entrada = $row['hora_entrada'];
    $hora_salida = $row['hora_salida'];

    $fechaUno=new DateTime($hora_entrada);
    $fechaDos=new DateTime($hora_salida);

    $dateInterval = $fechaUno->diff($fechaDos);
?>
    <tr>
        <td><?php echo $row['anio'];?></td>
        <td><?php echo $row['nombre_taller'];?></td>
        <td><?php echo $row['participantes'];?></td>
        <td><?php echo $dateInterval->format('%H horas %i minutos').PHP_EOL;?></td>
        <td><?php echo $row['condicion'];?></td>
        <td><?php echo $row['hora_entrada'];?></td>
        <td><?php echo $row['hora_salida'];?></td>
        <td><?php echo $row['estado'];?></td>
         <?php
        if ($user['cargo']=="Admin") {
        ?>

            <td>
                <button class="btn btn-warning btn-sm" onclick="editar(<?php echo $id_taller;?>)">
                    <i class="fas fa-edit"></i> <!-- Icono de editar -->
                </button>
                <button class="btn btn-danger btn-sm" onclick="eliminar(<?php echo $id_taller;?>)">
                    <i class="fas fa-trash"></i> <!-- Icono de editar -->
                </button>
            </td>

        <?php
        }else  {
            echo "<td> - - - - - - </td>";
        }
        ?>
    </tr>
<?php 
    }
