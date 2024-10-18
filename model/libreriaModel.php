<?php
class LibreriaModel{

    private $ficheroXml= 'model/libreria.xml';

    public function cargarLibros(){
        if (file_exists($this->ficheroXml)){
            $libros = simplexml_load_file($this->ficheroXml);
            return $libros;
        }else{
            exit('Error al cargar el xml');
        }

    }


}



?>