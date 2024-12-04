<?php
class BibliotecaService{
    private $xmlFile = "../model/libreria.xml";

    

    public function listarLibros() {
        $libros = simplexml_load_file($this->xmlFile);
        foreach ($libros->libro as $unLibro) {
                $result[] = [
                    'titulo' => (string) $unLibro->titulo,
                    'autor' => (string) $unLibro->autor,
                    'categoria' => (string) $unLibro->categoria,
                    'isbn' => (string) $unLibro->isbn,
                    'edicion' => (string) $unLibro->edicion,
                    'promocion' => (string) $unLibro->promocion,
                    'fecha' => (string) $unLibro->fecha,
                    'portada' => (string) $unLibro->portada,
                ];
        }
        return $result;
    }

    public function  crearLibro($titulo,$autor,$categoria,$isbn,$edicion,$promocion,$fecha){
        $xml= simplexml_load_file($this->xmlFile);
        $nuevoLibro = $xml->addChild("libro");
        $nuevoLibro->addChild('titulo', $titulo);
        $nuevoLibro->addChild('autor', $autor);
        $nuevoLibro->addChild('categoria', $categoria);
        $nuevoLibro->addChild('isbn', $isbn);
        $nuevoLibro->addChild('edicion', $edicion);
        $nuevoLibro->addChild('promocion', $promocion);
        $nuevoLibro->addChild('fecha', $fecha);
        $nuevoLibro->addChild('portada', "portada_1.png");
        $xml -> asXML($this->xmlFile);
        return "Libro añadido correctamente";

    }

    public function eliminarLibro($isbn) {
        $xml= simplexml_load_file($this->xmlFile);
        $index= 0;
        foreach ($xml->libro as $unLibro) {
            if ((string)$unLibro->isbn ===$isbn){
                unset($xml->libro[$index]);
                $xml -> asXML($this->xmlFile);
                return "Libro eliminado correctamente.";                
            }
            $index++;

        }
        return "Libro no encontrado.";

        
    }

}


$options = ['uri'=>'http://localhost/entornoServidor/Unidad4/Biblioteca/soap/soap_server.php'];
$server = new SoapServer(null, $options);
$server->setClass('BibliotecaService');
$server->handle();



?>