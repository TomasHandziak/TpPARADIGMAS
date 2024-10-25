<?php
session_start();
include 'conexion.php';  // Conexión a la base de datos

// Verificar que el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Debes iniciar sesión.']);
    exit();
}

$usuario_id = $_SESSION['user_id'];

// Obtener los datos enviados desde el carrito
$data = json_decode(file_get_contents('php://input'), true);
$products = $data['products'];
$total = $data['total'];

// Iniciar transacción para garantizar consistencia en la base de datos
$conexion->begin_transaction();

try {
    // Insertar el pedido
    $tipo_envio = 'standard';  // Puede ser dinámico
    $direccion_envio = 'Calle Falsa 123';  // Puede obtenerse del perfil del usuario o un formulario

    $sql_pedido = "INSERT INTO pedidos (usuario_id, total, tipo_envio, direccion_envio) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql_pedido);
    $stmt->bind_param("idss", $usuario_id, $total, $tipo_envio, $direccion_envio);
    $stmt->execute();

    // Obtener el ID del pedido recién creado
    $pedido_id = $stmt->insert_id;

    // Insertar los detalles del pedido
    foreach ($products as $product) {
        $producto_id = getProductIdByName($product['title'], $conexion);  // Función para obtener el ID del producto
        $cantidad = $product['quantity'];
        $precio = floatval($product['price']);  // Convertir a float

        $sql_detalle = "INSERT INTO detalles_pedido (pedido_id, producto_id, cantidad, precio) VALUES (?, ?, ?, ?)";
        $stmt_detalle = $conexion->prepare($sql_detalle);
        $stmt_detalle->bind_param("iiid", $pedido_id, $producto_id, $cantidad, $precio);
        $stmt_detalle->execute();

        // Actualizar el stock del producto
        $sql_update_stock = "UPDATE productos SET stock = stock - ? WHERE id = ?";
        $stmt_update_stock = $conexion->prepare($sql_update_stock);
        $stmt_update_stock->bind_param("ii", $cantidad, $producto_id);
        $stmt_update_stock->execute();
    }

    // Confirmar la transacción
    $conexion->commit();

    echo json_encode(['success' => true]);

} catch (Exception $e) {
    // Si hay un error, revertir la transacción
    $conexion->rollback();
    echo json_encode(['success' => false, 'message' => 'Error al procesar el pedido.']);
}

// Función para obtener el ID del producto por el nombre
function getProductIdByName($productName, $conexion) {
    $sql = "SELECT id FROM productos WHERE nombre = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $productName);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['id'];
}

?>
