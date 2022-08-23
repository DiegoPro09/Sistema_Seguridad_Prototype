<?php

    require('Conexion.php');
    
    $Id_F = $_REQUEST['id_F'];
    $Id_Dni = $_REQUEST['id_Dni'];

  //Datos basicos del residente
	$Nombre_R = $_POST['Nombre_R'];
	$Apellido_R = $_POST['Apellido_R'];
	$Doc = $_POST['Tipo_Doc'];
	$Num_Doc = $_POST['Numero_Doc'];
	$Fecha_H = $_POST['Fecha_H'];
	$Cert_Reinc = $_POST['Cert_R'];
	$Venc_R = $_POST["Venci_C_R"];
  	$Cert_B = $_POST['Cert_B_C'];
	$Vencimieto_C = $_POST['Venci_C'];
	$Hora_I = $_POST['Hora_I'];
	$Hora_E = $_POST['Hora_E'];
	$Sector = $_POST['Sector'];
	$Motivo = $_POST['Motivo'];
 	$Fecha_A = $_POST['Fecha_A'];
	$Fecha_B = $_POST['Fecha_B'];
    $Foto = $_POST['Imagen'];
    
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

    //Autorizacion
	$Aut_Perm = $_POST['Aut_Permanente'];
    $Autorizado_P = $_POST['Autorizado_P'];

    //Novedades
	$Tipo_N = $_POST['Tipo_Novedad'];
	$Causa = $_POST['Causa_S'];
	$Desde = $_POST['Desde_S'];
	$Hasta = $_POST['Hasta_S'];
	$Descripcion = $_POST['Descripcion_N'];

		$sql = "UPDATE ingreso_personas SET Nombre='$Nombre_R', Apellido='$Apellido_R', Tipo='$Doc', DNI='$Num_Doc', VencimientoDNI='$Fecha_H', Cert_Reincidencia='$Cert_Reinc', 
                       Vencimiento_R='$Venc_R', Cert_BuenaConducta='$Cert_B', VencimientoCERT='$Vencimieto_C', Hora_Ingreso='$Hora_I', Hora_Egreso='$Hora_E', 
                       Sector='$Sector', Motivo='$Motivo', Fecha_Alta='$Fecha_A', Fecha_Baja='$Fecha_B', Foto='$Foto' 
                WHERE Ficha_N = $Id_F";
        
        $sql2 = "UPDATE vehiculo SET Dueno='$Num_Doc', Modelo='$Model_V', Dominio='$Dominio_V', Licencia_Conducir='$Licencia', 
                                    VencimientoLICENCIA='$Venc_L', Seguro='$Seguro', Poliza='$Poliza', VencimientoSEGURO='$Venci_P', 
                                    Tipo_Vehiculo='$Tipo_V', Opcion_V='$Op_V' 
                WHERE Dueno = $Id_Dni";

        $sql3 = "UPDATE autorizacion SET AutorizadoDNI='$Num_Doc', AutorizadoNombre='$Nombre_R', Autorizado_Permanente='$Aut_Perm', Autorizado_Por='$Autorizado_P'
                 WHERE AutorizadoDNI = $Id_Dni";
                
        $sql4 = "UPDATE novedades SET Tipo_N='$Tipo_N', Causa='$Causa', Desde='$Desde', Hasta='$Hasta', Descripcion='$Descripcion', Residente='$Num_Doc'
                 WHERE Residente = $Id_Dni";

		if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE && $conn->query($sql4) === TRUE) {
			header("location: ../enlaces/Ver_R.php");
		}
		else
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}


	$conn->close();
?>
