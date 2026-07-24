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
    /* Estilos de centrado para el logo */
    .logo-container {
        text-align: center;
        margin: 15px 0;
    }

    #image {
        display: inline-block;
    }

    @media print {
        .btn-print {
            display: none !important;
        }
    }

    /* Fuente Arial y estilos aplicados a la tabla */
    table, th, td {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 15px;
        text-align: center;
    }
  </style>
</head>

<body>

  <br>

  <center> 
      <a class="btn btn-success btn-print" style="text-decoration: none;
      font-family: Arial, sans-serif;
      padding: 10px;
      font-weight: 600;
      font-size: 20px;
      color: #ffffff;
      background-color: #1883ba;
      border-radius: 6px;
      border: 2px solid #0016b0;" href="../TALLERES.php"><i class="glyphicon glyphicon-print"></i> Regresar</a>

      <a class="btn btn-success btn-print" style="text-decoration: none;
      font-family: Arial, sans-serif;
      padding: 10px;
      font-weight: 600;
      font-size: 20px;
      color: #ffffff;
      background-color: #1883ba;
      border-radius: 6px;
      border: 2px solid #0016b0;" href="" onclick="window.print()"><i class="glyphicon glyphicon-print"></i> Impresión </a>
  </center>
  
  <div id="page-wrap">

    <textarea id="header">Lista de Talleres</textarea>

    <div id="identity">
      <div style="clear:both"></div>

      <!-- Contenedor del logo centrado -->
      <div class="logo-container">
        <img id="image" src="../img/intecap.png" alt="logo" /><br /><br />
      </div>

      <table style="width:100%">
        <thead>
            <tr>
              <th> Año </th>
              <th> Nombre del Taller </th>
              <th> Participantes </th>
              <th> Condición</th>
              <th> Estado </th>
            </tr>
        </thead>
        <tbody>

        <?php 
        $sql = "SELECT * FROM talleres";
        $query = $conn->query($sql);
        while($row = $query->fetch_assoc()){
            $id_taller = $row['id'];
        ?>
          <tr>
              <td><?php echo $row['anio'];?></td>
              <td><?php echo $row['nombre_taller'];?></td>
              <td><?php echo $row['participantes'];?></td>
              <td><?php echo $row['condicion'];?></td>
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