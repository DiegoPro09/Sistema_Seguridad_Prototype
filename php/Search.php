<!DOCTYPE html>
<?php
	include("../php/Conexion.php");

	session_start();
	$Varsesion = $_SESSION['Nombre'];

	if($Varsesion == null || $Varsesion = ''){
		header("location: ../index.php");
		die();
    }
    
    $Busc = $_REQUEST['Busc'];

    if(empty($Busc)){
        header("location: ../enlaces/Ver_R.php");
    }

?>
<html>
	<head>
		<title>Ver Registros</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="../css/Estilo.css">
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	</head>
	<body class="Fondo_Ver">

		<!-- NAV BAR -->

		<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark Menu_Top">
			<a class="navbar-brand" href="#">Navbar</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="../enlaces/Ver_R.php">
							<button type="button" class="btn btn-outline-light">
								Buscar Otro
							</button>
						</a>
					</li>
					<li class="nav-item dropdown">
						<div class="dropleft">
							<button type="button" class="btn btn-outline-light dropdown-toggle" data-toggle="dropdown" >
							</button>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="User.php">Modificar Usuario</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="Cerrar_Sesion.php">Cerrar Sesion</a>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</nav>

		<!-- TERMINA NAV -->
		<div style="padding-top: 100px">
			<!-- BUSCADOR -->
			
			<div class="container" style="margin-bottom: 50px">
				<h1 style="color: white;">BUSCAR</h1>
				<div class="row">	
					<div class="col-md-6">
						<form action="Search.php" method="GET">
							<div class="form-row">
								<div class="col-md-10">
									<input class="form-control mr-sm-2" type="search" placeholder="Ingresar DNI" name="Busc" id="Busc" aria-label="Search">
								</div>
								<div class="col-md-2">
									<button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- TERMINA BUSCADOR -->

			<!-- EMPIEEZA TABLA CON LA MUESTRA DE DATOS -->
			<div class="container">
				<?php
					$consul = "SELECT Ficha_N, Nombre, Apellido, DNI, Tipo, VencimientoDNI, Cert_Reincidencia,
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
								WHERE DNI = $Busc";
					$consulta = mysqli_query($conn, $consul);
				?>
				<table class="table table-dark">
					<thead>
						<th scope="col"> Ficha N° </th>
						<th scope="col"> Nombre	  </th>
						<th scope="col"> Apellido </th>
						<th scope="col"> Tipo de documento </th>
						<th scope="col"> Numero </th>
					</thead>

					<tbody>
						<?php

							$fila = mysqli_fetch_array($consulta)

						?>
						<tr>
							<td><?php echo $fila["Ficha_N"] ?></td>
							<td><?php echo $fila["Nombre"] ?></td>
							<td><?php echo $fila["Apellido"] ?></td>
							<td><?php echo $fila["Tipo"] ?></td>
							<td><?php echo $fila["DNI"] ?></td>
							<td>
								<a href="../php/Reporte.php?Ficha_id=<?php echo $fila["Ficha_N"]; ?>">
									<button type="button" class="btn btn-primary">
										Ver Mas
									</button>
								</a>
								<a class="btn btn-success" href="../php/Update.php?Ficha_Id=<?php echo $fila["Ficha_N"]; ?>&id_Dni=<?php echo $fila["DNI"]; ?>" name="Ver"> Modificar </a>
								<a class="btn btn-danger" href="../php/Delete.php?Dni_id=<?php echo $fila["DNI"]; ?>" name="Ver"> Eliminar </a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>









		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	    <script src="js/bootstrap.min.js"></script>
	    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<script>
	      $(document).ready(function(){
	        $(window).scroll(function(){
	          if($(window).scrollTop()>200){
	            $('.navbar').addClass('navbar-scroll');
	          }
	          else{
	            $('.navbar').removeClass('navbar-scroll');
	          }
	        });
	       });

	      $(document).ready(function(){
	        $(window).scroll(function(){
	          if($(window).scrollTop()<250){
	            $('.navbar').addClass('navbar-scroll-up');
	          }
	          else{
	            $('.navbar').removeClass('navbar-scroll-up');
	          }
	        });
	       });
	    </script>
	</body>
</html>
