<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    session_start();
    include "cabecera.html";
    // El servidor envia el mensaje con la clase para que pueda ser renderizado por la parte del cliente.
    echo "<p class='textoCab'> Pantalla de usuario.php </p> </div>";
    
    //Almacenamiento de las variables
    $horaInicio = date('h:i:s A', $_SESSION["tiempoSesion"]);
    $usuario = $_SESSION["user"];
    $tiempoMaximo = 60 * 30;
    // El servidor responde con la información del usuario y la hora de inicio. 
    echo "<p class='campoUsuario'> user: $usuario | hora de inicio: $horaInicio </p>";
    echo " <p class='titulo'> Bienvenido a LibroSphere <p> ";


    //Terminación de la sesion
    if (time() - $_SESSION["tiempoSesion"] > $tiempoMaximo) {
        // Destruir la sesión si ha pasado más de 2 minutos
        session_unset();//Borro las variables
        session_destroy(); // Destruir la sesión
        header("Location: index.php"); // Redirigir al usuario al login 
        exit();
    } 


    ?>

</body>

</html>


<?php


/* echo "vista de usuario";
 //Verificación de si se ha iniciado la sesión, apartado que se ejecuta en el servidor.
 if (isset($_SESSION["user"]) && $_SESSION['user'] == "Admin") {
    //Almacenamiento de las variables
    $horaInicio = date('h:i:s A', $_SESSION["tiempoSesion"]);
    $usuario = $_SESSION["user"];
    $tiempoMaximo = 60 * 30;
    // El servidor responde con la información del usuario y la hora de inicio. 
    echo "<p class='campoUsuario'> user: $usuario | hora de inicio: $horaInicio </p>";
    echo " <p class='titulo'> Bienvenido a LibroSphere <p> ";


    //Terminación de la sesion
    if (time() - $_SESSION["tiempoSesion"] > $tiempoMaximo) {
        // Destruir la sesión si ha pasado más de 2 minutos
        session_unset();//Borro las variables
        session_destroy(); // Destruir la sesión
        header("Location: index.php"); // Redirigir al usuario al login 
        exit();
    }

    // Si el usuario no es "Admin" o la sesión no está iniciada, se solicita al servidor el formulario de inicio de sesión.
    // El servidor envía el formulario "formularioInicio.html" como parte de la respuesta HTML.
} else {

    include "formularioInicio.html";
} */
?>