<?php
include('../../modelos/db.php');

$sql = "SELECT t.*
        FROM talleres AS t
        WHERE NOT EXISTS (
            SELECT 1
            FROM eventos AS e
            WHERE e.id_talleres = t.id
              AND e.estado = 'Activo'
        )
        ORDER BY t.nombre_taller";
$query = $conn->query($sql);
if (!$query) {
    exit('Error al cargar los talleres: ' . htmlspecialchars($conn->error, ENT_QUOTES, 'UTF-8'));
}
while ($row = $query->fetch_assoc()){

?>
    <option value="<?php echo $row['id'];?>"><?php echo $row['nombre_taller'];?></option>
<?php 
    }
?>
