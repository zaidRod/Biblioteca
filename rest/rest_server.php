<?php
header("Content-Type: application/json");


$method = $_SERVER['REQUEST_METHOD'];
$pathInfo = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : null;
$request = $pathInfo ? explode('/', trim($pathInfo, '/')) : [];

// Función para retornar el total de libros.

function retornarLibros($isbn = null)
{
    $xmlFile = "../model/libreria.xml";
    //$controller = new LibreriaController();
    $libros = simplexml_load_file(  $xmlFile);

    foreach ($libros->libro as $unLibro) {
        if ($isbn == null || (string) $unLibro->isbn === $isbn) {
            $consulta[] = [
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
    }
    return $consulta;
}

//Procesar la solicitud.
if ($method == 'GET') {

    if (isset($request[0]) && $request[0] === 'libros') {
        $isbn = isset($request[1]) ? $request[1] : null;
        echo json_encode(retornarLibros($isbn));
    } else {
        http_response_code(404);
        echo json_encode(["error" => "Recurso no encontrado"]);
    }


} else {
    http_response_code(400);
    echo json_encode(["error" => "Error con el método solicitado"]);
}




