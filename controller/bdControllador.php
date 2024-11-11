<?php
require_once '../model/bibliotecaBd.php';
class bibliotecaControlador{
    public function listarClientes(){
        $consulta = "SELECT * FROM `usuarios`" ;
        $usuarios = BibliotecaBd::consultaLectura($consulta);
        include '../view/listadoClientes.php';
    }

}



?>