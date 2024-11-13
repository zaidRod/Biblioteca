<?php
include_once "../model/bibliotecaBd.php";
//Inicio sesión para recibir los datos del usuario.
session_start();
if (isset($_POST['titulo']) && isset($_POST['isbn']) && isset($_POST['fecha'])) {
    $titulo = $_POST['titulo'];
    $isbn = $_POST['isbn'];
    $fecha = $_POST['fecha'];
    $usuario = $_SESSION["user"];
    //Realización del insert
    $consulta = "INSERT INTO `pedidos`(`titulo`, `isbn`, `fecha`, `usuario`) VALUES (?,?,?,?)";
    $accion = BibliotecaBd::consultaInsercion($consulta, $titulo, $isbn, $fecha, $usuario);
    //Verifico si se realiza el pedido
    if ($accion) {
        $titulo = "Pedido realizado";
        $mensaje = "¡Pedido hecho!";
        $enlaceUrl = "../index.php?action=sesionUsuarioYaIniciada";
        $enlaceTexto = "Volver";
        $usuario = $_SESSION['user'];
        $horaInicio = $_SESSION['tiempoSesion'];

        include 'confirmacionTemplate.php';

    } else {
        echo "Problema con la Base de datos";
    }
} else {
    echo "Problema de recepcion de datos post";
}







?>