<?php

    require('Conexion.php');
    
    $Ver_E = $_REQUEST['id_E'];
    
    $Nombre = $_POST['Nombre_U'];
	$Apellido = $_POST['Apellido_U'];
	$Email = $_POST['Email_U'];
	$Contrasenia = $_POST['Contrasena_U'];
	$Con_Verif = $_POST['V_Contrasena_U'];

	if ($Contrasenia == $Con_Verif) {
		$sql = "UPDATE registro_usuario SET Email='$Email', Nombre='$Nombre', Apellido='$Apellido', Contrasena='$Contrasenia'
		        WHERE id_U = $Ver_E";

		if ($conn->query($sql) === TRUE) {
				header("location: ../Index.php");
		} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	else


		



	$conn->close();

?>