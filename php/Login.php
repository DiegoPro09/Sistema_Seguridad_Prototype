<?php

  require('Conexion.php');
  
  $Email = $_POST['email'];
  $Contrasena = $_POST['contrasena'];

  if(isset($Email)){
    //Inicio de variable de sesion
    session_start();
    $consul = "SELECT * FROM registro_usuario WHERE Email = '$Email' AND Contrasena = '$Contrasena'";
    $Resultado = mysqli_query($conn, $consul);
    $Fila = mysqli_fetch_array($Resultado);
    
    if(!$Fila['id_U']){
      echo 0;
    }
    else{
      $_SESSION['id_Usuario'] = $Fila['id_U'];
      $_SESSION['Nombre'] = $Fila['Nombre'];
      $_SESSION['Apellido'] = $Fila['Apellido'];
      $_SESSION['Contrasena_U'] = $Fila['Contrasena'];
      $_SESSION['Imagen'] = $Fila['Foto'];
      $_SESSION['Email'] = $Fila['Email'];
      $_SESSION['id_U'] = $Fila['id_U'];

      echo 1;
    }
  }

?>