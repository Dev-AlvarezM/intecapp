<?php
include('../../modelos/db.php');

$esInstructor = isset($user['cargo']) && trim($user['cargo']) === 'Instructor';
$idUsuario = isset($user['id']) ? (int) $user['id'] : 0;
$sql = $esInstructor
    ? "SELECT * FROM talleres WHERE id_instructor = $idUsuario ORDER BY nombre_taller"
    : "SELECT * FROM talleres ORDER BY nombre_taller";
$query = $conn->query($sql);
if (!$query) {
    exit('Error al cargar los talleres: ' . htmlspecialchars($conn->error, ENT_QUOTES, 'UTF-8'));
}
if ($query && $query->num_rows === 0 && $esInstructor) {
    echo '<option value="" disabled>No tiene talleres a cargo</option>';
}
while ($row = $query->fetch_assoc()){

?>
    <option value="<?php echo $row['id'];?>"><?php echo $row['nombre_taller'];?></option>
<?php 
    }
?>
