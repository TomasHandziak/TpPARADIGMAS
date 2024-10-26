<?php 
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=gamesociety", "root", "");
        // Configuración para que lance excepciones en caso de error
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

    $conexion = mysqli_connect("localhost", "root", "", "gamesociety");

 
?>