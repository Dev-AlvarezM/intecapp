<?php
include('../../modelos/db.php');

$sqlI = "SELECT * FROM usuario WHERE cargo = 'Mantenimiento'";
$queryI = $conn->query($sqlI);
while($rowI = $queryI->fetch_assoc()){

?>
    <option value="<?php echo $rowI['id'];?>" <?php if($rowI['id']==$row['id_encargado']) {echo "selected"; }?> > <?php echo $rowI['nombre'];?></option>
<?php 
    }
?>