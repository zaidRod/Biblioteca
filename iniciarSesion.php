<?php
//Inico de sesion
session_start();

if (isset($_POST['user']) && isset($_POST['password'])) {
    // Si los datos llegar los guardo en variables
    $usuario = $_POST['user'];
    $contra = $_POST['password'];

    // Verifico que sean los correctos y en caso contratio lo mando al index
    if ($usuario == 'admin' && $contra == '123') {

        //session_id(md5("LIBROSPHERE"));
        //Guardo los datos en la sesion
        $_SESSION["user"] = "Admin";
        //Tiempo de la sesion
        $_SESSION['tiempoSesion'] = time();

        //Redirijo al usuario a index.php
        header("Location: index.php");
    } else {
        header("Location: index.php");
    }

}
?>