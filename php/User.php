<?php

	require ('../php/Conexion.php');

	session_start();
	if(!$_SESSION){
		header("location: ../index.html");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_SESSION['Nombre'] ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/Estilo.css">
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<script language="javascript" src="../js/jquery-3.4.1.min.js"></script>
	<script language="javascript">
	  $(document).ready(function(){
		$("#Tipo").change(function () {

		  $('#Opcion').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');

		  $("#Tipo option:selected").each(function () {
			idTipo = $(this).val();
			$.post("../php/getOpcion.php", { idTipo: idTipo }, function(data){
			  $("#Opcion").html(data);
			});
		  });
		})
	  });
	</script>
</head>
<body class="Fondo_Ing">

	<!-- NAV BAR -->

	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark Menu_Top">
		<a class="navbar-brand" href="#"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="../enlaces/Ingresos.php">
						<button type="button" class="btn btn-outline-light boton">
							Volver al Inicio
						</button>
					</a>
				</li>
				<li class="nav-item dropdown">
					<div class="dropleft">
						<button type="button" class="btn btn-outline-light dropdown-toggle" data-toggle="dropdown" >
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="../enlaces/Ver_R.php">Ver datos</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="Cerrar_Sesion.php">Cerrar Sesion</a>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</nav>

	<!-- FIN NAVBAR -->
	<!-- COMIENZO DE FORMULARIO -->

	<div class="Form_Posic3">
		<div class="card" style="width: 50rem;">
			<div class="card-body Fondo_Form">
				<h3>USUARIO </h3>
				<form action="Up_Us_G.php?id_E=<?php echo $_SESSION["id_U"];?>" method="POST" class="needs-validation" novalidate>
					<p>
						<div class="form-row">
							<div class="col-md-6">
								<label for="Ingrese_F">Imagen</label> <br>
	  							<?php echo '<img src="'.$_SESSION["Imagen"].'"width="270" heigth="300">' ?>
							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<label for="validationCustom02">Nombre/s</label>
										<input type="text" name="Nombre_U" class="form-control" id="validationCustom01" value="<?php echo $_SESSION['Nombre'];?>" required>
										<div class="invalid-feedback">
											Debe ingresar el Nombre
										</div>
									</div>
									<p style="color: #191919;">-------------------</p>
									<div class="col-md-12">
										<label for="validationCustom03">Apellido/s</label>
										<input type="text" name="Apellido_U" class="form-control" id="validationCustom02" value="<?php echo $_SESSION['Apellido'];?>" required>
										<div class="invalid-feedback">
											Debe ingresar el Apellido
										</div>
									</div>
								</div>
							</div>
						</div>
					</p>

					<p>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="validationCustom04">Contraseña</label>
							<input type="password" name="Contrasena_U" class="form-control" value="<?php echo $_SESSION['Contrasena_U'];?>" id="validationCustom04" placeholder="Contrasena" required>
							<div class="invalid-feedback">
								Ingrese la contraseña
							</div>
						</div>
						<div class="form-group col-md-6">
							<label for="validationCustom05">Verificar Contraseña</label>
							<input type="password" name="V_Contrasena_U" class="form-control" id="validationCustom05"placeholder="Verificar Contraseña" required>
							<div class="invalid-feedback">
									Las contraseñas no coinciden
							</div>
						</div>
					</div>	
					</p>
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="validationCustom04">Email</label>
							<input type="email" name="Email_U" class="form-control" value="<?php echo $_SESSION['Email'];?>" id="validationCustom04" placeholder="Contrasena" required>
							<div class="invalid-feedback">
								Ingrese la contraseña
							</div>
						</div>
					</div>	  
					
					<div class="form-row">
						<div class="col-md-6">
							<input value="Verificar" type="submit" class="btn btn-outline-light">
							<input value="Cargar" type="submit" class="btn btn-outline-light">
						</div>
					</div>
				</form>
			</div>
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
			// Example starter JavaScript for disabling form submissions if there are invalid fields
			(
				function()
				{
				  'use strict';
				  window.addEventListener
				  (
				  	'load', function()
					  {
					    // Fetch all the forms we want to apply custom Bootstrap validation styles to
					    var forms = document.getElementsByClassName('needs-validation');
					    // Loop over them and prevent submission
					    var validation = Array.prototype.filter.call
					    (
					    	forms, function(form)
						    {
						      form.addEventListener
						      (
						      	'submit', function(event)
							      {
							        if (form.checkValidity() === false)
							        {
							          event.preventDefault();
							          event.stopPropagation();
							        }
							        form.classList.add('was-validated');
							      },
							      false
						      );
						    }
					    );
					  },
					  false
				  );
				}
			)
			();
		</script>
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