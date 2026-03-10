<?php
	@session_start();
	include '../../modelos/db.php';
	date_default_timezone_set('America/Guatemala');


	if(!isset($_SESSION['admin_intecap']) || trim($_SESSION['admin_intecap']) == ''){
		header('location: ../index.php');
	}

	$sql = "SELECT * FROM usuario WHERE id = '".$_SESSION['admin_intecap']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	$id_sesion=$user['id']; 
?>