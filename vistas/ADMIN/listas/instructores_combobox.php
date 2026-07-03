<?php
include('../../modelos/db.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$rolUsuario = '';
if (isset($user['cargo'])) {
    $rolUsuario = trim($user['cargo']);
}

$idUsuario = 0;
if (isset($user['id'])) {
    $idUsuario = intval($user['id']);
} elseif (isset($_SESSION['admin_intecap'])) {
    $idUsuario = intval($_SESSION['admin_intecap']);
}

if ($rolUsuario === 'Admin') {
    $sql = "SELECT * FROM usuario WHERE cargo = 'Instructor' ORDER BY nombre";
} else {
    $sql = "SELECT * FROM usuario WHERE cargo = 'Instructor' AND id = $idUsuario ORDER BY nombre";
}

$query = $conn->query($sql);
while($row = $query->fetch_assoc()) {
    $selected = '';
    if ($rolUsuario !== 'Admin' && $idUsuario > 0 && intval($row['id']) === $idUsuario) {
        $selected = 'selected';
    }
?>
    <option value="<?php echo $row['id'];?>" <?php echo $selected; ?>><?php echo $row['nombre'];?></option>
<?php
}
?>

