<?php

include('conexion.php');

if (isset($_GET['cuil'])) {
  $registro = $_GET['cuil'];
  $query = "DELETE FROM usuarios WHERE cuil = $cuil";
  $result = mysqli_query($mysqli, $query);
  if (!mysqli_query($mysqli, $query)) {
    echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
  }
  header('Location: listado.php');
  mysqli_close($mysqli);
} 



?>
