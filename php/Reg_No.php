<?php
  require('Conexion.php');
  //Novedades
  $Tipo_N = $_POST['Tipo_Novedad'];
  $Causa = $_POST['Causa_S'];
  $Desde = $_POST['Desde_S'];
  $Hasta = $_POST['Hasta_S'];
  $Descripcion = $_POST['Descripcion_N'];

    $sql3 = "INSERT INTO novedades (Tipo, Causa, Desde, Hasta, Descripcion)
    VALUES ('$Tipo_N', '$Causa', '$Desde', '$Hasta', '$Descripcion')";
    if ($conn->query($sql3) === TRUE) {
        echo "string";
    } else {
        echo "Error: " . $sql . "<p>" . $conn->error;
    }
?>
