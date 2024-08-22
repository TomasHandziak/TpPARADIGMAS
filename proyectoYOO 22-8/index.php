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
    <title>Ecommerce</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <header>
        <nav>
            <ul>
                <li><a href="#"><img src="files/logo.png" alt="Logo" class="logo"></a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Products</a></li>
                <li class="profile"><a href="form.php"><i class="fa-solid fa-user"></i></a></li>
            </ul>
        </nav>
    </header>       
    <main>
        <h1>Bienvenido a GameSociety</h1>
    </main>
    
</body>
</html>