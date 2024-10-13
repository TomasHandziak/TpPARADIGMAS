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
                <li class="profile"><div class="dropdown">
                                        <button class="dropbtn"><i class="fa-solid fa-user"></i></button>
                                        <div class="dropdown-content">
                                            <div class="profile-image-container">
                                                <img src="files/profile.png" alt="Imagen de Perfil" class="profile-image">
                                                <h2 class="profile-name"><?php echo $_SESSION['username'] ?></h2>
                                            </div>  
                                            <a href="/mi-perfil">Mi Perfil</a>
                                            <a href="/mis-pedidos">Mis Pedidos</a>
                                            <a href="" class="cartBtn-drop">Carrito</a>
                                            <a class="logout" href="php/logout.php">Cerrar Sesión</a>
                                        </div>
                                    </div>
                                </li>
            </ul>
            <div class="container-icon">

                <div class="container-cart-icon">
				<svg
					xmlns="http://www.w3.org/2000/svg"
					fill="none"
					viewBox="0 0 24 24"
					stroke-width="1.5"
					stroke="currentColor"
					class="icon-cart"
				>
					<path
						stroke-linecap="round"
						stroke-linejoin="round"
						d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"
					/>
				</svg>
				<div class="count-products">
					<span id="contador-productos">0</span>
				</div>
            </div>
				<div class="container-cart-products hidden-cart">
                    <div class="row-product">
                        <div class="cart-product">
                            <div class="info-cart-product">
                                <span class="cantidad-producto-carrito">1</span>
                                <p class="titulo-producto-carrito">Comienza a comprar</p>
                                <span class="precio-producto-carrito">$free</span>
                            </div>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="icon-close"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </div>
                    </div>
                    <div class="cart-total">
                        <h3>Total:</h3>
                        <span class="total-pagar">$200</span>
                    </div>
				</div>
			</div>
        </nav>
    </header>    

    <main class="mainContainer">
        <h1>Productos</h1>
        <div class="search-and-filter">
            <div class="view-toggle">
                <input type="text" id="searchBar" placeholder="Buscar productos..." onkeyup="searchProducts()">
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
                    <h2 class="titleProduct">Monitores</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita debitis saepe eius, corporis soluta esse dolore quas tenetur nulla numquam maxime consequuntur aliquam veniam facere vitae obcaecati, quisquam eaque quaerat.</p>
                </div>
                <p class="price">$100</p>
                <button class="btn-add-cart">Comprar</button>
            </div>
            <div class="product-card card" id="producto2" data-category="almacenamiento">
                <img src="files/almacenamiento.jpg"  alt="almacenamiento">
                <div class="textCard">
                    <h2 class="titleProduct">Almacenamiento</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita debitis saepe eius, corporis soluta esse dolore quas tenetur nulla numquam maxime consequuntur aliquam veniam facere vitae obcaecati, quisquam eaque quaerat.</p>
                </div>
                <p class="price">$200</p>
                <button class="btn-add-cart">Comprar</button>
            </div>
            <div class="product-card card" id="procesadores" data-category="procesadores">
                <img src="files/procesador.jpg"  alt="Procesadores">
                <div class="textCard">
                    <h2 class="titleProduct">Procesadores</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita debitis saepe eius, corporis soluta esse dolore quas tenetur nulla numquam maxime consequuntur aliquam veniam facere vitae obcaecati, quisquam eaque quaerat.</p>
                </div>
                <p class="price">$300</p>
                <button class="btn-add-cart">Comprar</button>
            </div>
            <div class="product-card card" id="video" data-category="video">
                <img src="files/4090.jpg"  alt="Placas de videos">
                <div class="textCard">
                    <h2 class="titleProduct">Placa de videos</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita debitis saepe eius, corporis soluta esse dolore quas tenetur nulla numquam maxime consequuntur aliquam veniam facere vitae obcaecati, quisquam eaque quaerat.</p>
                </div>
                <p class="price">$300</p>
                <button class="btn-add-cart">Comprar</button>
            </div>
            <div class="product-card card" id="perifericos" data-category="perifericos">
                <img src="files/mouse.jpg"  alt="Perifericos">
                <div class="textCard">
                    <h2 class="titleProduct">Mouse Logitech G PRO X</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita debitis saepe eius, corporis soluta esse dolore quas tenetur nulla numquam maxime consequuntur aliquam veniam facere vitae obcaecati, quisquam eaque quaerat.</p>
                </div>
                <p class="price">$300</p>
                <button class="btn-add-cart">Comprar</button>
            </div>
        </div>
       
    </main>

    <footer>
        <a href=""><i class="fa-brands fa-facebook"></i></a>
       <a href=""><i class="fa-brands fa-instagram"></i></a>
    </footer>

    <script src="js/index-login.js"></script>
</body>
</html>
