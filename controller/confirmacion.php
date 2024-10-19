<?php
// Se reciben los datos enviados desde el formulario de confirmación.
// Esto ocurre en el servidor, donde se almacenan en variables para ser utilizados en esta página.
if (isset($_POST["name"]) && isset($_POST["age"]) && isset($_POST["nick"]) && isset($_POST['young'])) {
    $nombre = $_POST["name"];
    $edad = $_POST["age"];
    $nick = $_POST["nick"];
    $esJoven = $_POST["young"]; // Clasificación de la edad que se recibe desde el formulario anterior
}

// Incluyo la cabecera HTML desde el archivo separado. Esta acción ocurre en el servidor, y luego se envía el HTML resultante al cliente.


// Imprimo un mensaje indicando que se está en la pantalla de envío. El resultado de esta línea se envía como HTML al cliente.
echo "<div class='contenedor'>
    <img  class='imagen' src='../view/icono.PNG'>
    <p class='textoCab'> Pantalla de envío </p> </div>";
?>

<!-- Enlace a la hoja de estilos que se aplica en el lado del cliente -->
<link rel="stylesheet" href="../view/style.css">

<!-- Mensaje dinámico para mostrar que el usuario ha sido creado satisfactoriamente. -->
<p class="titulo"> El usuario <?php echo $nick; ?> ha sido creado satisfactoriamente.</p>

<div class="formulario">
    <!-- Muestra el nombre del usuario que fue ingresado previamente -->
    Nombre: <?php echo $nombre ?> <br>

    <!-- Muestra un emoji si el usuario es clasificado como "Joven", o muestra la edad numérica en otros casos -->
    Edad: <?php
    if ($esJoven == "Joven") {
        echo "😉"; // Si el usuario es clasificado como joven, se muestra este emoji.
    } else {
        echo $edad; // Si no es joven, se muestra la edad real.
    }
    ?> <br>

    <!-- Enlace para regresar a la página de inicio -->
    <a href="../index.php" class="enlace"> Volver al inicio </a>
</div>
