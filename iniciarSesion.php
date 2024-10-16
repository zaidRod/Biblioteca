743<?php
session_start();

// Este proceso se ejecuta en el servidor y no es visible para el cliente.
if (isset($_POST['user']) && isset($_POST['password'])) {

    // Esto ocurre en el servidor para su posterior verificación.
    $usuario = $_POST['user'];
    $contra = $_POST['password'];

    // Verifico si el usuario y la contraseña son correctos.
    // Esta validación se hace en el servidor para mantener la seguridad.
    if ($usuario == 'admin' && $contra == 'abcdef') {

        // Si las credenciales son correctas, se guarda el usuario en la sesión.
        $_SESSION["user"] = "Admin";

        // También guardo el tiempo de inicio de la sesión para gestionar la duración.
        $_SESSION['tiempoSesion'] = time();

        // Redirijo al usuario a index.php si la autenticación fue exitosa.
        // Esto genera una nueva solicitud al servidor para cargar la página 'index.php'.
        header("Location: index.php");
        exit(); // Se finaliza la ejecución para asegurarse de que no se ejecuta más código.
    } else {
        // Si las credenciales son incorrectas, redirijo al usuario nuevamente a index.php.
        header("Location: index.php");
        exit(); // Se finaliza la ejecución.
    }
}
?>
