// Mostrar productos seleccionados en la página de checkout

console.log("conectado");
document.addEventListener('DOMContentLoaded', () => {
    const productosSeleccionados = JSON.parse(localStorage.getItem('productosCarrito'));
    const productosDiv = document.getElementById('productos-seleccionados');

    productosSeleccionados.forEach(producto => {
        const productoHTML = `
            <div>
                <p>${producto.title} - Cantidad: ${producto.quantity} - Precio: ${producto.price}</p>
            </div>
        `;
        productosDiv.innerHTML += productoHTML;
    });
});

// Mostrar campo de dirección si el tipo de envío es "envío a domicilio"
const tipoEnvio = document.getElementById('tipo-envio');
const direccionEnvio = document.getElementById('direccion-envio');

tipoEnvio.addEventListener('change', () => {
    if (tipoEnvio.value === 'envio') {
        direccionEnvio.style.display = 'block';
    } else {
        direccionEnvio.style.display = 'none';
    }
});

// Manejar la confirmación de la compra
const formEnvio = document.getElementById('form-envio');
formEnvio.addEventListener('submit', (e) => {
    e.preventDefault();

    const tipo = tipoEnvio.value;
    const direccion = document.getElementById('direccion').value;
    const detallesCompra = {
        tipoEnvio: tipo,
        direccion: direccion ? direccion : 'No se requiere dirección',
        productos: JSON.parse(localStorage.getItem('productosCarrito')),
    };

    console.log('Detalles de la compra:', detallesCompra);
    // Aquí puedes proceder a guardar los datos en la base de datos o hacer el procesamiento del pago
});
