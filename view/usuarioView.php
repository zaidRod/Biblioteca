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

    // Almacenamos el usuario y la hora de inicio de sesión extraídos de la sesión para mostrarlos en la interfaz
    $horaInicio = date('h:i:s A', $_SESSION["tiempoSesion"]);
    $usuario = $_SESSION["user"];
    echo "<div class='campoUsuario'> <div> user: $usuario | hora de inicio: $horaInicio </div> <a class='boton' href='index.php?action=cerrarSesion'> Cerrar sesión </a> </div>";

    ?>

    <!-- Verifico que se haya creado la variable  $libros antes de crear la tabla -->
    <?php if ((isset($libros))): ?>
        <div class="contenedorLibros">
            <!-- Recorremos cada libro dentro del objeto XML $libros y mostramos su información -->
            <?php foreach ($libros->libro as $unLibro): ?>
                <div class="fichaLibro">
                    <?php
                    // Mostramos la portada del libro
                    echo "<img class='portada' src=assets/img/$unLibro->portada>" ?>
                    <div class="infoLibro">
                        <?php
                        //Información del libro.
                        echo "<p> Titulo: $unLibro->titulo</p>";
                        echo "<p> Autor: $unLibro->autor</p>";
                        echo "<p> Categoría: $unLibro->categoria</p>";
                        echo ($unLibro->promocion == 'si') ? "<p class='promo'> Promoción -30% </p>" : "";
                        ?>
                    </div>
                    <div class="contenedorBotonComprar">
                        <form action="view/realizarPedidoView.php" method="post">
                            <input type="hidden" name="titulo" value="<?php echo $unLibro->titulo; ?>">
                            <input type="hidden" name="isbn" value="<?php echo $unLibro->isbn ?>">
                            <input type="hidden" name="fecha" value="<?php echo date("Y-m-d") ?>">

                            <button type="submit" class="botonComprar"> Comprar </button>
                        </form>

                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    <?php else:
        // Mensaje mostrado si no se puede cargar la lista de libros (posiblemente $libros no está definido o está vacío)
        echo "Error al cargar libros";
    endif;
    ?>






</body>

</html>