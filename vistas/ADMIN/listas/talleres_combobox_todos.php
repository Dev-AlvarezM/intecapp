<?php
// Lista de TODOS los talleres, sin filtrar los que están ocupados por un
// evento activo. Se usa en Mantenimiento, donde no importa si el taller
// está libre u ocupado: siempre debe poder elegirse para registrar
// mantenimiento.
//
// Si necesitas la lista que SÍ oculta los talleres ocupados (la que usa
// Agregar Evento), esa sigue en talleres_combobox.php; no la modifiques
// para no volver a mezclar los dos comportamientos.
include('../../modelos/db.php');

$sql = "SELECT * FROM talleres ORDER BY nombre_taller";
$query = $conn->query($sql);
if (!$query) {
    exit('Error al cargar los talleres: ' . htmlspecialchars($conn->error, ENT_QUOTES, 'UTF-8'));
}
while ($row = $query->fetch_assoc()) {
?>
    <option value="<?php echo $row['id'];?>"><?php echo $row['nombre_taller'];?></option>
<?php
}
?>
