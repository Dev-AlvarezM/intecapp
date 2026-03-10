<?php
include('../../modelos/db.php');

$sql = "SELECT * FROM eventos";
$query = $conn->query($sql);
while($row = $query->fetch_assoc()){

?>
    <option value="<?php echo $row['id_eventos'];?>"><?php echo $row['nombre_evento'];?></option>
<?php 
    }
?>

