<?php 

    session_start();

    if (isset($_SESSION['username'])) {
        header("location: index_login.php");
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
                <li class="profile"><a href="form.php"><i class="fa-solid fa-user"></i></a></li>                
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
                <option value="monitores">Monitores</option>
                <option value="perifericos">Perifericos</option>
                <option value="almacenamiento">Almacenamiento</option>
                <option value="ram">Memorias Ram</option>
                <option value="video">Placas de Video</option>
                <option value="mothers">Mothers</option>
                <option value="fuentes">Fuentes</option>
                <option value="conectividad">Conectividad</option>
                <option value="equipos">Equipos y Notebooks</option>
                <option value="refrigeracion">Refrigeracion</option>
                <option value="gabinetes">Gabinetes</option>
                <option value="procesadores">Procesadores</option>
            </select>
        </div>

        <div id="productContainer" class="product-container">
            <div class="product-card" id="producto1" data-category="monitores">
                <img src="files/monitor.png" alt="Monitores">
                <h2>Monitores</h2>
                <p>$100</p>
            </div>
            <div class="product-card" id="producto2" data-category="almacenamiento">
                <img src="files/almacenamiento.jpg"  alt="almacenamiento">
                <h2>Almacenamiento</h2>
                <p>$200</p>
            </div>
            <div class="product-card" id="producto3" data-category="procesadores">
                <img src="files/procesador.jpg"  alt="Procesadores">
                <h2>Procesadores</h2>
                <p>$300</p>
            </div>
            <div class="product-card" id="producto3" data-category="video">
                <img src="files/4090.jpg"  alt="Placas de videos">
                <h2>Placas de video</h2>
                <p>$300</p>
            </div>
            <div class="product-card" id="producto3" data-category="perifericos">
                <img src="files/mouse.jpg"  alt="Perifericos">
                <h2>Mouse Gamer Inalambrico Logitech G Pro X Superlight Hero Usb</h2>
                <p>$300</p><br>
                <p></p>
            </div>
        </div>
    </main>

    <footer>
        <a href=""><i class="fa-brands fa-facebook"></i></a>
       <a href=""><i class="fa-brands fa-instagram"></i></a>
    </footer>

    <script src="js/products.js"></script>
</body>
</html>
