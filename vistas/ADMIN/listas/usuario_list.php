<?php
include('../../modelos/db.php');

if ($user['cargo'] == "Admin") {
    $sql = "SELECT * FROM usuario";
} else {
    $userId = $user['id'];
    $sql = "SELECT * FROM usuario WHERE id = $userId";
}

$query = $conn->query($sql);
while ($row = $query->fetch_assoc()) {
    $id = $row['id'];
?>
    <tr>
        <td class="td-foto">
            <?php if (!empty($row['foto']) && strpos($row['foto'], 'data:image/') === 0): ?>
                <img src="<?php echo $row['foto']; ?>"
                     alt="Foto"
                     style="width:42px; height:42px; border-radius:50%; object-fit:cover; border:2px solid #207ffc; display:block; margin:0 auto;">
            <?php else: ?>
                <i class="fa fa-user-circle" style="font-size:36px; color:#ced4da; display:block; text-align:center;"></i>
            <?php endif; ?>
            
        </td>
        <td><?php echo htmlspecialchars($row['nombre']); ?></td>
        <td><?php echo htmlspecialchars($row['telefono'] ?? '—'); ?></td>
        <td><?php echo htmlspecialchars($row['cargo']); ?></td>
        <td><?php echo htmlspecialchars($row['nom_usuario']); ?></td>
        <td><?php echo htmlspecialchars($row['estado']); ?></td>
        <td>
            <button class="btn btn-warning btn-sm" title="Editar Registro" onclick="editar(<?php echo $id; ?>)">
                <i class="fas fa-edit"></i>
            </button>
            <button class="btn btn-primary btn-sm" title="Cambiar Contraseña" onclick="editarPass(<?php echo $id; ?>)">
                <i class="fas fa-key"></i>
            </button>
            <?php if ($user['cargo'] == "Admin" && $user['id'] != $id) { ?>
                <button class="btn btn-danger btn-sm" title="Eliminar Registro" onclick="eliminar(<?php echo $id; ?>)">
                    <i class="fas fa-trash"></i>
                </button>
            <?php } ?>
        </td>
    </tr>
<?php
}
?>