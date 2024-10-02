function searchProducts() {
    const input = document.getElementById('searchBar').value.toLowerCase();
    const products = document.querySelectorAll('.product-card');

    products.forEach(product => {
        const title = product.querySelector('h2').textContent.toLowerCase();
        if (title.includes(input)) {
            product.style.display = '';
        } else {
            product.style.display = 'none';
        }
    });
}

function filterProducts() {
    const category = document.getElementById('filterCategory').value;
    const products = document.querySelectorAll('.card');

    products.forEach(product => {
        if (category === 'all' || product.dataset.category === category) {
            product.style.display = '';
        } else {
            product.style.display = 'none';
        }
    });
}

document.getElementById('toggleView').addEventListener('click', function() {
    var container = document.getElementById('productContainer');
    var cards = document.querySelectorAll('.card');
    var icon = document.getElementById('btnIcon');

    if (container.classList.contains('table-view')) {
        container.classList.remove('table-view');
        container.classList.add('list-view');
        console.log(icon);      
        icon.classList.remove('fa-list');
        icon.classList.add('fa-table');

        cards.forEach(function(card) {
            if (card.classList.contains('product-card')) {
                card.classList.remove('product-card');
                card.classList.add('product-card-list');
            }
        });
        
    } else {
        container.classList.remove('list-view');
        container.classList.add('table-view'); 
        icon.classList.remove('fa-table');
        icon.classList.add('fa-list');

        cards.forEach(function(card) {
            if (card.classList.contains('product-card-list')) {
                card.classList.remove('product-card-list');
                card.classList.add('product-card');
            }
        });
    }
});

// carrito

const btnCart = document.querySelector('.container-cart-icon');
const containerCartProducts = document.querySelector('.container-cart-products');


btnCart.addEventListener('click', () => {
    containerCartProducts.classList.toggle('hidden-cart')
})

const cartInfo =  document.querySelector(".cart-product");
const rowProduct = document.querySelector("row-product");
const productsList = document.getElementById("productContainer");

let allProducts = [];





productsList.addEventListener('click', e => {

    if(e.target.classList.contains('btn-add-cart')){
        const product = e.target.parentElement

        const infoProduct = {
            quantity: 1,
            title: product.querySelector('.tittleProduct'),
            price: product.querySelector('.price'),
        };

        console.log(infoProduct);
    }
})