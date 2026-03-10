<?php
include('../../modelos/db.php');

$sqlT = "SELECT * FROM talleres";
$queryT = $conn->query($sqlT);
while($rowT = $queryT->fetch_assoc()){

?>
    <option value="<?php echo $rowT['id'];?>" <?php if($rowT['id']==$row['id_talleres']) {echo "selected"; }?> > <?php echo $rowT['nombre_taller'];?></option>
<?php 
    }
?>