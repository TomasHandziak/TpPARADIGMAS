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
    <title>Ecommerce</title>
    <link rel="stylesheet" href="styles/styleLogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <header>
        <nav>
            <ul>
                <li><a href="#"><img src="files/logo.png" alt="Logo" class="logo"></a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><input type="text" placeholder="Search..."></li>
                <li><button><i class="fa-solid fa-magnifying-glass"></i></button></li>
                <li class="logout"><a href="php/logout.php">Cerrar Sesión</a></li>

            </ul>
        </nav>
    </header>        
    <main>
        <div class="hero">
            <h1>Bienvenido <b class="username"><?php echo htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8'); ?></b> a Game Society</h1>
        </div>
        <section class="products">
            <div class="product">
                <img src="files/product1.jpg" alt="Producto 1">
                <h2>Hyperx Cloud Stinger 2 Wireless</h2>
                <p>Audio espacial DTS® Headphone:X®.
                    Batería de larga duración.
                    Comodidad exclusiva de HyperX.
                    Conexión inalámbrica fiable de 2,4 Ghz.</p>
                <button>Comprar</button>
            </div>
            <div class="product">
                <img src="product2.jpg" alt="Producto 2">
                <h2>Producto 2</h2>
                <p>Descripción breve del producto 2.</p>
                <button>Comprar</button>
            </div>
            <div class="product">
                <img src="product3.jpg" alt="Producto 3">
                <h2>Producto 3</h2>
                <p>Descripción breve del producto 3.</p>
                <button>Comprar</button>
            </div>
        </section>
        <section class="categories">
            <div class="category">
                <img src="category1.jpg" alt="Categoría 1">
                <h2>Categoría 1</h2>
            </div>
            <div class="category">
                <img src="category2.jpg" alt="Categoría 2">
                <h2>Categoría 2</h2>
            </div>
            <div class="category">
                <img src="category3.jpg" alt="Categoría 3">
                <h2>Categoría 3</h2>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Tu Tienda de Insumos Informáticos Game Society. Todos los derechos reservados.</p>
    </footer>
</body>
</html>