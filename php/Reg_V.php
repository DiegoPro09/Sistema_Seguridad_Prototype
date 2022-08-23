<?php

	require('Conexion.php');
	include('Registrar_U.php');
  //Datos del Vehiculo
  $Model_V= $_POST['Modelo_V'];
  $Dominio_V = $_POST['Dominio_V'];
  $Licencia = $_POST['Lic_Cond'];
  $Venc_L = $_POST['Vencimiento_C'];
  $Seguro = $_POST['Seguro_V'];
  $Poliza = $_POST['Poliza_V'];
  $Venci_P = $_POST['Vencimiento_P'];
  $Tipo_V = $_POST['Tipo_V'];
  $Op_V = $_POST['Op_Tipo_V'];
  $Aut_Perm = $_POST['Aut_Permanente'];
  $Autorizado_P = $_POST['Autorizado_P'];


  $sql1 ="INSERT INTO vehiculo (Dueno, Modelo, Dominio, Licencia_Conducir, VencimientoLICENCIA, Seguro, Poliza, VencimientoSEGURO, Tipo_Vehiculo)
    VALUES ('$Nombre_R', '$Model_V', '$Dominio_V', '$Licencia', '$Venc_L', '$Seguro', '$Poliza', '$Venci_P', '$Tipo_V')";

  $sql2 ="INSERT INTO autorizacion (AutorizadoDNI, AutorizadoNombre, Autorizado_Permanente, Autorizado_Por)
    VALUES ('$Num_Doc', '$Nombre_R', '$Aut_Perm', '$Autorizado_P')";


  if ($conn->query($sql1) === TRUE) {
      echo "string";
  } else {
      echo "Error: " . $sql . "<p>" . $conn->error;
  }
  if ($conn->query($sql2) === TRUE) {
      echo "string";
  } else {
      echo "Error: " . $sql . "<p>" . $conn->error;
  }
