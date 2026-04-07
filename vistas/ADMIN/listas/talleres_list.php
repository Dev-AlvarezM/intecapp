<?php
include('../../modelos/db.php');

$sql = "SELECT * FROM talleres";
$query = $conn->query($sql);

while($row = $query->fetch_assoc()){
    $id_taller = $row['id'];
    
    // Verificar si hay eventos activos en este taller
    $sqlEventosActivos = "SELECT COUNT(*) as count FROM eventos WHERE id_talleres = '$id_taller' AND estado = 'Activo'";
    $queryActivos = $conn->query($sqlEventosActivos);
    $resultActivos = $queryActivos->fetch_assoc();
    $estadoAutomatico = $resultActivos['count'] > 0 ? 'Ocupado' : 'Disponible';
?>
    <tr>
        <td><?php echo $row['anio'] ?? '-';?></td>
        <td><?php echo $row['nombre_taller'] ?? '-';?></td>
        <td><?php echo $row['participantes'] ?? '-';?></td>
        <td><?php echo $row['condicion'] ?? '-';?></td>
        <td><?php echo $estadoAutomatico;?></td>
        <td>
            <?php if ($user['cargo']=="Admin") { ?>
                <button class="btn btn-warning btn-sm" onclick="editar(<?php echo $id_taller;?>)">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-danger btn-sm" onclick="eliminar(<?php echo $id_taller;?>)">
                    <i class="fas fa-trash"></i>
                </button>
            <?php } else { ?>
                - - - - - -
            <?php } ?>
        </td>
    </tr>
<?php 
}
