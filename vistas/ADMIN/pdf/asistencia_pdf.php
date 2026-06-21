<?php 
include('../../../modelos/db.php');

// --- LÓGICA DE FILTRADO ---
// Iniciamos con 1=1 para que si no vienen filtros, la consulta traiga todo.
$where = " WHERE 1=1 ";

// Si existen valores en la URL, los agregamos a la consulta
if (!empty($_GET['fecha'])) {
    $fecha = $conn->real_escape_string($_GET['fecha']);
    $where .= " AND a.fecha = '$fecha' ";
}
if (!empty($_GET['taller'])) {
    $taller = $conn->real_escape_string($_GET['taller']);
    $where .= " AND a.nombre_taller = '$taller' ";
}
if (!empty($_GET['instructor'])) {
    $instructor = $conn->real_escape_string($_GET['instructor']);
    $where .= " AND u.nombre = '$instructor' ";
}
// --------------------------
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
.left{ float: left; }
.right{ float: right; }
.center{ display:inline-block }
@media print {
    .btn-print { display:none !important; size:30px; }
}
th, td { font-size: 15px; text-align: center; }
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
            border: 2px solid #0016b0; " href = "../ASISTENCIA.php" ><i class ="glyphicon glyphicon-print"></i>Regresar</a>

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

    <textarea id="header">Lista de Asistencia</textarea>

<div id="identity">
    <div style="clear:both"></div>
    <div class="container">
        <div class="left">
            <img id="image" src="../img/intecap.png" alt="logo"  /><br /><br />
        </div>
        <div class="right">
            <div id="customer"></div>
        </div>
        <div class="center"></div>
   </div>

<table>
  <thead>
      <tr>
        <th>Fecha</th>
        <th>Taller</th>
        <th>Evento</th>
        <th>Nombre</th>
        <th>Cargo</th>
        <th>Modalidad</th>
        <th>Estatilla</th>
        <th>Hora de Entrada</th>
        <th>Hora de Salida</th>
        <th>Estado</th>
      </tr>
  </thead>
  <tbody>
  <?php 
  $num = 0;
  // Aquí usamos la variable $where construida arriba
  $sql = "SELECT a.*, u.nombre, u.cargo
        FROM asistencia a 
        INNER JOIN usuario u ON a.id_usuario = u.id 
        $where";
        
  $query = $conn->query($sql);
  while($row = $query->fetch_assoc()){
    $num = ++$num;
  ?>
    <tr>
        <td><?php echo $row['fecha'];?></td>
        <td><?php echo $row['nombre_taller'];?></td>
        <td><?php echo $row['nombre_evento'];?></td>
        <td><?php echo $row['nombre'];?></td>
        <td><?php echo $row['cargo'];?></td>
        <td><?php echo $row['modalidad'];?></td>
        <td><?php echo $row['estatilla'];?></td>
        <td><?php echo $row['hora_entrada'];?></td>
        <td><?php echo $row['hora_salida'];?></td>
        <td><?php echo $row['estado'];?></td>
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