<?php
include('../../modelos/db.php');

//if ($user['cargo']=="Admin") {

if ($user['cargo']=="Admin") {
    $sql = "SELECT * FROM usuario";
}else {
    $userId = $user['id'];
    $sql = "SELECT * FROM usuario where id= $userId"; 
}


$query = $conn->query($sql);
while($row = $query->fetch_assoc()){
    $id = $row['id'];

?>
    <tr>
        <td><?php echo $row['nombre'];?></td>
        <td><?php echo $row['direccion'];?></td>
        <td><?php echo $row['cargo'];?></td>
        <td><?php echo $row['nom_usuario'];?></td>
        <td><?php echo $row['estado'];?></td>
        <td>
            <button class="btn btn-warning btn-sm" title="Editar Registro" onclick="editar(<?php echo $id;?>)">
                <i class="fas fa-edit"></i> <!-- Icono de editar -->
            </button>

            <button class="btn btn-primary btn-sm" title="Cambiar Contraseña" onclick="editarPass(<?php echo $id;?>)">
                <i class="fas fa-key"></i> <!-- Icono de editar -->
            </button>

             <?php
        if ($user['cargo']=="Admin") {
            if ($user['id']==$id) {

            }else{

            
        ?>
            <button class="btn btn-danger btn-sm" title="Eliminar Registro" onclick="eliminar(<?php echo $id;?>)">
                <i class="fas fa-trash"></i> <!-- Icono de editar -->
            </button>
            <?php
            }
        }else  {
        }
        ?>
        </td>
    </tr>
<?php 
    }
?>