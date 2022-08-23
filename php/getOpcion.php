<?php

	require ('../php/Conexion.php');

	$id_Empresa = $_POST['idTipo'];

	$queryM = "SELECT idOpcion, Opcion FROM Opcion WHERE idTipo = '$id_Empresa'";
	$resultadoM = mysqli_query($conn, $queryM);

	$html= "<option value='0'></option>";
	$html2= "<input>";

	while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['idOpcion']."'>".$rowM['Opcion']."</option>";

	}

	echo $html;
?>