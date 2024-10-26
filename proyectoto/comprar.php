<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar - Smoke Society</title>
    <link rel="stylesheet" href="styles/comprar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <?php
    // Incluir la conexión a la base de datos
    include 'php/conexion_be.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verificar que las claves existen
        if (isset($_POST['usuario']) && isset($_POST['precio']) && isset($_POST['envio']) &&
            isset($_POST['idProducto']) && isset($_POST['titulo'])) {
    
            // Recoger los datos enviados por el formulario
            $usuarioId = $_POST['usuario']; // ID del usuario
            $fechaPedido = date('Y-m-d H:i:s'); // Fecha y hora actual
            $total = $_POST['precio']; // Inicializar el total
            $tipoEnvio = $_POST['envio']; // Tipo de envío
            $productoId = $_POST['idProducto']; // ID del producto
            $titulo = $_POST['titulo']; // Título del producto
    
            // Verificar si se necesita dirección
            $direccionEnvio = ($tipoEnvio === 'domicilio') ? $_POST['address'] : null;
    
            // Validar los datos
            if(empty($usuarioId) || empty($total) || empty($tipoEnvio)) {
                echo "Por favor complete todos los campos obligatorios.";
                exit;
            }
    
            // Consulta para insertar el pedido
            $sql = "INSERT INTO pedidos (usuario_id, fecha_pedido, total, tipo_envio, direccion_envio) VALUES (?, ?, ?, ?, ?)";
    
            // Preparar la consulta
            if ($stmt = $conexion->prepare($sql)) {
                // Vincular los parámetros
                $stmt->bind_param("issss", $usuarioId, $fechaPedido, $total, $tipoEnvio, $direccionEnvio);
    
                // Ejecutar la consulta
                if ($stmt->execute()) {
                    echo "Pedido realizado con éxito.";
                } else {
                    echo "Error al realizar el pedido: " . $stmt->error;
                }
    
                // Cerrar la declaración
                $stmt->close();
            } else {
                echo "Error al preparar la consulta: " . $conexion->error;
            }
    
            // Cerrar la conexión
            $conexion->close();
        } else {
            echo "Por favor complete todos los campos obligatorios.";
        }
    } else {
        echo "Método no permitido.";
    }
    

    ?>



        <form action="comprar.php" method="post">
            <div class="form-group">
            <label for="payment">Tipo de envio:</label>
                <select id="envio" name="envio" required>
                    <option value="domicilio">Envio a domicilio</option>
                    <option value="retirar">Retirar en el local</option>
                </select>
            </div>
            <div class="form-group">
                <label for="address">Dirección:</label>
                <input type="text" id="address" name="address" required>
            </div>


            <div class="form-group">
                <label for="payment">Medio de Pago:</label>
                <select id="payment" name="payment" required>
                    <option value="credit_card">Tarjeta de Crédito</option>
                    <option value="paypal">PayPal</option>
                    <option value="bank_transfer">Transferencia Bancaria</option>
                </select>
            </div>
            <div class="form-group">
                <label for="product">Producto:</label>
                <?php
                $productoId = $_POST['idProducto']; // Cambiado de 'id' a 'idProducto'
                $titulo = $_POST['titulo'];
                $username = $_POST['usuario'];
                $precio = $_POST['precio'];
                echo 'Hola <input type="text" value="' . htmlspecialchars($username) . '" readonly onmousedown="return false;" />';
                echo 'Estas comprando este producto <input type="text" value="' . htmlspecialchars($titulo) . '" readonly onmousedown="return false;" />';
                echo 'Precio <input type="text" value="' . htmlspecialchars($precio) . '" readonly onmousedown="return false;" />';

               ?>

                

            </div>
            <button type="submit" class="btn-submit">Enviar Pedido</button>
        </form>
    </div>

</body>
</html>