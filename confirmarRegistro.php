<?php
// Se reciben los datos enviados desde el formulario de registro
if (isset($_POST["name"]) && isset($_POST["age"]) && isset($_POST["nick"]) && isset($_POST["password"])) {
    $nombre = $_POST["name"];
    $edad = $_POST["age"];
    $nick = $_POST["nick"];
    $password = $_POST["password"];

}
?>
<link rel="stylesheet" href="style.css">

<div class="formulario">
    <p class="titulo"> Confirmación </p>
    <!--Pendiente por implementar -->
    <form action="confirmacion.php" method="post">
        <!--Muestro los valores recibidos a la vez que los relleno en los input ocultos para enviarlos en caso de correción -->
        <div class="camposForm">
            <label> Nombre: </label> 
            <input name="name" value="<?php echo $nombre; ?>">
        </div>

        <div class="camposForm">
            <label> Edad: </label> 
            <input name="age" value="<?php echo $edad; ?>">
        </div>

        <div class="camposForm">
            <label> Nick: </label> 
            <input name="nick" value="<?php echo $nick; ?>">
        </div>

        <div class="camposForm">
            <label> Contraseña: </label> 
            <input name="password" value="<?php echo $password; ?>">
        </div>
        <!-- Se realiza el envio de los datos de nuevo al formulario anterior -->
        <button type="submit" formaction="formularioRegistro.php">Corregir Datos</button>

    </form>
</div>