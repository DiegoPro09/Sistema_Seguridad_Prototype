<?php
	include 'Plantilla.php';
    //require 'Conexion.php';

    /*session_start();
	$Varsesion = $_SESSION['Nombre'];

	if($Varsesion == null || $Varsesion = ''){
		header("location: ../index.php");
		die();
	}*/
	
	//$query = "CALL INNER_HISTORICO()";
	//$resultado = mysqli_query($conn, $query);
	
	$pdf = new PDF('L', 'mm', 'A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	/*while($row = $resultado->fetch_assoc())
	{*/
        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(269,8,'DATOS PERSONALES',1,1,'C',1);

        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(20,6,'Ficha N',1,0,'C',1);
        $pdf->Cell(20,6,'Nombre',1,0,'C',1);
        $pdf->Cell(20,6,'Apellido',1,0,'C',1);
        $pdf->Cell(15,6,'Tipo',1,0,'C',1);
        $pdf->Cell(20,6,'DNI',1,0,'C',1);
        $pdf->Cell(38,6,'Vencimiento DNI',1,0,'C',1);
        $pdf->Cell(38,6,'Cert. reincidencia',1,0,'C',1);
        $pdf->Cell(30,6,'Vencimiento',1,0,'C',1);
        $pdf->Cell(40,6,'Cert. Buena Cond.',1,0,'C',1);
        $pdf->Cell(28,6,'Vencimiento',1,1,'C',1);

        $pdf->SetFont('Arial','',10);

        $pdf->Cell(20,6,utf8_decode(1),1,0,'C');
		$pdf->Cell(20,6,utf8_decode('Ismael'),1,0,'C');
        $pdf->Cell(20,6,utf8_decode('Garcia'),1,0,'C');
        $pdf->Cell(15,6,utf8_decode('DNI'),1,0,'C');
        $pdf->Cell(20,6,utf8_decode(35678124),1,0,'C');
        $pdf->Cell(38,6,utf8_decode('05/2029'),1,0,'C');
        $pdf->Cell(38,6,utf8_decode('-'),1,0,'C');
        $pdf->Cell(30,6,utf8_decode('-'),1,0,'C');
        $pdf->Cell(40,6,utf8_decode('-'),1,0,'C');
        $pdf->Cell(28,6,utf8_decode('-'),1,1,'C');

        $pdf->SetFont('Arial','B',12);

        $pdf->Cell(50,6,'Ingreso',1,0,'C',1);
        $pdf->Cell(45,6,'Egreso',1,0,'C',1);
        $pdf->Cell(38,6,'Sector',1,0,'C',1);
        $pdf->Cell(38,6,'Motivo',1,0,'C',1);
        $pdf->Cell(49,6,'Fecha Alta',1,0,'C',1);
        $pdf->Cell(49,6,'Fecha Baja',1,1,'C',1);
        
        $pdf->SetFont('Arial','',10);


        $pdf->Cell(50,6,utf8_decode('19:00'),1,0,'C');
        $pdf->Cell(45,6,utf8_decode('20:30'),1,0,'C');
        $pdf->Cell(38,6,utf8_decode('-'),1,0,'C');
        $pdf->Cell(38,6,utf8_decode('Visita'),1,0,'C');
        $pdf->Cell(49,6,utf8_decode('20/01/2023'),1,0,'C');
        $pdf->Cell(49,6,utf8_decode('21/01/2023'),1,1,'C');

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

        /*$Tipo = $row['Tipo_Vehiculo'];
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
        }*/


		$pdf->Cell(20,6,utf8_decode('Garcia'),1,0,'C');
        $pdf->Cell(20,6,utf8_decode('Ford'),1,0,'C');
        $pdf->Cell(20,6,utf8_decode('BNM310'),1,0,'C');
        $pdf->Cell(20,6,utf8_decode('-'),1,0,'C');
        $pdf->Cell(44,6,utf8_decode('-'),1,0,'C');
        $pdf->Cell(20,6,utf8_decode('-'),1,0,'C');
        $pdf->Cell(35,6,utf8_decode('-'),1,0,'C');
        $pdf->Cell(25,6,utf8_decode('-'),1,0,'C');
        $pdf->Cell(32,6,utf8_decode('-'),1,0,'C');
        $pdf->Cell(33,6,utf8_decode('-'),1,1,'C');

        $pdf->SetFillColor(0,0,0);
        $pdf->Cell(269,8,'',1,1,'C',1);
        $pdf->SetFillColor(232,232,232);

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(269,8,'AUTORIZACION',1,1,'C',1);

        $pdf->Cell(90,6,'Nombre de Autorizado',1,0,'C',1);
        $pdf->Cell(89,6,'Autorizado por:',1,0,'C',1);
        $pdf->Cell(90,6,'Autorizacion Permanente',1,1,'C',1);

        $pdf->SetFont('Arial','',10);

        $pdf->Cell(90,6,utf8_decode('Ismael'),1,0,'C');
        $pdf->Cell(89,6,utf8_decode('Gabriel'),1,0,'C');
        $pdf->Cell(90,6,utf8_decode('No'),1,1,'C');

        $pdf->SetFillColor(0,0,0);
        $pdf->Cell(269,8,'',1,1,'C',1);
        $pdf->SetFillColor(232,232,232);

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(269,8,'NOVEDADES',1,1,'C',1);

        $pdf->SetFillColor(232,232,232);
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,6,'Tipo de novedad',1,0,'C',1);
        $pdf->Cell(30,6,'Causa',1,0,'C',1);
        $pdf->Cell(30,6,'Residente',1,0,'C',1);
        $pdf->Cell(30,6,'Desde',1,0,'C',1);
        $pdf->Cell(30,6,'Hasta',1,0,'C',1);
        $pdf->Cell(109,6,'Descripcion',1,1,'C',1);

        $pdf->SetFont('Arial','',10);

		$pdf->Cell(40,6,utf8_decode('-'),1,0,'C');
        $pdf->Cell(30,6,utf8_decode('-'),1,0,'C');
        $pdf->Cell(30,6,utf8_decode('-'),1,0,'C');
        $pdf->Cell(30,6,utf8_decode('-'),1,0,'C');
        $pdf->Cell(30,6,utf8_decode('-'),1,0,'C');
        $pdf->Cell(109,6,utf8_decode('-'),1,1,'C');

        $pdf->SetFillColor(0, 0, 0);
        $pdf->Cell(269,40,'',1,1,'C',1);
        $pdf->SetFillColor(232,232,232);


	//}
	$pdf->Output();
?>