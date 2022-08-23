<?php

    require('Conexion.php');
    
    $Id_Dni = $_REQUEST['Dni_id'];


	$sql = "DELETE FROM ingreso_personas WHERE DNI = '$Id_Dni'";

	if ($conn->query($sql) === TRUE) {
		header("location: ../enlaces/Ver_R.php");
	}
	else
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}


	$conn->close();
?>