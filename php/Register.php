<?php

	require('Conexion.php');

	$Nombre = $_POST['nombre'];
	$Apellido = $_POST['apellido'];
	$Email = $_POST['email'];
	$Contrasenia = $_POST['contrasena'];
	$Con_Verif = $_POST['verif_cont'];
	$Num_Verificacion = $_POST['num_verif'];

	$Sql2 = "SELECT numero_de_verificacion FROM numero_verificador";
	$Consul2 = mysqli_query($conn, $Sql2);
	$row = $Consul2->fetch_assoc();

	$Numero = $row['numero_de_verificacion'];

	if ($Contrasenia == $Con_Verif) {
		$Contrasena = $Contrasenia;
		if ($Numero == $Num_Verificacion) {
			$sql = "INSERT INTO registro_usuario (Email, Nombre, Apellido, Num_Verificar, Contrasena)
					VALUES ('$Email', '$Nombre', '$Apellido', '$Num_Verificacion', '$Contrasena')";
			echo $result=mysqli_query($conn,$sql);
		}
	}

	$conn->close();
?>
