<?php
session_start();
include "../controller/bdControllador.php";
$cliente = new bibliotecaControlador();
if (isset($_POST["id"]) && isset($_POST["titulo"]) && isset($_POST["isbn"]) && isset($_POST["fecha"]) && isset($_POST["usuario"])) {
    $titulo = $_POST["titulo"];
    $isbn = $_POST["isbn"];
    $fecha = $_POST["fecha"];
    $usuario = $_POST["usuario"];
    $id = $_POST["id"];

    if (
        $cliente->actualizarPedido(
            $id,
            $titulo,
            $isbn,
            $fecha,
            $usuario

        )
    ) {
        $titulo = "Confirmación de actualización";
        $mensaje = "¡Actualización completada!";
        $enlaceUrl = "gestionPedidosView.php";
        $enlaceTexto = "Volver";
        $usuario = $_SESSION['user'];
        $horaInicio = $_SESSION['tiempoSesion'];

        include 'confirmacionTemplate.php';

    } else {
        echo "<h1> Error de actualización </h1> <a href='gestionPedidosView.php'> Volver </a>";
    }
} else {
    echo "<h1> Error del envio de datos POST </h1> <a href='gestionPedidosView.php'> Volver </a>";
}


