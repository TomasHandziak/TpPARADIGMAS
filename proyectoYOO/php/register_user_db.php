<?php 

    include 'conexion_be.php';

    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    $username = $_POST['username'];

    $query = "INSERT INTO usurios(name, username, mail, password) 
              VALUES ('$name','$username','$mail','$password')";

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script> 
                alert("")
            </script>
        '
    }
?>