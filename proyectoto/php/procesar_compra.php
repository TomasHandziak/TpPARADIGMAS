<?php
// Conexión a la base de datos
include('conexion_be.php'); // Incluye el archivo de conexión

header('Content-Type: application/json');

// Lee el contenido de la solicitud JSON enviada desde checkout.js
$data = json_decode(file_get_contents('php://input'), true);

// Verifica si los datos necesarios están presentes
if (!$data || !isset($data['productos']) || !isset($data['tipoEnvio']) || !isset($data['direccion'])) {
    echo json_encode(["success" => false, "message" => "Datos de compra incompletos"]);
    exit;
}

$usuario_id = 1; // Asigna el ID del usuario (o usa el ID de sesión si está autenticado)
$tipo_envio = $data['tipoEnvio'];
$direccion_envio = $data['direccion'];
$productos = $data['productos'];

// Calcula el total de la compra
$total = 0;
foreach ($productos as $producto) {
    $total += $producto['quantity'] * floatval(substr($producto['price'], 1));
}

try {
    // Inicia una transacción
    $conexion->begin_transaction();

    // Inserta el pedido en la tabla `pedidos`
    $stmtPedido = $conexion->prepare("INSERT INTO pedidos (usuario_id, fecha_pedido, total, tipo_envio, direccion_envio) VALUES (?, NOW(), ?, ?, ?)");
    $stmtPedido->bind_param("idss", $usuario_id, $total, $tipo_envio, $direccion_envio);
    $stmtPedido->execute();

    // Obtén el ID del pedido recién insertado
    $pedido_id = $conexion->insert_id;

    // Inserta los detalles de cada producto en la tabla `detalles_pedido`
    $stmtDetalle = $conexion->prepare("INSERT INTO detalles_pedido (pedido_id, producto_id, cantidad, precio) VALUES (?, ?, ?, ?)");

    foreach ($productos as $producto) {
        $producto_id = $producto['id']; // Ajusta según el ID del producto en tu carrito
        $cantidad = $producto['quantity'];
        $precio = floatval(substr($producto['price'], 1)); // Convierte el precio a decimal sin el símbolo de moneda

        $stmtDetalle->bind_param("iiid", $pedido_id, $producto_id, $cantidad, $precio);
        $stmtDetalle->execute();
    }

    // Confirma la transacción
    $conexion->commit();

    // Responde con éxito
    echo json_encode(["success" => true, "message" => "Compra procesada con éxito"]);
} catch (Exception $e) {
    // Revierte la transacción en caso de error
    $conexion->rollback();
    echo json_encode(["success" => false, "message" => "Error al procesar la compra: " . $e->getMessage()]);
}

// Cierra las declaraciones
$stmtPedido->close();
$stmtDetalle->close();
$conexion->close();
?>
