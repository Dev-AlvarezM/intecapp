<?php
include('db.php');

$instructor           = $_POST['instructor']           ?? '0';
$id                   = $_POST['id']                   ?? '';
$nombre               = $_POST['nombre']               ?? '';
$telefono             = $_POST['telefono']             ?? '';
$cargo                = $_POST['cargo']                ?? '';
$nom_usuario          = $_POST['nom_usuario']          ?? '';
$estado               = $_POST['estado']               ?? '';
$area_especializacion = $_POST['area_especializacion'] ?? '';

if ($cargo !== 'Instructor') {
    $area_especializacion = '';
}

// Procesar foto si se subió una nueva
$foto_sql   = '';
$foto_param = null;

if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $tipo     = $_FILES['foto']['type'];
    $datos    = file_get_contents($_FILES['foto']['tmp_name']);
    $base64   = base64_encode($datos);
    $foto_param = 'data:' . $tipo . ';base64,' . $base64;
    $foto_sql = ', foto = ?';
}

if ($foto_param !== null) {
    $stmt = $conn->prepare("UPDATE usuario 
                            SET nombre = ?, telefono = ?, cargo = ?, nom_usuario = ?, estado = ?, area_especializacion = ?, foto = ?
                            WHERE id = ?");
    $stmt->bind_param("sssssssi", $nombre, $telefono, $cargo, $nom_usuario, $estado, $area_especializacion, $foto_param, $id);
} else {
    $stmt = $conn->prepare("UPDATE usuario 
                            SET nombre = ?, telefono = ?, cargo = ?, nom_usuario = ?, estado = ?, area_especializacion = ?
                            WHERE id = ?");
    $stmt->bind_param("ssssssi", $nombre, $telefono, $cargo, $nom_usuario, $estado, $area_especializacion, $id);
}

if ($stmt->execute()) {
    echo "<script>alert('Registro actualizado correctamente.');</script>";
    if ($instructor == '1') {
        echo "<script>document.location='/intecapp/vistas/ADMIN/INSTRUCTORES.php'</script>";
    } else {
        echo "<script>document.location='/intecapp/vistas/ADMIN/USUARIO.php'</script>";
    }
} else {
    echo "<script>alert('Error al actualizar: " . $stmt->error . "'); history.back();</script>";
}

$stmt->close();
$conn->close();
?>