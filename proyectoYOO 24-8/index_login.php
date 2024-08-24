<?php 

    session_start();

    if (!isset($_SESSION['username'])) {
        echo '
        <script> 
            alert("Debes iniciar sesion");
            window.location = "form.php";
        </script>
        ';
        session_destroy(); 
        die();
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="styles/products.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php"><img src="files/logo.png" alt="Logo" class="logo"></a></li>
                <li><a href="index.php">Inicio</a></li>
                <li > <a class="logout" href="php/logout.php">Cerrar Sesión</a></li>                
            </ul>
            <a href="" class="cartBtn"><i class="fa-solid fa-cart-shopping"></i></a>
        </nav>
    </header>    

    <main class="mainContainer">
        <h1>Productos</h1>
        <div class="search-and-filter">
            <input type="text" id="searchBar" placeholder="Buscar productos..." onkeyup="searchProducts()">
            <select id="filterCategory" onchange="filterProducts()">
                <option value="all">Todas las categorías</option>
                <option value="category1">Categoría 1</option>
                <option value="category2">Categoría 2</option>
                <option value="category3">Categoría 3</option>
            </select>
        </div>

        <div id="productContainer" class="product-container">
            <div class="product-card" id="producto1" data-category="category1">
                <img src="files/producto1.png" alt="Producto 1">
                <h2>Producto 1</h2>
                <p>$100</p>
            </div>
            <div class="product-card" id="producto2" data-category="category2">
                <img src="files/producto2.png"  alt="Producto 2">
                <h2>Producto 2</h2>
                <p>$200</p>
            </div>
            <div class="product-card" id="producto3" data-category="category3">
                <img src="files/producto3.png"  alt="Producto 3">
                <h2>Producto 3</h2>
                <p>$300</p>
            </div>
            <!-- Añadir más productos según sea necesario -->
        </div>
    </main>

    <footer>
        <a href=""><i class="fa-brands fa-facebook"></i></a>
       <a href=""><i class="fa-brands fa-instagram"></i></a>
    </footer>

    <script src="js/products.js"></script>
</body>
</html>
