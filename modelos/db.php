<?php

// Configuración global del horario del sistema para Guatemala.
date_default_timezone_set('America/Guatemala');

// Credenciales y nombre de la base de datos local.
$dbuser = 'root';
$dbpass = '';
$dbname = 'intecapnew';

// Conexión usando MySQLi para consultas tradicionales.
$conn = new mysqli('localhost', $dbuser, $dbpass, $dbname);

// Si falla la conexión, se detiene la ejecución con un mensaje claro.
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Conexión adicional con PDO para operaciones más seguras y flexibles.
try{
	$base_de_datos = new PDO('mysql:host=localhost;dbname=' . $dbname, $dbuser, $dbpass);
	$base_de_datos->query("set names utf8;");
    $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}

?>