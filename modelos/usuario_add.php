<?php
include('db.php');

$instructor           = $_POST['instructor']           ?? '0';
$nombre               = $_POST['nombre']               ?? '';
$telefono             = $_POST['telefono']             ?? '';
$cargo                = $_POST['cargo']                ?? '';
$nom_usuario          = $_POST['nom_usuario']          ?? '';
$contraseña           = $_POST['contraseña']           ?? '';
$estado               = $_POST['estado']               ?? '';
$area_especializacion = $_POST['area_especializacion'] ?? '';
$foto_base64          = $_POST['foto_base64']          ?? '';

$salt = "a1Bz20ydqelm8m1wql";
$pass = $salt . md5($contraseña);

if ($cargo !== 'Instructor') {
    $area_especializacion = '';
}

// Foto: primero base64 (cámara), luego archivo subido
$foto_param = null;

if (!empty($foto_base64) && strpos($foto_base64, 'data:image/') === 0) {
    // Viene de cámara o drop zone (ya es base64)
    $foto_param = $foto_base64;
} elseif (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    // Viene de input file
    $tipo       = $_FILES['foto']['type'];
    $datos      = file_get_contents($_FILES['foto']['tmp_name']);
    $foto_param = 'data:' . $tipo . ';base64,' . base64_encode($datos);
}

if ($foto_param !== null) {
    $stmt = $conn->prepare("INSERT INTO usuario (nombre, telefono, cargo, nom_usuario, contraseña, estado, area_especializacion, foto)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $nombre, $telefono, $cargo, $nom_usuario, $pass, $estado, $area_especializacion, $foto_param);
} else {
    $stmt = $conn->prepare("INSERT INTO usuario (nombre, telefono, cargo, nom_usuario, contraseña, estado, area_especializacion)
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $nombre, $telefono, $cargo, $nom_usuario, $pass, $estado, $area_especializacion);
}

if ($stmt->execute()) {
    if ($instructor == '1') {
        echo "<script>document.location='/intecapp/vistas/ADMIN/INSTRUCTORES.php'</script>";
    } else {
        echo "<script>document.location='/intecapp/vistas/ADMIN/USUARIO.php'</script>";
    }
} else {
    echo "<script>alert('Error al guardar: " . $stmt->error . "'); history.back();</script>";
}

$stmt->close();
$conn->close();
?>