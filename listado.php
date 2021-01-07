<?php
include_once "conexion.php";
if (isset($_GET['id'])) {
  $registro = $_GET['id'];
  $query = "DELETE FROM socios WHERE id_socio = $registro";
  $result = mysqli_query($mysqli, $query);
  if (!mysqli_query($mysqli, $query)) {
    echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
  }
  header('Location: listado.php');
  mysqli_close($mysqli);
} 
?>
<html>
    <head>
        <title>Gestión del Club</title>
        <meta charset="utf-8">
        <link rel="icon" href="img/club.ico" type="image/x-icon">
        <link rel="stylesheet" href="estilo.css">
    </head>
    <body>
        <h1 style="text-align: center" >SISTEMA DE GESTIÓN DE SOCIOS</h1>
        
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
            <th style='width:50px;'>ID Socio</th>
            <th style='width:150px;'>Apellido</th>
            <th style='width:150px;'>Nombre</th>
            <th style='width:150px;'>DNI</th>
            <th style='width:150px;'>Estado</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                     
                    

                    //############## SI HUBO UN METODO GET Y ME TRAJO EL NUMERO DE PAGINA, LO USO. SI NO, ESTABLEZCO UNO POR DEFECTO (EMPEZANDO DEL PRINCIPIO) ##############
                    if (isset($_GET['pagina_nro']) && $_GET['pagina_nro'] != "") 
                    {
                        $paginaNro = $_GET['pagina_nro'];
                    } 
                    else 
                    {
                        $paginaNro = 1;
                    }

                    //############## DEFINO UN MAXIMO DE ELEMENTOS POR PAGINA ##############
                    $cantidadMaximaElementosPagina = 8;
                    
                    //############## CALCULO VALORES PARA LA PAGINACION ##############
                    $offset = ($paginaNro - 1) * $cantidadMaximaElementosPagina;
                    $paginaAnterior = $paginaNro - 1;
                    $paginaSiguiente = $paginaNro + 1;
                
                    //############## REALIZO LA CONSULTA PARA SABER CUANTOS ELEMENTOS HAY EN TOTAL ##############
                    $sentencia = $mysqli->prepare("SELECT COUNT(*) as cantidad FROM club.socios");
                    $sentencia->execute();
                    $resultado = $sentencia->get_result();
                    $fila = $resultado->fetch_assoc();

                    //############## GUARDO LA CANTIDAD TOTAL DE ELEMENTOS EN UNA VARIABLE ##############
                    $cantidadTotalElementos = $fila["cantidad"];

                    //############## CALCULO LA CANTIDAD DE PAGINAS QUE NECESITO ##############
                    $totalPaginas = ceil($cantidadTotalElementos / $cantidadMaximaElementosPagina);

                    //############## REALIZO LA CONSULTA PARA OBTENER SOLO LOS ELEMENTOS DE LA PAGINA ACTUAL ##############
                    $sentencia = $mysqli->prepare("SELECT * FROM club.socios LIMIT $offset, $cantidadMaximaElementosPagina");
                    $sentencia->execute();
                    $resultado = $sentencia->get_result();
                    $fila = $resultado->fetch_assoc(); ?>
                    <button class="bot" onclick="window.location.href='alta.php';">Nuevo Socio</button>
                    <?php
                    while($fila)
                      {
                        echo "  <tr>
                                    <td style=text-align:center>".$fila['id_socio']."</td>
                                    <td style=text-align:center>".$fila['apellido']."</td>
                                    <td style=text-align:center>".$fila['nombres']."</td>
                                    <td style=text-align:center>".$fila['dni']."</td>
                                    <td style=text-align:center>".$fila['estado']."</td>
                                    <td><a href='editar.php?id=".$fila['id_socio']."'><img src='img/modify.jpg'  width='20' height='20'></a></td> 
                                    <td><a href='listado.php?id=".$fila['id_socio']."'><img src='img/delete.jpg' width='20' height='20'></a></td>   
                                    
                                </tr>"; 
                        

                        $fila = $resultado->fetch_assoc();
                    }
                ?>
                    <!-- <td><a href='#borrar'><img src='img/delete.jpg' width='20' height='20'></a></td> -->
            </tbody>
        </table>

        

        <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
            <strong>Pagina <?php echo $paginaNro." de ".$totalPaginas; ?></strong>
        </div>
        <ul class="pagination">
            <?php 
                if($paginaNro > 1)
                {
                    echo "<li><a href='?pagina_nro=1'>Primera Pagina</a></li>";
                } 
            ?>
            
            <li>
                <a <?php if($paginaNro > 1){ echo "href='?pagina_nro=$paginaAnterior'"; } ?>>Anterior</a>
            </li>
            
            <li>
                <a <?php if($paginaNro < $totalPaginas) { echo "href='?pagina_nro=$paginaSiguiente'";} ?>>Siguiente</a>
            </li>
        
            <?php 
                if($paginaNro < $totalPaginas)
                {
                    echo "<li><a href='?pagina_nro=$totalPaginas'>Ultima Pagina &rsaquo;&rsaquo;</a></li>";
                } 
            ?>
        </ul>
    
        <?php mysqli_close($mysqli); ?>

    </body>
</html>




<!-- <div id="borrar" class="modalDialog">
    <div>
                
        <h3 align="center">Confirmación?</h3>
        <p align="center">Realmente desea eliminar el registro seleccionado??</p>
        <br>
        <?php $fila = 2; ?>
        <div class="modal_botones">
                <a href=eliminar.php?id=<?php echo $fila; ?> class="boton">Eliminar</a>
                <a href="#close" class="boton">Cancelar</a>
            </div>
    </div>
</div>
 -->