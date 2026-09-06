<?php
include('../../modelos/db.php');

$esInstructor = isset($user['cargo']) && trim($user['cargo']) === 'Instructor';
$idUsuario = isset($user['id']) ? (int) $user['id'] : 0;
$sqlT = $esInstructor
    ? "SELECT * FROM talleres WHERE id_instructor = $idUsuario ORDER BY nombre_taller"
    : "SELECT * FROM talleres ORDER BY nombre_taller";
$queryT = $conn->query($sqlT);
if (!$queryT) {
    exit('Error al cargar los talleres: ' . htmlspecialchars($conn->error, ENT_QUOTES, 'UTF-8'));
}
if ($queryT && $queryT->num_rows === 0 && $esInstructor) {
    echo '<option value="" disabled>No tiene talleres a cargo</option>';
}
while($rowT = $queryT->fetch_assoc()){

?>
    <option value="<?php echo $rowT['id'];?>" <?php if($rowT['id']==$row['id_talleres']) {echo "selected"; }?> > <?php echo $rowT['nombre_taller'];?></option>
<?php 
    }
?>