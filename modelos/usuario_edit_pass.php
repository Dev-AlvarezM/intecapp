<?php

include('db.php');
include('password_helper.php');

$instructor  = $_POST["instructor"]  ?? '0';
$id          = $_POST["id"]          ?? '';
$password  = $_POST["password"]  ?? '';
$password1 = $_POST['password1'] ?? '';

if ($id === '' || !ctype_digit((string)$id)) {
    echo "<script>alert('Solicitud inválida.'); history.back();</script>";
    exit;
}

if ($password !== '' && $password === $password1) {
    // Hash seguro (bcrypt) en vez del esquema viejo (salt fijo + md5)
    $pass = hashPasswordSeguro($password);

    // Consulta preparada: antes se concatenaba $pass y $id directo en el
    // SQL (inyección SQL). Ahora va con parámetros ligados.
    $stmt = $conn->prepare("UPDATE usuario SET password = ? WHERE id = ?");
    $stmt->bind_param("si", $pass, $id);
    $stmt->execute();
    $stmt->close();

    if ($instructor == 1) {
        echo "<script type='text/javascript'>alert('Registro actualizado correctamente.');</script>";
        echo "<script>document.location='../vistas/ADMIN/INSTRUCTORES.php'</script>";
    } else {
        echo "<script type='text/javascript'>alert('Registro actualizado correctamente.');</script>";
        echo "<script>document.location='../vistas/ADMIN/USUARIO.php'</script>";
    }

} else {

    if ($instructor == 1) {
        echo "<script type='text/javascript'>alert('Error al actualizar, ningun dato ha sido actualizado!');</script>";
        echo "<script>document.location='../vistas/ADMIN/INSTRUCTORES.php'</script>";
    } else {
        echo "<script>document.location='../vistas/ADMIN/USUARIO.php'</script>";
    }

}

?>