<?php

    require('Conexion.php');
    include('Login.php');

    session_start();
	$Varsesion = $_SESSION['Nombre'];

	if($Varsesion == null || $Varsesion = ''){
		header("location: ../index.php");
		die();
	}

    $query = "SELECT * FROM registro_usuario WHERE Email = $Email";
    $resultado = mysqli_query($conn, $query);
    $row = $resultado->fetch_assoc();

    $Email = $row['Email'];
    $Nombre = $row['Nombre'];

?>
