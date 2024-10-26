<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'conexion_be.php'; // Asegúrate de que la ruta sea correcta

// Obtén el título del producto enviado por la solicitud
$tituloProducto = $_GET['titulo']; // Usamos GET para recibir el título

// Consulta para verificar si el producto existe
$query = "SELECT * FROM producto WHERE titulo = ?";
$stmt = mysqli_prepare($conexion, $query);
mysqli_stmt_bind_param($stmt, "s", $tituloProducto);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$existe = mysqli_num_rows($result) > 0;

// Devuelve el resultado en formato JSON
header('Content-Type: application/json');
echo json_encode(['existe' => $existe]);

mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>
