<?php
include "../controller/bdControllador.php";
session_start();
$cliente = new bibliotecaControlador();
if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["age"]) && isset($_POST["nick"]) && isset($_POST["password"])) {
    $nombre = $_POST["name"];
    $edad = $_POST["age"];
    $nick = $_POST["nick"];
    $password = $_POST["password"];
    $id = $_POST["id"];
    $hash = hash('sha256', $password);
    if ($cliente->actualizarCliente($id, $nombre, $edad, $nick, $hash
    )) {
        $titulo = "Confirmación de actualización";
        $mensaje = "¡Actualización completada!";
        $enlaceUrl = "gestionUsuariosView.php";
        $enlaceTexto = "Volver";
        $usuario = $_SESSION['user'];
        $horaInicio = $_SESSION['tiempoSesion'];

        include 'confirmacionTemplate.php';

    } else {
        echo "<h1> Error de actualización </h1> <a href='gestionUsuariosView.php'> Volver </a>";
    }
} else {
    echo "<h1> Error del envio de datos POST </h1> <a href='gestionUsuariosView.php'> Volver </a>";
}






?>