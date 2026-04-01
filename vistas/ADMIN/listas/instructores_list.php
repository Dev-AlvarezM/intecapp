<?php
include('../../modelos/db.php');

$num   = 0;
$sql   = "SELECT * FROM usuario WHERE cargo = 'Instructor'";
$query = $conn->query($sql);
while ($row = $query->fetch_assoc()) {
    $num++;
    $id_instructor = $row['id'];
?>
    <tr>
        <td><?php echo $num; ?></td>

        <td class="td-foto">
            <?php if (!empty($row['foto']) && strpos($row['foto'], 'data:image/') === 0): ?>
                <img src="<?php echo $row['foto']; ?>"
                     alt="Foto de <?php echo htmlspecialchars($row['nombre']); ?>"
                     style="width:42px; height:42px; border-radius:50%; object-fit:cover; border:2px solid #007bff; display:block; margin:0 auto;">
            <?php else: ?>
                <i class="fa fa-user-circle" style="font-size:36px; color:#ced4da; display:block; text-align:center;"></i>
            <?php endif; ?>
        </td>

        <td><?php echo htmlspecialchars($row['nombre']); ?></td>
        <td><?php echo htmlspecialchars($row['telefono'] ?? '—'); ?></td>
        <td><?php echo htmlspecialchars($row['cargo']); ?></td>
        <td><?php echo htmlspecialchars($row['area_especializacion'] ?? '—'); ?></td>
        <td><?php echo htmlspecialchars($row['estado'] ?? '—'); ?></td>
        <td>
            <?php if ($user['cargo'] == "Admin") { ?>
                <button class="btn btn-warning btn-sm" onclick="editar(<?php echo $id_instructor; ?>)">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-danger btn-sm" onclick="eliminar(<?php echo $id_instructor; ?>)">
                    <i class="fas fa-trash"></i>
                </button>
            <?php } else { ?>
                <span>— — —</span>
            <?php } ?>
        </td>
    </tr>
<?php
}
?>