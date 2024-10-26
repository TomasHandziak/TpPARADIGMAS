<?php
// Activa la visualización de errores (para el desarrollo)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Establece el encabezado para la respuesta JSON
header('Content-Type: application/json');

// Obtiene la entrada JSON
$data = json_decode(file_get_contents("php://input"), true);

// Verifica si se recibió la entrada
if (isset($data['title'])) {
    // Accede al valor enviado desde JavaScript
    $productoTitle = $data['title'];

    // Aquí puedes realizar cualquier acción con $productoTitle,
    // como consultar la base de datos. Por ejemplo:

    // Supongamos que haces algo con el título, como guardarlo o buscarlo
    // $resultado = buscarProductoEnBaseDeDatos($productoTitle);

    // Respuesta de éxito
    $response = array('success' => true, 'title' => $productoTitle);
} else {
    // Respuesta de error si no se recibió el título
    $response = array('success' => false, 'error' => 'No se recibió el título.');
}

$productoTitle = $data['title'];




// Devuelve la respuesta como JSON
echo json_encode($response);


// Definir la variable que deseas usar
$producto_titulo = $data['title']; // Reemplaza con la variable que necesitas

// 1. Preparar la consulta para obtener el ID del producto
$query_producto = "SELECT id FROM productos WHERE titulo = ?";

// Preparar la declaración
$stmt_producto = $conexion->prepare($query_producto);

if ($stmt_producto) {
    // Vincular parámetros
    $stmt_producto->bind_param("s", $producto_titulo);

    // Ejecutar la consulta
    $stmt_producto->execute();

    // Obtener resultados
    $resultado_producto = $stmt_producto->get_result();

    // Verificar si se encontró el producto
    if ($resultado_producto->num_rows > 0) {
        // Obtener el ID del producto
        $fila_producto = $resultado_producto->fetch_assoc();
        $producto_id = $fila_producto['id'];

        // 2. Definir los valores para el pedido
        $pedido_id = 1; // Suponiendo que el pedido_id es 1
        $cantidad = 1; // Cantidad deseada
        $precio = 200; // Precio del producto

        // 3. Preparar la consulta para insertar en la tabla pedido
        $query_pedido = "INSERT INTO pedidos (pedido_id, producto_id, cantidad, precio) VALUES (?, ?, ?, ?)";

        // Preparar la declaración
        $stmt_pedido = $conexion->prepare($query_pedido);

        if ($stmt_pedido) {
            // Vincular parámetros
            $stmt_pedido->bind_param("iiid", $pedido_id, $producto_id, $cantidad, $precio);

            // Ejecutar la inserción
            if ($stmt_pedido->execute()) {
                echo "Registro insertado en la tabla de pedidos exitosamente.";
            } else {
                echo "Error al insertar el registro en la tabla de pedidos: " . $stmt_pedido->error;
            }

            // Cerrar la declaración de inserción
            $stmt_pedido->close();
        } else {
            echo "Error al preparar la consulta de inserción: " . $conexion->error;
        }
    } else {
        echo "No se encontró el producto con el título especificado.";
    }

    // Cerrar la declaración de selección
    $stmt_producto->close();
} else {
    echo "Error al preparar la consulta de selección: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();


?>

