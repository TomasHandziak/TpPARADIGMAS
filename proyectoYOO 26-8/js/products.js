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
    const products = document.querySelectorAll('.product-card');

    products.forEach(product => {
        if (category === 'all' || product.dataset.category === category) {
            product.style.display = '';
        } else {
            product.style.display = 'none';
        }
    });
}
