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
        echo "Pedido realizado";
        //Redirijo al index un parametro get para luego poder cargar los libros del usuario. 
        echo "<a href='../index.php?action=sesionUsuarioYaIniciada'> Volver al listado de productos. </a>";
    } else {
        echo "Problema con la Base de datos";
    }
} else {
    echo "Problema de recepcion de datos post";
}







?>