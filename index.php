<!-- Se le indica al servidor que se iniciara una sesión, por lo que el servidor gestiona el usuario -->
<?php
//Importo el fichero de controlador
require_once 'controller/libreriaController.php';
$controller = new LibreriaController();
session_start() ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Index </title>
    <link rel="stylesheet" href="view/style.css">
</head>

<body>

    <?php
    //Se solicita al servidor la cabecera de la web, por lo que él envia como respuesta el archivo HTML.
    // Asi mismo, este archivo se despliega e interpreta el HTML en la pantalla del cliente. 
    include "view/cabecera.html";
    // El servidor envia el mensaje con la clase para que pueda ser renderizado por la parte del cliente.
    echo "<p class='textoCab'> Pantalla de index.php </p> </div>";

    // Compruebo si se ha redirijido con la acción del login
    if (isset($_GET['action'])) {
        $action = $_GET['action'];

        switch ($action) {
            case "login":
                $controller->iniciarSesion();
                break;
            case "cerrarSesion":
                $controller->cerrarSesion();
                break;
            case "sesionUsuarioYaIniciada":
                //Llamada al controlador para recargar la vista de usuario con el listado de libros.
                $controller->retomarSesion();
                break;
            case "reanudarSesionAdmin":
                //Llamada al controlador para recargar la vista de usuario con el listado de libros.
                $controller->retomarSesionAdmin();
                break;



        }
    } else {
        include 'view/formularioInicio.html';
    }


    ?>

</body>

</html>