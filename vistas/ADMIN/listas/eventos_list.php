<?php
include('../../modelos/db.php');

//if ($user['cargo']=="Admin") {

if ($user['cargo']=="Admin") {
    $sql = "SELECT *,e.id_eventos as id_eventos, e.estado as estado_e FROM eventos as e INNER JOIN talleres as t ON e.id_talleres = t.id INNER JOIN usuario as u ON u.id = e.id_instructor";
}else {
    $userId = $user['id'];
    $sql = "SELECT *,e.id_eventos as id_eventos, e.estado as estado_e FROM eventos as e INNER JOIN talleres as t ON e.id_talleres = t.id INNER JOIN usuario as u ON u.id = e.id_instructor WHERE e.id_instructor = '$userId' ";
}

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
        <td><?php echo $row['nombre'];?></td>
        <td><?php echo $row['modalidad'];?></td>
        <td><?php echo $row['estado_e'];?></td>
        
 <?php
        if ($user['cargo']=="Admin") {
        ?>

            <td>
                <button class="btn btn-warning btn-sm" onclick="editar(<?php echo $id_eventos;?>)">
                    <i class="fas fa-edit"></i> <!-- Icono de editar -->
                </button>
                <button class="btn btn-danger btn-sm" onclick="eliminar(<?php echo $id_eventos;?>)">
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
//}else{
    //echo "<script>document.location='principal.php'</script>";
//}
?>