<?php
include('../../modelos/db.php');

$num = 0;
$sql = "SELECT * FROM usuario WHERE cargo = 'Instructor' ";
$query = $conn->query($sql);
while($row = $query->fetch_assoc()){
    $num = ++$num;
    $id_instructor = $row['id'];

?>
    <tr>
        <td><?php echo $num;?></td>
        <td><?php echo $row['nombre'];?></td>
        <!-- 
        <td><?php echo $row['id_talleres'];?></td>
        <td><?php echo $row['id_eventos'];?></td>
        <td><?php echo $row['fecha_uso'];?></td>
        -->
        <td>
             <?php
        if ($user['cargo']=="Admin") {
        ?>

            <td>
                <button class="btn btn-warning btn-sm" onclick="editar(<?php echo $id_instructor;?>)">
                    <i class="fas fa-edit"></i> <!-- Icono de editar -->
                </button>
                <button class="btn btn-danger btn-sm" onclick="eliminar(<?php echo $id_instructor;?>)">
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
?>

