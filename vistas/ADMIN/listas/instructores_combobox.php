<?php
include('../../modelos/db.php');

$sql = "SELECT * FROM usuario WHERE cargo = 'Instructor' ";
$query = $conn->query($sql);
while($row = $query->fetch_assoc()){

?>
    <option value="<?php echo $row['id'];?>"><?php echo $row['nombre'];?></option>
<?php 
    }
?>

