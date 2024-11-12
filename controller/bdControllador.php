<?php
require_once '../model/bibliotecaBd.php';
class bibliotecaControlador
{
    public function listarClientes()
    {
        $consulta = "SELECT * FROM `usuarios`";
        $usuarios = BibliotecaBd::consultaLectura($consulta);
        include '../view/listadoClientes.php';
    }

    public function cargarCliente($id)
    {
        $consulta = "SELECT * FROM `usuarios` WHERE `id` = ?";
        $usuarios = BibliotecaBd::consultaLectura($consulta, $id);
        //Cargo en el usuario el primer resultado del array
        $usuario = $usuarios = true ? $usuarios[0] : null;
        include 'actualizacionClienteView.php';
    }

    public function actualizarCliente($id, $nombre, $edad, $nick, $contrasena)
    {
        $consulta = "UPDATE usuarios set nombre =?, edad =?, nick_usuario=?, contrasena=? where id = ?";
        $actualizacion = BibliotecaBd::consultaInsercion($consulta, $nombre, $edad, $nick, $contrasena, $id);
        /* si se realiza la actualización retorna un true */
        return $actualizacion;

    }

    public function eliminarCiente($id)
    {
        $consulta = "DELETE from usuarios where id=?";
        $eliminacion = BibliotecaBd::consultaInsercion($consulta,$id);
        /* si se realiza la eliminación retorna un true */
        return $eliminacion;

    }



}





?>