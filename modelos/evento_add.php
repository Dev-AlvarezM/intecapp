<?php
//session_start();
include('db.php');

$anio_evento = $_POST["anio_evento"];
$id_talleres = $_POST['id_talleres'];
$programa = $_POST['programa'];
$nombre_evento = $_POST['nombre_evento'];
$f_inicio = $_POST["f_inicio"];
$f_fin = $_POST['f_fin'];
$hora_entrada = $_POST["hora_entrada"];
$hora_salida = $_POST["hora_salida"];
$id_instructor = $_POST['id_instructor'];
$modalidad = $_POST['modalidad'];

// Calcular estatilla (duración)
$estatilla = null;
if (!empty($hora_entrada) && !empty($hora_salida)) {
    try {
        $fechaUno = new DateTime('2000-01-01 ' . $hora_entrada);
        $fechaDos = new DateTime('2000-01-01 ' . $hora_salida);
        $dateInterval = $fechaUno->diff($fechaDos);
        $estatilla = $dateInterval->format('%H:%i:%s');
    } catch (Exception $e) {
        $estatilla = null;
    }
}

// Calcular estado automáticamente basado en la fecha de inicio
$ahora = new DateTime();
$ahora->setTime(0, 0, 0);
$fechaInicio = new DateTime($f_inicio);
$fechaInicio->setTime(0, 0, 0);

if ($ahora >= $fechaInicio) {
    $estado = 'Activo';
} else {
    $estado = 'Disponible';
}

mysqli_query($conn,"INSERT INTO eventos (anio_evento, id_talleres, programa, nombre_evento, f_inicio, f_fin, hora_entrada, hora_salida, Estatilla, id_instructor, modalidad, estado) 
    VALUES('$anio_evento','$id_talleres','$programa','$nombre_evento','$f_inicio','$f_fin','$hora_entrada','$hora_salida','$estatilla','$id_instructor','$modalidad','$estado')")or die(mysqli_error($con));
    		
echo "<script>document.location='../vistas/ADMIN/EVENTOS.php'</script>";

?>
