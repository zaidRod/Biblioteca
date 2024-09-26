<?php session_start() ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Index </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include "cabecera.html";
    //Verificación de si se ha iniciado la sesión
    if (isset($_SESSION["user"]) && $_SESSION['user'] == "Admin") {
        //Almacenamiento de las variables
        $horaInicio = date('h:i:s A', $_SESSION["tiempoSesion"]);
        $usuario = $_SESSION["user"];
        $tiempoMaximo = 120;

        echo "<p class='campoUsuario'> user: $usuario | hora de inicio: $horaInicio </p>";
        echo " <h1> Bienvenido a LibroSphere </h1> ";

        //Terminación de la sesion
        if (time() - $_SESSION["tiempoSesion"] > $tiempoMaximo) {
            // Destruir la sesión si ha pasado más de 2 minutos
            session_unset();//Borro las variables
            session_destroy(); // Destruir la sesión
            header("Location: index.php"); // Redirigir al usuario al login 
            exit();
        }
        //En caso contrario se lleva al formulario
    } else {
        include "formularioInicio.html";
    }
    ?>

</body>

</html>