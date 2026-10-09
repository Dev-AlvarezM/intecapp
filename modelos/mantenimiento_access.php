<?php
function usuarioPuedeAccederConversacionMantenimiento($conn, $idMantenimiento, $idUsuario)
{
    $stmt = $conn->prepare(
        "SELECT m.id_solicitante, m.id_encargado, u.cargo
         FROM mantenimiento m
         INNER JOIN usuario u ON u.id = ?
         WHERE m.id = ?"
    );
    $stmt->bind_param('ii', $idUsuario, $idMantenimiento);
    $stmt->execute();
    $mantenimiento = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if (!$mantenimiento) {
        return false;
    }

    return trim($mantenimiento['cargo']) === 'Admin'
        || (int) $mantenimiento['id_solicitante'] === (int) $idUsuario
        || (int) $mantenimiento['id_encargado'] === (int) $idUsuario;
}
?>