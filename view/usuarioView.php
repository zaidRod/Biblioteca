<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    //Almacenamiento de las variables
    $horaInicio = date('h:i:s A', $_SESSION["tiempoSesion"]);
    $usuario = $_SESSION["user"];
    $tiempoMaximo = 60 * 30;
    // El servidor responde con la información del usuario y la hora de inicio. 
    echo "<p class='campoUsuario'> user: $usuario | hora de inicio: $horaInicio </p>";



    //Terminación de la sesion
    if (time() - $_SESSION["tiempoSesion"] > $tiempoMaximo) {
        // Destruir la sesión si ha pasado más de 2 minutos
        session_unset();//Borro las variables
        session_destroy(); // Destruir la sesión
        header("Location: index.php"); // Redirigir al usuario al login 
        exit();
    }
    ?>
    <!-- Verifico que se haya creado la variable  $libros antes de crear la tabla -->
    <?php if ((isset($libros))): ?>
        <div class="contenedorLibros">
            <?php foreach ($libros->libro as $unLibro): ?>
                <div class="fichaLibro">
                    <?php echo "<img class='portada' src=assets/img/$unLibro->portada>" ?>
                    <div class="infoLibro">
                        <?php
                        echo "<p> Titulo: $unLibro->titulo</p>";
                        echo "<p> Autor: $unLibro->autor</p>";
                        echo "<p> Categoría: $unLibro->categoria</p>";
                        echo ($unLibro->promocion == 'si') ? "<p class='promo'> Promoción -30% </p>" : "";
                        ?>
                    </div>
                    <div class="contenedorBotonComprar">
                        <button class="botonComprar"> Comprar </button>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>


       

    <?php else:
        echo "Error al cargar libros";
    endif;
    ?>






</body>

</html>