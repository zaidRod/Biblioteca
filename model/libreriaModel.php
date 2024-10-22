<?php

//Creación de la clase liberia
class LibreriaModel{
    // En esta variable almaceno el contenido del fichero xml. 
    private $ficheroXml= 'model/libreria.xml';
    //Creo la función para cargar los libros y retornarlos en una variable. 
    public function cargarLibros(){
        //Verifico que si exista el fichero antes de cargarlo en la variable. 
        if (file_exists($this->ficheroXml)){
            $libros = simplexml_load_file($this->ficheroXml);
            return $libros;
        }else{
            exit('Error al cargar el xml');
        }

    }


}



?>