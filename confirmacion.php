<?php
// Se reciben los datos enviados desde el formulario de registro
if (isset($_POST["name"]) && isset($_POST["age"]) && isset($_POST["nick"]) && isset($_POST['young'])) {
    $nombre = $_POST["name"];
    $edad = $_POST["age"];
    $nick = $_POST["nick"];
    $esJoven = $_POST["young"];




}

include "cabecera.html";

echo "<p class='textoCab'> Pantalla de envio </p> </div>";
?>
<link rel="stylesheet" href="style.css">
<p class="titulo"> El usuario <?php echo $nick; ?> ha sido creado satisfactoriamente.</p>
<div class="formulario">
    Nombre: <?php echo $nombre ?> <br>
    Edad: <?php if ($esJoven == "Joven") {
        echo "😉";
    } else {
        echo $edad;
    } ?> <br>

<a href="index.php" class="enlace"> Vovler al incio </a>

</div>

