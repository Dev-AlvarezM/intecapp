<?php
	session_start();
	include 'db.php';

	if(isset($_POST['login'])){
		$nom_usuario = $_POST['nom_usuario'];
		$contraseña = $_POST['contraseña'];
		$pass=md5($contraseña);
		$salt="a1Bz20ydqelm8m1wql";
		$pass=$salt.$pass;
		$sql = "SELECT * FROM usuario WHERE nom_usuario = '$nom_usuario'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Usuario no encontrado';
		}
		else{
			$row = $query->fetch_assoc();
			if(($pass==$row['contraseña'])){
				$_SESSION['admin_intecap'] = $row['id'];
			}
			else{
				$_SESSION['error'] = 'La contraseña es incorrecta';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Ingrese las credenciales de administrador';
	}

	header('location: ../index.php');

?>