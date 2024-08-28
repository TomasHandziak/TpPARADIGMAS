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
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="styles/productsLogin.css">
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
            <div class="view-toggle">
                <button id="toggleView"><i id="btnIcon" class="fa-solid fa-list"></i></button>
            </div>
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


        <div id="productContainer" class="table-view">
            <div class="product-card card" id="producto1" data-category="monitores">
                <img src="files/monitor.png" alt="Monitores">
                <div class="textCard">
                    <h2>Monitores</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita debitis saepe eius, corporis soluta esse dolore quas tenetur nulla numquam maxime consequuntur aliquam veniam facere vitae obcaecati, quisquam eaque quaerat.</p>
                </div>
                <p class="price">$100</p>
                <button>Comprar</button>
            </div>
            <div class="product-card card" id="producto2" data-category="almacenamiento">
                <img src="files/almacenamiento.jpg"  alt="almacenamiento">
                <div class="textCard">
                    <h2>Almacenamiento</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita debitis saepe eius, corporis soluta esse dolore quas tenetur nulla numquam maxime consequuntur aliquam veniam facere vitae obcaecati, quisquam eaque quaerat.</p>
                </div>
                <p class="price">$200</p>
                <button>Comprar</button>
            </div>
            <div class="product-card card" id="procesadores" data-category="procesadores">
                <img src="files/procesador.jpg"  alt="Procesadores">
                <div class="textCard">
                    <h2>Procesadores</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita debitis saepe eius, corporis soluta esse dolore quas tenetur nulla numquam maxime consequuntur aliquam veniam facere vitae obcaecati, quisquam eaque quaerat.</p>
                </div>
                <p class="price">$300</p>
                <button>Comprar</button>
            </div>
            <div class="product-card card" id="video" data-category="video">
                <img src="files/4090.jpg"  alt="Placas de videos">
                <div class="textCard">
                    <h2>Placa de videos</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita debitis saepe eius, corporis soluta esse dolore quas tenetur nulla numquam maxime consequuntur aliquam veniam facere vitae obcaecati, quisquam eaque quaerat.</p>
                </div>
                <p class="price">$300</p>
                <button>Comprar</button>
            </div>
            <div class="product-card card" id="perifericos" data-category="perifericos">
                <img src="files/mouse.jpg"  alt="Perifericos">
                <div class="textCard">
                    <h2>Mouse Logitech G PRO X</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita debitis saepe eius, corporis soluta esse dolore quas tenetur nulla numquam maxime consequuntur aliquam veniam facere vitae obcaecati, quisquam eaque quaerat.</p>
                </div>
                <p class="price">$300</p>
                <button>Comprar</button>
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
