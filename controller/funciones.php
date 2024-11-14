<?php
 function verificarSesion()
    {
        $tiempoMaximo = 60*30;
        if (isset($_SESSION['tiempoSesion']) && (time() - $_SESSION['tiempoSesion'] > $tiempoMaximo)) {
            session_unset(); // Borro las variables de sesión
            session_destroy(); // Destruyo la sesión
            header("Location: ../index.php"); // Redirijo al usuario al login
            exit();
        }
    }

    ?>