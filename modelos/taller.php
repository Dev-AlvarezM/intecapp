<?php
include('db.php');
if (session_status() === PHP_SESSION_NONE) session_start();
include(__DIR__ . '/../controladores/session.php');

$rawId = $_REQUEST['id'] ?? $_POST['id'] ?? null;
$id = filter_var($rawId, FILTER_VALIDATE_INT);

if ($id === false || (int) $id <= 0) {
    http_response_code(400);
    echo 'ID de taller no válido';
    exit;
}

$id = (int) $id;

if (!in_array($user['cargo'], ['Admin', 'Instructor'], true)) {
    http_response_code(403);
    echo 'Acceso denegado';
    exit;
}

$sql = 'SELECT * FROM talleres WHERE id = ?';
$types = 'i';
$params = [$id];

if ($user['cargo'] === 'Instructor') {
    $sql .= ' AND id_instructor = ?';
    $types .= 'i';
    $params[] = (int) $user['id'];
}

$stmt = $conn->prepare($sql);
if (!$stmt) {
    http_response_code(500);
    echo 'Error al consultar el taller';
    exit;
}

$bindParams = [&$types];
foreach ($params as $index => $value) {
    $bindParams[] = &$params[$index];
}

call_user_func_array([$stmt, 'bind_param'], $bindParams);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

if (!$row) {
    http_response_code(404);
    echo 'Taller no encontrado';
    exit;
}
