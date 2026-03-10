<?php
include('../../modelos/db.php');

$sqlI = "SELECT * FROM usuario WHERE cargo = 'Instructor'";
$queryI = $conn->query($sqlI);
while($rowI = $queryI->fetch_assoc()){

?>
    <option value="<?php echo $rowI['id'];?>" <?php if($rowI['id']==$row['id_instructor']) {echo "selected"; }?> > <?php echo $rowI['nombre'];?></option>
<?php 
    }
?>