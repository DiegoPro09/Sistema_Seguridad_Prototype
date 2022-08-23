<?php
	include 'Plantilla.php';
    require 'Conexion.php';

    session_start();
	$Varsesion = $_SESSION['Nombre'];

	if($Varsesion == null || $Varsesion = ''){
		header("location: ../index.php");
		die();
	}
    
    $Ficha = $_REQUEST['Ficha_id'];
	
	$query = "SELECT Ficha_N, Nombre, Apellido, DNI, Tipo, VencimientoDNI, Cert_Reincidencia,
                    Vencimiento_R, Cert_BuenaConducta, VencimientoCERT, Sector, Motivo, Hora_Ingreso,
                    Hora_Egreso, Fecha_Alta, Fecha_Baja, (vehiculo.Modelo), (vehiculo.Dominio),
                    (Licencia_Conducir), (vehiculo.VencimientoLICENCIA),
                    (vehiculo.Seguro), (vehiculo.Poliza), (vehiculo.VencimientoSEGURO),
                    (vehiculo.Tipo_Vehiculo), (vehiculo.Opcion_V), (autorizacion.AutorizacionNRO),
                    (autorizacion.AutorizadoNombre), (autorizacion.AutorizadoDNI),
                    (autorizacion.Autorizado_Por), (autorizacion.Autorizado_Permanente),
                    (novedades.Tipo_N), (novedades.Causa), (novedades.Desde), (novedades.Hasta),
                    (novedades.Descripcion)
                FROM ingreso_personas
                INNER JOIN Vehiculo ON ingreso_personas.DNI = vehiculo.Dueno
                INNER JOIN Autorizacion ON ingreso_personas.DNI = autorizacion.AutorizadoDNI
                INNER JOIN Novedades ON ingreso_personas.DNI = novedades.Residente
                WHERE Ficha_N = $Ficha";
	$resultado = mysqli_query($conn, $query);
	
	$pdf = new PDF('L', 'mm', 'A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	while($row = $resultado->fetch_assoc())
	{
        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(269,8,'DATOS PERSONALES',1,1,'C',1);

        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(20,6,'Ficha N',1,0,'C',1);
        $pdf->Cell(48,6,'Nombre',1,0,'C',1);
        $pdf->Cell(47,6,'Apellido',1,0,'C',1);
        $pdf->Cell(15,6,'Tipo',1,0,'C',1);
        $pdf->Cell(30,6,'DNI',1,0,'C',1);
        $pdf->Cell(38,6,'Vencimiento DNI',1,0,'C',1);
        $pdf->Cell(38,6,'Cert. reincidencia',1,0,'C',1);
        $pdf->Cell(33,6,'Vencimiento',1,1,'C',1);

        $pdf->SetFont('Arial','',10);

        $pdf->Cell(20,6,utf8_decode($row['Ficha_N']),1,0,'C');
		$pdf->Cell(48,6,utf8_decode($row['Nombre']),1,0,'C');
        $pdf->Cell(47,6,utf8_decode($row['Apellido']),1,0,'C');
        $pdf->Cell(15,6,utf8_decode($row['Tipo']),1,0,'C');
        $pdf->Cell(30,6,utf8_decode($row['DNI']),1,0,'C');
        $pdf->Cell(38,6,utf8_decode($row['VencimientoDNI']),1,0,'C');
        $pdf->Cell(38,6,utf8_decode($row['Cert_Reincidencia']),1,0,'C');
        $pdf->Cell(33,6,utf8_decode($row['Vencimiento_R']),1,1,'C');

        $pdf->SetFont('Arial','B',12);

        
        $pdf->Cell(40,6,'Cert. Buena Cond.',1,0,'C',1);
        $pdf->Cell(28,6,'Vencimiento',1,0,'C',1);
        $pdf->Cell(23,6,'Ingreso',1,0,'C',1);
        $pdf->Cell(24,6,'Egreso',1,0,'C',1);
        $pdf->Cell(30,6,'Sector',1,0,'C',1);
        $pdf->Cell(53,6,'Motivo',1,0,'C',1);
        $pdf->Cell(38,6,'Fecha Alta',1,0,'C',1);
        $pdf->Cell(33,6,'Fecha Baja',1,1,'C',1);
        
        $pdf->SetFont('Arial','',10);

        
        $pdf->Cell(40,6,utf8_decode($row['Cert_BuenaConducta']),1,0,'C');
        $pdf->Cell(28,6,utf8_decode($row['VencimientoCERT']),1,0,'C');
        $pdf->Cell(23,6,utf8_decode($row['Hora_Ingreso']),1,0,'C');
        $pdf->Cell(24,6,utf8_decode($row['Hora_Egreso']),1,0,'C');
        $pdf->Cell(30,6,utf8_decode($row['Sector']),1,0,'C');
        $pdf->Cell(53,6,utf8_decode($row['Motivo']),1,0,'C');
        $pdf->Cell(38,6,utf8_decode($row['Fecha_Alta']),1,0,'C');
        $pdf->Cell(33,6,utf8_decode($row['Fecha_Baja']),1,1,'C');

        $pdf->SetFillColor(0,0,0);
        $pdf->Cell(269,8,'',1,1,'C',1);
        $pdf->SetFillColor(232,232,232);

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(269,8,'VEHICULO',1,1,'C',1);

        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(20,6,utf8_decode('Dueño'),1,0,'C',1);
        $pdf->Cell(20,6,'Modelo',1,0,'C',1);
        $pdf->Cell(20,6,'Dominio',1,0,'C',1);
        $pdf->Cell(20,6,'Licencia',1,0,'C',1);
        $pdf->Cell(44,6,'Vencimiento',1,0,'C',1);
        $pdf->Cell(20,6,'Seguro',1,0,'C',1);
        $pdf->Cell(35,6,'Vencimiento',1,0,'C',1);
        $pdf->Cell(25,6,'Poliza',1,0,'C',1);
        $pdf->Cell(65,6,'Tipo de vehiculo',1,1,'C',1);



        $pdf->SetFont('Arial','',10);

        $Tipo = $row['Tipo_Vehiculo'];
        switch($Tipo){
            case 1: 
                $Mostrar = "Municipal";
                break;
            case 2: 
                $Mostrar = "Provincial";
                break;
            case 3: 
                $Mostrar = "Proveedor";
                break;
            case 4: 
                $Mostrar = "Normal";
                break;
            default:
                $Mostrar = "--";
        }

        $Op = $row['Opcion_V'];
        switch($Op){
            case 1: 
                $Opcion = "Alumbrado";
                break;
            case 2: 
                $Opcion = "Basurero";
                break;
            case 3: 
                $Opcion = "Ca. limp.";
                break;
            case 4: 
                $Opcion = "Remis";
                break;
            case 5: 
                $Opcion = "Ser. Grua";
                break;
            case 6: 
                $Opcion = "Taxi";
                break;
            case 7: 
                $Opcion = "Ambulancia";
                break;
            case 8: 
                $Opcion = "Bomberos";
                break;
            case 4: 
                $Opcion = "Policia";
                break;
            default:
                $Opcion = "--";
        }


		$pdf->Cell(20,6,utf8_decode($row['Apellido']),1,0,'C');
        $pdf->Cell(20,6,utf8_decode($row['Modelo']),1,0,'C');
        $pdf->Cell(20,6,utf8_decode($row['Dominio']),1,0,'C');
        $pdf->Cell(20,6,utf8_decode($row['Licencia_Conducir']),1,0,'C');
        $pdf->Cell(44,6,utf8_decode($row['VencimientoLICENCIA']),1,0,'C');
        $pdf->Cell(20,6,utf8_decode($row['Seguro']),1,0,'C');
        $pdf->Cell(35,6,utf8_decode($row['VencimientoSEGURO']),1,0,'C');
        $pdf->Cell(25,6,utf8_decode($row['Poliza']),1,0,'C');
        $pdf->Cell(32,6,utf8_decode($Mostrar),1,0,'C');
        $pdf->Cell(33,6,utf8_decode($Opcion),1,1,'C');

        $pdf->SetFillColor(0,0,0);
        $pdf->Cell(269,8,'',1,1,'C',1);
        $pdf->SetFillColor(232,232,232);

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(269,8,'AUTORIZACION',1,1,'C',1);

        $pdf->Cell(90,6,'Nombre de Autorizado',1,0,'C',1);
        $pdf->Cell(89,6,'Autorizado por:',1,0,'C',1);
        $pdf->Cell(90,6,'Autorizacion Permanente',1,1,'C',1);

        $pdf->SetFont('Arial','',10);

        $pdf->Cell(90,6,utf8_decode($row['AutorizadoNombre']),1,0,'C');
        $pdf->Cell(89,6,utf8_decode($row['Autorizado_Por']),1,0,'C');
        $pdf->Cell(90,6,utf8_decode($row['Autorizado_Permanente']),1,1,'C');

        $pdf->SetFillColor(0,0,0);
        $pdf->Cell(269,8,'',1,1,'C',1);
        $pdf->SetFillColor(232,232,232);

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(269,8,'NOVEDADES',1,1,'C',1);

        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,6,'Tipo de novedad',1,0,'C',1);
        $pdf->Cell(30,6,'Residente',1,0,'C',1);
        $pdf->Cell(30,6,'Causa',1,0,'C',1);
        $pdf->Cell(30,6,'Desde',1,0,'C',1);
        $pdf->Cell(30,6,'Hasta',1,0,'C',1);
        $pdf->Cell(109,6,'Descripcion',1,1,'C',1);

        $pdf->SetFont('Arial','',10);

        $Nov = $row['Tipo_N'];

        if($Nov == "No hay novedad"){
            $Mos_Nov = "--";

            $pdf->Cell(40,6,utf8_decode($row['Tipo_N']),1,0,'C');
            $pdf->Cell(30,6,utf8_decode($row['Apellido']),1,0,'C');
            $pdf->Cell(30,6,utf8_decode($Mos_Nov),1,0,'C');
            $pdf->Cell(30,6,utf8_decode($Mos_Nov),1,0,'C');
            $pdf->Cell(30,6,utf8_decode($Mos_Nov),1,0,'C');
            $pdf->Cell(109,6,utf8_decode($Mos_Nov),1,1,'C');
        }
        else{
            $pdf->Cell(40,6,utf8_decode($row['Tipo_N']),1,0,'C');
            $pdf->Cell(30,6,utf8_decode($row['Apellido']),1,0,'C');
            $pdf->Cell(30,6,utf8_decode($row['Causa']),1,0,'C');
            $pdf->Cell(30,6,utf8_decode($row['Desde']),1,0,'C');
            $pdf->Cell(30,6,utf8_decode($row['Hasta']),1,0,'C');
            $pdf->Cell(109,6,utf8_decode($row['Descripcion']),1,1,'C');
        }



	}
	$pdf->Output();
?>