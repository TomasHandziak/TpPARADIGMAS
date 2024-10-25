<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra</title>
    <link rel="stylesheet" href="styles/checkout.css">
</head>
<body>
    <h1>Resumen de tu Compra</h1>
    <div id="productos-seleccionados"></div>

    <h2>Información de Envío</h2>
    <form id="form-envio">
        <label for="tipo-envio">Tipo de Envío:</label>
        <select id="tipo-envio" name="tipo-envio">
            <option value="retiro">Retiro en tienda</option>
            <option value="envio">Envío a domicilio</option>
        </select>

        <div id="direccion-envio" style="display: none;">
            <label for="direccion">Dirección de envío:</label>
            <input type="text" id="direccion" name="direccion">
        </div>

        <button type="submit">Confirmar Compra</button>
    </form>

    <script src="js/checkout.js"></script>
</body>
</html>
