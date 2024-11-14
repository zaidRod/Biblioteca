<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de usuarios</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    //Para poder usar los datos de la sesion.
    session_start();
    include "../controller/bdControllador.php";
    include "../controller/funciones.php";
    echo "<div class='contenedor'>
    <img  class='imagen' src='icono.PNG'>
    <p class='textoCab'> Control de clientes </p> </div>";

    if (isset($_SESSION["user"]) && isset($_SESSION["tiempoSesion"])) {
        $usuario = $_SESSION["user"];
        $horaInicio = date('h:i:s A', $_SESSION["tiempoSesion"]);  // Formatear la hora de inicio
        verificarSesion();
        // Mostrar las variables de sesión
        echo "<div class='campoUsuario'>
                <div> user: $usuario | hora de inicio: $horaInicio </div>
              </div>";
        //Botones de cerrar sesion y volver
        echo "<div class='contenedorBotones'>
                <a class='boton' href='../index.php?action=reanudarSesionAdmin'> Volver </a> 
                <a class='boton' href='../index.php?action=cerrarSesion'> Cerrar sesión </a>
             </div>";
    } else {
        // Si no hay sesión, mostrar un mensaje
        echo "<p>No se ha iniciado sesión o la sesión ha expirado.</p>";
    }

    $listado = new bibliotecaControlador();


    $accion = isset($_GET['action']) ? $_GET['action'] : null;
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    switch ($accion) {
        case 'editar':
            $listado->cargarCliente($id);
            break;
        case 'borrar':
            if ($listado->eliminarCiente($id)) {
            } else {
                echo "<script> alert('Error en el borrado')</script>";
            }
            // No coloco el break para que cargue de nuevo el listado de los usuarios. 



        default:
            $listado->listarClientes();
            break;
    }



    ?>

</body>

</html>