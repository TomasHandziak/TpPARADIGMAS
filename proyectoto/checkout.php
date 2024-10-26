<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra</title>
    <link rel="stylesheet" href="styles/checkout.css">
</head>
<body>
    
    <h2>Información de Envío</h2>
    
    <!-- Formulario para tipo de envío y dirección -->
    <form id="form-envio">
        <h1>Resumen de tu Compra</h1>
        
        <!-- Sección donde se muestran los productos seleccionados -->
        <div id="productos-seleccionados"></div>
        <label for="tipo-envio">Tipo de Envío:</label>
        
        <select id="tipo-envio" name="tipo-envio">
            <option value="retiro">Retiro en tienda</option>
            <option value="envio">Envío a domicilio</option>
        </select>

        <!-- Campo de dirección de envío, oculto por defecto -->
        <div id="direccion-envio" style="display: none;">
            <label for="direccion">Dirección de envío:</label>
            <input type="text" id="direccion" name="direccion" placeholder="Ingresa tu dirección">
        </div>

        <!-- Mostrar el total de la compra -->
        <div class="cart-total">
            <h3>Total de la compra:</h3>
            <span id="total-compra">$0</span>
        </div>

        <button type="submit">Confirmar Compra</button>
    </form>

    <script src="js/checkout.js"></script>
</body>
</html>
