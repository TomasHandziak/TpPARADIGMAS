// Mostrar productos seleccionados en la página de checkout
document.addEventListener('DOMContentLoaded', () => {
    const productosSeleccionados = JSON.parse(localStorage.getItem('productosCarrito'));
    const productosDiv = document.getElementById('productos-seleccionados');

    productosSeleccionados.forEach(producto => {
        const productoHTML = `
            <div>
                <p>${producto.title} - Cantidad: ${producto.quantity} - Precio: ${producto.price}</p>
            </div>
        `;

            // Suponiendo que tienes una variable en JS llamada "productoTitle"
        let productoTitle = producto.title;
        console.log(producto.title);

        // Función para enviar datos a PHP
        function enviarDatos() {
            fetch('php/procesar_pedido.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ title: productoTitle })
            })
            .then(response => response.json()) // Asegúrate de que el PHP devuelva JSON
            .then(data => {
                console.log('Respuesta de PHP:', data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        // Llama a la función para enviar los datos
        enviarDatos();

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
        direccion: direccion || 'No se requiere dirección',
        productos: JSON.parse(localStorage.getItem('productosCarrito')),
    };

    fetch('php/ procesar_compra.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(detallesCompra)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            alert('Compra procesada con éxito');
        } else {
            alert('Error al procesar la compra: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al procesar la compra');
    });
});


// Calcular el total de la compra
function calcularTotal() {
    const productos = JSON.parse(localStorage.getItem('productosCarrito'));
    return productos.reduce((total, producto) => total + producto.quantity * parseFloat(producto.price.slice(1)), 0);
}
