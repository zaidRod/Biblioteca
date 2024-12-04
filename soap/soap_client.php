<?php
$options = ['location' => 'http://localhost/entornoServidor/Unidad4/Biblioteca/soap/soap_server.php', 'uri' => 'http://localhost/entornoServidor/Unidad4/Biblioteca/soap/'];
$client = new SoapClient(null, $options);


// Listar empleados
$libros = $client->listarLibros();

echo "<ul>";
foreach ($libros as $unLibro) {
    echo "<li>Titulo: {$unLibro['titulo']}, Autor: {$unLibro['autor']}, Categoria: {$unLibro['categoria']}, ISBN: {$unLibro['isbn']}, Edición: {$unLibro['edicion']}, Promoción: {$unLibro['promocion']}, Fecha: {$unLibro['fecha']}, Portada: {$unLibro['portada']}</li>";
}
echo "</ul>";

//echo $client->eliminarLibro("12345");
//echo $client->crearLibro("Milibro", "Yo","ciencia ficcion","12345","1","si","1994-06-29");




?>