<html>
    <head>
        <title>Registro de Corneas</title>
        <meta charset="utf-8">
        <link rel="icon" href="img/ojo.ico" type="image/x-icon">
        <link rel="stylesheet" href="estilo.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>

</html>

<?php
include("conexion.php");
$cuil = '';
$nombre= '';
$apellido= '';
$direccion= '';
$titulo= '';
$cargo= '';


if (isset($_POST['Guardar'])) {
  $cuil = $_POST['cuil'];
  $nombre= $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $direccion = $_POST['direccion'];
  $titulo = $_POST['titulo'];
  $cargo = $_POST['cargo'];

  
  $query = "INSERT INTO INSERT INTO usuarios (CUIL, NOMBRE, APELLIDO, DIRECCION, TITULO, CARGO) VALUES ('$cuil', '$nombre', '$apellido','$direccion','$titulo','$cargo')";
  if (mysqli_query($mysqli, $query)) {
    echo "<h3>Alta de Socio Exitosa</h3>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($mysqli);
} 
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center text-success">
				Bienvenido a Nuestra Pagina
			</h3>
			<p class="text-center text-danger lead">
				Agradecemos su Preferencia
			</p>
		</div>
	</div>
</div>

<h1 align="center"> ALTA DE SOCIOS</h1>
      <form action="alta.php" method="POST">
      <h3 class="text-center text-success">
          <label>Ingrese el Cuil:</label>
          <input name="cuil" type="number"  placeholder="cuil">
          <br><br>
          <label>Ingrese el Nombre:</label>
          <input required name="nombre" type="text"   placeholder="Nombre">
          <br><br>
          <label>Ingrese el Apellido:</label>
          <input name="apellido" type="text"   placeholder="Apellido">
          <br><br>
          <label>Ingrese la Direccion:</label>
          <input name="direccion" type="text"   placeholder="Direccion">
          <br><br>
          <label>Ingrese el Titulo:</label>
          <input name="titulo" type="text"   placeholder="titulo">
          <br><br>
          <label>Ingrese el Cargo:</label>
          <input name="cargo" type="text"  placeholder="cargo">
          <br><br>
        </h3>
</div>



      <h3 class="text-center text-danger lead">   
        <button class="boton" name="Guardar">Guardar</button>
        <input type="button" onclick="location.href='listado.php'"class="boton" name="cancelar" value="Cancelar" >
      </h3>      
      <div class="container-fluid">
	      <div class="row">
		    <div class="col-md-12">
			<blockquote class="blockquote text-right">
				<p class="mb-0">
					"<span>Donar es sembrar esperanzas y dar vida."</span>
				</p>
				<footer class="blockquote-footer">
					Anónimo --
				</footer>
      </form>

      
