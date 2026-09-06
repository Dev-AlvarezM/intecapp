<?php
include('../../modelos/db.php');

$checkCol = $conn->query("SHOW COLUMNS FROM talleres LIKE 'id_instructor'");
if ($checkCol && $checkCol->num_rows === 0) {
    $conn->query("ALTER TABLE talleres ADD COLUMN id_instructor INT NULL AFTER anio");
}

$sql = "SELECT t.*, COALESCE(
            u.nombre,
            (SELECT i.nom_instructor
             FROM instructor AS i
             WHERE i.id_talleres = CAST(t.id AS CHAR)
             ORDER BY i.id DESC
             LIMIT 1)
        ) AS instructor_nombre
        FROM talleres AS t
        LEFT JOIN usuario AS u ON u.id = t.id_instructor";

$cargo = trim($user['cargo'] ?? '');
if ($cargo === 'Instructor') {
    $areaInstructor = trim($user['area_especializacion'] ?? '');
    if ($areaInstructor !== '') {
        $areaInstructor = $conn->real_escape_string($areaInstructor);
        $sql .= " WHERE u.area_especializacion = '$areaInstructor'";
    } else {
        $idInstructor = (int) ($user['id'] ?? 0);
        $sql .= " WHERE t.id_instructor = $idInstructor";
    }
}

$idUsuarioActual = (int) ($user['id'] ?? 0);
$prioridadEdicion = $cargo === 'Admin'
    ? '1'
    : "t.id_instructor = $idUsuarioActual";
$sql .= " ORDER BY CASE
                WHEN $prioridadEdicion THEN 0
                ELSE 1
            END, t.nombre_taller ASC, t.id ASC";

$query = $conn->query($sql);

while($row = $query->fetch_assoc()){
    $id_taller = $row['id'];
    
    $sqlEventosActivos = "SELECT COUNT(*) as count FROM eventos WHERE id_talleres = '$id_taller' AND estado = 'Activo'";
    $queryActivos = $conn->query($sqlEventosActivos);
    $resultActivos = $queryActivos->fetch_assoc();
    $estadoAutomatico = $resultActivos['count'] > 0 ? 'Ocupado' : 'Disponible';
?>
    <tr>
        <td><?php echo $row['anio'] ?? '-';?></td>
        <td><?php echo $row['nombre_taller'] ?? '-';?></td>
        <td><?php echo !empty($row['instructor_nombre']) ? htmlspecialchars($row['instructor_nombre'], ENT_QUOTES, 'UTF-8') : '-';?></td>
        <td><?php echo $row['participantes'] ?? '-';?></td>
        <td><?php echo $row['condicion'] ?? '-';?></td>
        <td><?php echo $estadoAutomatico;?></td>
        <td>
            <?php if ($user['cargo'] === "Admin" || ($user['cargo'] === "Instructor" && (int) $row['id_instructor'] === (int) $user['id'])) { ?>
                <button class="btn btn-warning btn-sm" onclick="editar(<?php echo $id_taller;?>)">
                    <i class="fas fa-edit"></i>
                </button>
            <?php } ?>
            <?php if ($user['cargo']=="Admin") { ?>
                <button class="btn btn-danger btn-sm" onclick="eliminar(<?php echo $id_taller;?>)">
                    <i class="fas fa-trash"></i>
                </button>
            <?php } else { ?>
                <?php if ($user['cargo'] !== 'Instructor') { ?>- - - - - -<?php } ?>
            <?php } ?>
        </td>
    </tr>
<?php 
}
