<?php
include 'conexion_be.php';

// Verifica que el usuario esté logueado y obtiene su ID
session_start();
$usuario_id = $_SESSION['usuario_id']; // Asumiendo que tienes el ID de usuario almacenado en la sesión

// Recibir datos del formulario
$tipo_envio = $_POST['tipo_envio'];
$direccion_envio = $tipo_envio === 'domicilio' ? $_POST['direccion_envio'] : null;

// Total de la compra (este valor deberías calcularlo según los productos seleccionados)
$total = $_POST['total']; // Asegúrate de pasar el total al formulario

// Insertar el pedido en la tabla pedidos
$sql = "INSERT INTO pedidos (usuario_id, total, tipo_envio, direccion_envio) VALUES (?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("idss", $usuario_id, $total, $tipo_envio, $direccion_envio);
$stmt->execute();
$pedido_id = $stmt->insert_id; // Obtiene el ID del pedido recién creado

// Insertar detalles del pedido
foreach ($_POST['productos'] as $producto) {
    $producto_id = $producto['id'];
    $cantidad = $producto['cantidad'];
    $precio = $producto['precio'];

    $sql_detalle = "INSERT INTO detalles_pedido (pedido_id, producto_id, cantidad, precio) VALUES (?, ?, ?, ?)";
    $stmt_detalle = $conexion->prepare($sql_detalle);
    $stmt_detalle->bind_param("iiid", $pedido_id, $producto_id, $cantidad, $precio);
    $stmt_detalle->execute();
}

// Cierra la conexión
$stmt->close();
$conexion->close();

// Redirigir o mostrar un mensaje de éxito
header("Location: gracias.php"); // Cambia a tu página de agradecimiento
exit;
?>
