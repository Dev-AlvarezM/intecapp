<?php 
include('../../../modelos/db.php');
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

.left{
    float: left;

}
.right{
    float: right;

}
.center{

   display:inline-block
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
}

</style>
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
    border: 2px solid #0016b0; " href = "../EVENTOS.php" ><i class ="glyphicon glyphicon-print"></i>Regresar</a>

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

    <textarea id="header">Lista de Eventos</textarea>

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

       </div>
   </div>


<table id="" style="width:100%"  >
  <thead>
      <tr>
        <th>Año</th>
        <th>Taller</th>
        <th>No. Programa</th>
        <th>Nombre del Evento</th>
        <th>Fecha de Inicio</th>
        <th>Fecha de Finalización</th>
        <th>Instructor</th>
        <th>Modalidad</th>
        <th>Estado</th>
      </tr>
  </thead>
  <tbody>

  <?php 
  $sql = "SELECT *,e.id_eventos as id_eventos, e.estado as estado_e FROM eventos as e INNER JOIN talleres as t ON e.id_talleres = t.id INNER JOIN usuario as u ON u.id = e.id_instructor";
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
      $id_taller = $row['id'];

      $hora_entrada = $row['hora_entrada'];
      $hora_salida = $row['hora_salida'];

      $fechaUno=new DateTime($hora_entrada);
      $fechaDos=new DateTime($hora_salida);

      $dateInterval = $fechaUno->diff($fechaDos);
  ?>
    <tr>
        <td><?php echo $row['anio_evento'];?></td>
        <td><?php echo $row['nombre_taller'];?></td>
        <td><?php echo $row['programa'];?></td>
        <td><?php echo $row['nombre_evento'];?></td>
        <td><?php echo date("d/m/Y", strtotime($row['f_inicio']));?></td>
        <td><?php echo date("d/m/Y", strtotime($row['f_fin']));?></td>
        <td><?php echo $row['nombre'];?></td>
        <td><?php echo $row['modalidad'];?></td>
        <td><?php echo $row['estado_e'];?></td>
    </tr>
  <?php 
    }
  ?>
           
 <!--end of modal-->
  </tbody>

</table>
                  
     </div>

       </div>

</body>

</html>
