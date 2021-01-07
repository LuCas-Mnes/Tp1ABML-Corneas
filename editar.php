<html>
    <head>
        <title>Registro de Corneas</title>
        <meta charset="utf-8">
        <link rel="icon" href="img/ojo.ico" type="image/x-icon">
        <link rel="stylesheet" href="estilo.css">
    </head>
</html>
<?php
include("conexion.php");
$cuil = '';
$nombre= '';
$apellido= '';
$direccion= '';
$titulo= '';
$cargo= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM usuarios WHERE 1";
  $result = mysqli_query($mysqli, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $cuil = $row['cuil'];;
    $nombre= $row['nombre'];
    $apellido= $row['apellido'];
    $direccion= $row['direccion'];
    $titulo= $row['titulo'];
    $cargo= $row['cargo'];
  }
}

if (isset($_POST['Actualizar'])) {
  $id = $_GET['id'];
  $cuil= $_POST['cuil'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $direccion = $_POST['direccion'];
  $titulo = $_POST['titulo'];
  $cargo = $_POST['cargo'];

  $query = "UPDATE usuarios set cuil = '$cuil', nombre = '$nombre', apellido = '$apellido', direccion = '$direccion', titulo = '$titulo', cargo = '$cargo' WHERE 1"; 
  if (mysqli_query($mysqli, $query)) {
    echo "<h3>Actualización de datos exitosa</h3>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($mysqli);
} 

?>

<h1 align="center"> Actualización de Datos De Corneas</h1>
      <form action="editar.php?id=<?php echo $_GET['1']; ?>" method="POST">
          <label>Actualice el CUIL:</label>
          <input name="cuil" type="number" value="<?php echo $cuil; ?>" placeholder="Actualizar CUIL">
          <br><br>
          <label>Actualice Los Nombres:</label>
          <input required name="nombre" type="text" value="<?php echo $nombre; ?>" placeholder="Actualizar Nombres">
          <br><br>
          <label>Actualice el Apellido:</label>
          <input name="apellido" type="text" value="<?php echo $apellido; ?>" placeholder="Actualizar Apellido">
          <br><br>
          <label>Actualice la Direccion:</label>
          <input name="direccion" type="text" value="<?php echo $direccion; ?>" placeholder="Actualizar Direccion">
          <br><br>
          <label>Ingrese el Titulo:</label>
          <input name="titulo" type="text" value="<?php echo $titulo; ?>" placeholder="Actualizar Titulo">
          <br><br>
          <label>Actualice el Cargo:</label>
          <input name="cargo" type="text" value="<?php echo $cargo; ?>" placeholder="Actualizar Cargo">
        <br><br>
        <button class="boton" name="Actualizar">Actualizar</button>
        <input type="button" onclick="location.href='listado.php'"class="boton" name="cancelar" value="Cancelar" >
      </form>


        
