<?php 
// Cargamos la sesión (incluye db.php) para obtener el usuario logueado
include('../../../controladores/session.php');

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
// Si el usuario logueado es Instructor, restringimos el reporte solo a sus registros
if (isset($user['cargo']) && strtolower(trim($user['cargo'])) === 'instructor') {
  $idUser = isset($user['id']) ? intval($user['id']) : 0;
  if ($idUser > 0) {
    $where .= " AND a.id_usuario = $idUser ";
  }
}
// --------------------------

// Formatea una hora o datetime para mostrar solo HH:MM. Devuelve '-' si vacío.
function formatoHoraHM($valor) {
  if (empty($valor) || trim($valor) === '') {
    return '-';
  }
  $ts = strtotime($valor);
  if ($ts === false) {
    return $valor; // si no podemos parsear, devolvemos el original
  }
  return date('H:i', $ts);
}

// Formatea el campo 'estatilla' (puede venir como HH:MM:SS o HH:MM) para mostrar solo HH:MM
function formatoEstatillaHM($valor) {
  if (empty($valor) || trim($valor) === '') {
    return '-';
  }
  $parts = explode(':', $valor);
  if (count($parts) >= 2) {
    $hh = str_pad($parts[0], 2, '0', STR_PAD_LEFT);
    $mm = str_pad($parts[1], 2, '0', STR_PAD_LEFT);
    return $hh . ':' . $mm;
  }
  // Si no tiene ':', intentar parsear como hora
  $ts = strtotime($valor);
  if ($ts === false) {
    return $valor;
  }
  return date('H:i', $ts);
}
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

    /* Centrado del logo */
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

    /* Fuente Arial para la tabla y sus celdas */
    table, th, td { 
        font-family: Arial, Helvetica, sans-serif;
        font-size: 14px; 
        text-align: center; 
    }
  </style>
</head>

<body>

  <br>

  <center> 
    <a class="btn btn-success btn-print" style="text-decoration: none;
    padding: 10px;
    font-weight: 600;
    font-size: 20px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 6px;
    border: 2px solid #0016b0;" href="../ASISTENCIA.php"><i class="glyphicon glyphicon-print"></i> Regresar</a>

    <a class="btn btn-success btn-print" style="text-decoration: none;
    padding: 10px;
    font-weight: 600;
    font-size: 20px;
    color: #ffffff;
    background-color: #1883ba;
    border-radius: 6px;
    border: 2px solid #0016b0;" href="" onclick="window.print()"><i class="glyphicon glyphicon-print"></i> Impresión </a>
  </center>

  <div id="page-wrap">

    <textarea id="header">Lista de Asistencia</textarea>

    <div id="identity">
      <div style="clear:both"></div>

      <!-- Contenedor del logo centrado -->
      <div class="logo-container">
        <img id="image" src="../img/intecap.png" alt="logo" /><br /><br />
      </div>

      <table style="width:100%">
        <thead>
            <tr>
              <th>Fecha</th>
              <th>Taller</th>
              <th>Evento</th>
              <th>Nombre</th>
              <th>Cargo</th>
              <th>Modalidad</th>
              <th>Estadía</th>
              <th>Hora de Entrada</th>
              <th>Hora de Salida</th>
              <th>Estado</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $num = 0;
        // Consulta aplicando el filtro de sesión/URL
        $sql = "SELECT a.*, u.nombre, u.cargo
                FROM asistencia a 
                INNER JOIN usuario u ON a.id_usuario = u.id 
                $where";
                
        $query = $conn->query($sql);
        while($row = $query->fetch_assoc()){
          $num = ++$num;
        ?>
          <tr>
              <td><?php echo date("d/m/Y", strtotime($row['fecha']));?></td>
              <td><?php echo $row['nombre_taller'];?></td>
              <td><?php echo $row['nombre_evento'];?></td>
              <td><?php echo $row['nombre'];?></td>
              <td><?php echo $row['cargo'];?></td>
              <td><?php echo $row['modalidad'];?></td>
              <td><?php echo formatoEstatillaHM($row['estatilla']);?></td>
              <td><?php echo formatoHoraHM($row['hora_entrada']);?></td>
              <td><?php echo formatoHoraHM($row['hora_salida']);?></td>
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