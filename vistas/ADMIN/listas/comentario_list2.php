<?php
include('../../modelos/db.php');
include_once('../../modelos/comentario_schema.php');
asegurarColumnaUsuarioComentario($conn);

$id_mantenimiento = isset($_REQUEST['id']) ? (int) $_REQUEST['id'] : 0;
$stmt = $conn->prepare(
    'SELECT c.*, u.nombre AS nombre_usuario
     FROM comentarios c
     LEFT JOIN usuario u ON u.id = c.id_usuario
     WHERE c.id_mantenimiento = ?
     ORDER BY c.id'
);
$stmt->bind_param('i', $id_mantenimiento);
$stmt->execute();
$query = $stmt->get_result();
$num = 0;
while($row = $query->fetch_assoc()){
    $id = $row['id'];
    $num = ++$num;
    $nombreUsuario = $row['nombre_usuario']
        ?? ($row['id_usuario'] === null ? 'No registrado' : 'Usuario #' . (int) $row['id_usuario']);
?>
    <tr>
        <td> <?php echo $num;?> </td>
        <td> <?php echo date("d/m/y", strtotime($row['fecha']));?> </td>
        <td><?php echo htmlspecialchars($nombreUsuario, ENT_QUOTES, 'UTF-8');?></td>
        <td><?php echo htmlspecialchars($row['Comentario'], ENT_QUOTES, 'UTF-8');?></td>
        <td>
            <button class="btn btn-danger btn-sm" title = "Eliminar Comentario" onclick="eliminar(<?php echo $id;?>)">
                <i class="fas fa-trash"> Eliminar</i> <!-- Icono de editar -->
            </button>
        </td>
    </tr>
<?php 
    }
$stmt->close();
?>