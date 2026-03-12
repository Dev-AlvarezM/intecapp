<?php 
include('../../../modelos/db.php');

if(isset($_REQUEST['estado']))
{
    $estado=$_REQUEST['estado'];
}
if(isset($_REQUEST['fecha_inicio']))
{
    $fecha_inicio=$_REQUEST['fecha_inicio'];
}else{
  $fecha_inicio=0;
}
if(isset($_REQUEST['fecha_final']))
{
    $fecha_final=$_REQUEST['fecha_final'];
}else{
    $fecha_final=0;
}

$url = "../MANTENIMIENTO.php?estado=".$estado;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

  <link href="../img/intecap.png" rel="icon" type="image/png">
  <link rel='stylesheet' type='text/css' href='css1/style.css' />
  <link rel='stylesheet' type='text/css' href='css1/print.css' media="print" />
  <script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
  <script type='text/javascript' src='js/example.js'></script>

<style>

* {
    font-family: Arial, sans-serif;
}

.left{
    float: left;
}
.right{
    float: right;
}
.center{
   display:inline-block;
}
@media print {
    .btn-print {
      display:none !important;
      size:30px;
    }
}
th, td {
    font-size: 15px;
    text-align: center;
    font-family: Arial, sans-serif;
}

</style>
</head>

<body>

   <br>

       <center>                       

    <a class = "btn btn-success btn-print" style="    text-decoration: none;
    padding: 10px;
    font-weight: 600;
    font-size: 20px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 6px;
    border: 2px solid #0016b0; " href = "<?php echo $url;?>" ><i class ="glyphicon glyphicon-print"></i>Regresar</a>

<a class = "btn btn-success btn-print" style="    text-decoration: none;
    padding: 10px;
    font-weight: 600;
    font-size: 20px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 6px;
    border: 2px solid #0016b0; " href = "" onclick = "window.print()"><i class ="glyphicon glyphicon-print"></i> Impresión </a>
  </center>
  <div id="page-wrap">

    <textarea id="header">Lista de Mantenimientos</textarea>

    <div id="identity">

    <div style="clear:both"></div>

    <div class="container">
   <div class="left">
   <img id="image" src="../img/intecap.png" alt="logo"  /><br /><br />
       </div>

   <div class="right">
     <div id="customer">
     </div>
       </div>

   <div class="center">
    <?php if ($estado == "Pendiente") { ?>
    <h2>Mantenimientos Pendientes </h2>
<?php }elseif ($estado == "Realizados") { ?>
    <h2>Mantenimientos Realizados </h2>
<?php }elseif ($estado == "Mes") { 
     setlocale(LC_ALL,"es_ES");
 $mesE = date("F");

 switch($mesE)
 {   
     case "January":
     $monthNameSpanish = "Enero";
     break;

     case "February":
     $monthNameSpanish = "Febrero";
     break;

     case "March":
     $monthNameSpanish = "Marzo";
     break;

     case "April":
     $monthNameSpanish = "Abril";
     break;

     case "May":
     $monthNameSpanish = "Mayo";
     break;

     case "June":
     $monthNameSpanish = "Junio";
     break;

     case "July":
     $monthNameSpanish = "Julio";
     break;

     case "August":
     $monthNameSpanish = "Agosto";
     break;

     case "September":
     $monthNameSpanish = "Septiembre";
     break;

     case "October":
     $monthNameSpanish = "Octubre";
     break;

     case "November":
     $monthNameSpanish = "Noviembre";
     break;

     case "December":
     $monthNameSpanish = "Diciembre";
     break;
 }

    $ano = date("Y");?>
    <h2>Mantenimientos <?php echo $monthNameSpanish.' '.$ano; ?> </h2>
<?php }elseif ($estado == "Rango") { ?>
    <h2>Mantenimientos del <?php echo date("d/m/Y", strtotime($fecha_inicio)).' al '.date("d/m/Y", strtotime($fecha_final)); ?> </h2>
<?php }elseif ($estado == "General") { ?>
    
<?php } ?>

       </div>
   </div>


<table id="" style="width:100%">
  <thead>
      <tr>
        <th>Año</th>
        <th>Nombre del Encargado</th>
        <th>Taller</th>
        <th>Fecha de Reporte</th>
        <th>Fecha de Realizado</th>
        <th>Descripción</th>
        <th>Estado</th>
      </tr>
  </thead>
  <tbody>

  <?php 
  if ($estado=='Pendiente') {
    $sql = "SELECT *,m.id as id_mantenimiento, m.estado as estado_m FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado WHERE m.estado = 'no realizado' ";
  }elseif ($estado=='Realizados') {
    $sql = "SELECT *,m.id as id_mantenimiento, m.estado as estado_m FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado WHERE m.estado = 'Realizada' ";
  }elseif ($estado=='Mes') {
    $mes = date("m");
    $ano = date("Y");
    $sql = "SELECT *,m.id as id_mantenimiento, m.estado as estado_m FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado WHERE MONTH(f_reporte) = $mes AND YEAR(f_reporte) = $ano";
  }elseif ($estado=='Rango') {
    $sql = "SELECT *,m.id as id_mantenimiento, m.estado as estado_m FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado WHERE f_reporte BETWEEN '$fecha_inicio' and '$fecha_final'";
  }elseif ($estado=='General') {
    $sql = "SELECT *,m.id as id_mantenimiento, m.estado as estado_m FROM `mantenimiento` as m INNER JOIN talleres as t ON m.id_taller = t.id INNER JOIN usuario as u ON u.id = m.id_encargado";
  }

  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){

  ?>
    <tr>
        <td> <?php echo $row['anio'];?> </td>
        <td> <?php echo $row['nombre'];?> </td>
        <td><?php echo $row['nombre_taller'];?></td>
        <td><?php echo date("d/m/Y", strtotime($row['f_reporte']));?></td>
        <td><?php echo date("d/m/Y", strtotime($row['f_realizado']));?></td>
        <td><?php echo $row['descripcion'];?></td>
        <td><?php echo $row['estado_m'];?></td>
    </tr>
  <?php 
    }
  ?>
           
  </tbody>

</table>
                  
     </div>

       </div>

</body>

</html>