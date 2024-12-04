<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API SOAP</title>
    <link rel="stylesheet" href="../view/style.css">

    <?php echo "<div class='contenedor'>
<img  class='imagen' src='../view/icono.PNG'>
<p class='textoCab'> API SOAP </p> </div>"; ?>


    <!--  //echo $client->eliminarLibro("12345");
    //echo $client->crearLibro("Milibro", "Yo","ciencia ficcion","12345","1","si","1994-06-29");
 -->
    <div class="titulo"> Bienvenido a la API SOAP de LibroSphere</div>
</head>

<body>

    <div class="contenedorEnlaces">
        <!-- Formulario para creación de libros -->
        <div class="contenedorCentrado">
            <form method="POST" action="">
                <div class="camposForm">
                    <label> Titulo </label>
                    <input required type="text" name="titulo">
                    <label> Autor </label>
                    <input required type="text" name="autor">
                </div>
                <div class="camposForm">
                    <label> Categoria </label>
                    <input required type="text" name="categoria">
                    <label> ISBN </label>
                    <input required type="text" name="isbn">

                </div>
                <div class="camposForm">
                    <label> Edición </label>
                    <input required type="text" name="edicion">
                    <label> Promoción </label>
                    <input required type="text" name="promocion">
                </div>
                <div class="camposForm">
                    <label> Fecha </label>
                    <input required type="date" name="fecha">
                </div>
                <button type="submit" class="boton" name="crear" value="1"> Crear registro </button>
            </form>
        </div>
        <!-- Formulario para consulta de catalogo -->
        <div class="contenedorCentrado">
            <form method="GET" action="">
                <button type="submit" class="boton" name="consultar" value="1"> Consultar catalogo </button>
            </form>
        </div>

        <!-- Formulario para borrado de libros -->
        <div class="contenedorCentrado">
            <form method="GET" action="">
                <label> ISBN </label> <br>
                <input type="text" name="isbn" placeholder="12345678" required>
                <button type="submit" class="boton" name="borrar" value="1"> Eliminar </button>
            </form>
        </div>
    </div>



    <?php
    $options = ['location' => 'http://localhost/entornoServidor/Unidad4/Biblioteca/soap/soap_server.php', 'uri' => 'http://localhost/entornoServidor/Unidad4/Biblioteca/soap/'];
    $client = new SoapClient(null, $options);
    // Listar libros
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['consultar'])): ?>
        <div class='contendoTabla'>
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
            $libros = $client->listarLibros();
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
        </div>
    <?php else:

    endif;

    //Borar libros.
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['borrar']) && isset($_GET['isbn'])) {
        echo "<div class='contenedorCentrado'>" . $client->eliminarLibro($_GET['isbn']) . "</div>";
    }

    //Creación de un libro
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["titulo"]) && isset($_POST["autor"]) && isset($_POST["categoria"]) && isset($_POST["isbn"]) && isset($_POST["edicion"]) && isset($_POST["promocion"]) && isset($_POST["fecha"])) {
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $categoria = $_POST['categoria'];
        $isbn = $_POST['isbn'];
        $edicion = $_POST['edicion'];
        $promocion = $_POST['promocion'];
        $fecha = $_POST['fecha'];

        echo "<div class='contenedorCentrado'>" . $client->crearLibro($titulo, $autor, $categoria, $isbn, $edicion, $promocion, $fecha) . "</div>";


    }

    ?>

</body>

</html>