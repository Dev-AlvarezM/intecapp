<?php
include('../../modelos/db.php');

$id_mantenimiento =$_REQUEST['id'];
$sql = "SELECT * FROM `comentarios` WHERE id_mantenimiento = '$id_mantenimiento' ";
$query = $conn->query($sql);
$num = 0;
while($row = $query->fetch_assoc()){
    $id = $row['id'];
    $num = ++$num;
?>
    <tr>
        <td> <?php echo $num;?> </td>
        <td> <?php echo $row['fecha'];?> </td>
        <td><?php echo $row['Comentario'];?></td>
        <td>
            <button class="btn btn-danger btn-sm" title = "Eliminar Comentario" onclick="eliminar(<?php echo $id;?>)">
                <i class="fas fa-trash"> Eliminar</i> <!-- Icono de editar -->
            </button>
        </td>
    </tr>
<?php 
    }
?>