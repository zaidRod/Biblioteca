<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente REST</title>

    <h2>Listar libros</h2>
    <form method="GET" action="">
        <label>ISBN (opcional):</label>
        <input type="text" name="isbn" placeholder="12345678910 ">
        <button type="submit">Listar</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['isbn'])) {
        $isbn = $_GET['isbn'];
        $url = "http://localhost/entornoServidor/Unidad4/Biblioteca/rest/rest_server.php/libros/" . urlencode($isbn);
    } else {
        $url = "http://localhost/entornoServidor/Unidad4/Biblioteca/rest/rest_server.php/libros";
    }

    $response = file_get_contents($url);
    $libros = json_decode($response, true);


    if ($libros != null){
        echo "<ul>";
        foreach ($libros as $unLibro) {
            echo "<li>Titulo: {$unLibro['titulo']}, Autor: {$unLibro['autor']}, Categoria: {$unLibro['categoria']}, ISBN: {$unLibro['isbn']}, Edición: {$unLibro['edicion']}, Promoción: {$unLibro['promocion']}, Fecha: {$unLibro['fecha']}, Portada: {$unLibro['portada']}</li>";
        }
        echo "</ul>";
    }else{
        echo "<p>Error: No se pudieron cargar los datos de los libros.</p>";
    }


    ?>




</head>

<body>

</body>

</html>