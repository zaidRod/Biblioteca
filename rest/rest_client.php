<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente REST</title>
    <link rel="stylesheet" href="../view/style.css">

    <?php echo "<div class='contenedor'>
    <img  class='imagen' src='../view/icono.PNG'>
    <p class='textoCab'> API REST </p> </div>"; ?>

    <div class="contenedorCentrado">
        <form method="GET" action="">
            <label>ISBN (opcional):</label>
            <input  type="text" name="isbn" placeholder="12345678910 ">
            <button type="submit" name="listar " class="boton" value="1">Listar</button>
        </form>
    </div>



    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['isbn'])) {
        $isbn = $_GET['isbn'];
        $url = "http://localhost/entornoServidor/Unidad4/Biblioteca/rest/rest_server.php/libros/" . urlencode($isbn);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['listar'])) {
        $url = "http://localhost/entornoServidor/Unidad4/Biblioteca/rest/rest_server.php/libros";
    } else {
        echo "<div class='contenedorCentrado'> Bienvenido, puedes consultar el catalogo o buscar un libro por ISBN.</div>";
        exit();
    }


    $response = file_get_contents($url);
    $libros = json_decode($response, true);

    echo "<div class='contendorTabla'>";
    if ($libros != null): ?>
        <div class="titulosTabla">
            <div class="col"> Titulo </div>
            <div class="col"> Autor </div>
            <div class="col"> Categoria </div>
            <div class="col"> ISBN </div>
            <div class="col"> Edición </div>
            <div class="col"> Promoción </div>
            <div class="col"> Fecha </div>
            <div class="col"> Portada </div>

        </div>
        <?php

        foreach ($libros as $unLibro): ?>
            <div class="listadoFila">
                <div class="col"><?php echo $unLibro['titulo'] ?></div>
                <div class="col"><?php echo $unLibro['autor'] ?></div>
                <div class="col"><?php echo $unLibro['categoria'] ?></div>
                <div class="col"><?php echo $unLibro['isbn'] ?></div>
                <div class="col"><?php echo $unLibro['edicion'] ?></div>
                <div class="col"><?php echo $unLibro['promocion'] ?></div>
                <div class="col"><?php echo $unLibro['fecha'] ?></div>
                <div class="col"><?php echo $unLibro['portada'] ?></div>
            </div>
        <?php endforeach; ?>
    <?php else:
        echo "<div class='contenedorCentrado'>Error: No se pudieron cargar los datos de los libros.</p>";
    endif;
    ?>
    </div>



</head>

<body>

</body>

</html>