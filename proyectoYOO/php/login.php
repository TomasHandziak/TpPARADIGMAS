<?php 

    session_start();

    include 'conexion_be.php';

    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $validarLogin = mysqli_query($conexion, "SELECT * FROM usuarios WHERE mail='$mail' and password='$password'");

    if(mysqli_num_rows($validarLogin) > 0){ 
        $_SESSION['usuario'] = $mail;
        header("location: ../index.html");
        exit();
    }else {
        echo '
            <script>
            
            alert("Usuario no existe");
            window.location = "../form.php";
            </script>
        
        ';      
        exit();      
    }


?>