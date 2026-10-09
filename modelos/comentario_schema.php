<?php
function asegurarColumnaUsuarioComentario($conn)
{
    $resultado = $conn->query("SHOW COLUMNS FROM comentarios LIKE 'id_usuario'");
    if ($resultado === false) {
        throw new RuntimeException('No se pudo verificar la estructura de la tabla de comentarios: ' . $conn->error);
    }

    if ($resultado->num_rows === 0 && !$conn->query('ALTER TABLE comentarios ADD COLUMN id_usuario INT NULL')) {
        throw new RuntimeException('No se pudo agregar el autor a la tabla de comentarios: ' . $conn->error);
    }
}
?>
