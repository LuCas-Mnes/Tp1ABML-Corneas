<?php
    $servername = "localhost";  
    $username = "root";
    $password = "";
    $database = "corneas";
    $mysqli = new mysqli($servername, $username, $password, $database);
    if ($mysqli->connect_errno) {
        echo "Falló la conexión a la base de datos: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }

        
?> 