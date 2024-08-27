<?php 

    session_start();

    include 'conexion_be.php';

    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $password = hash('sha512', $password);

    $validarLogin = mysqli_query($conexion, "SELECT * FROM usurios WHERE mail='$mail' and password='$password'");

    if(mysqli_num_rows($validarLogin) > 0){ 
        $_SESSION['username'] = $mail;
        header("location: ../index_login.php");
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