<?php
//Verifico si se ha recibido alguna petición post, en tal caso almaceno las variables para rellenar el form
if (isset($_POST["name"]) && isset($_POST["age"]) && isset($_POST["nick"]) && isset($_POST["password"])) {
    $nombre = $_POST["name"];
    $edad = $_POST["age"];
    $nick = $_POST["nick"];
    $password = $_POST["password"];
} else {
    // Si no se reciben datos imprimo un campo vacio
    $nombre = "";
    $edad = "";
    $nick = "";
    $password = "";

}
?>
<link rel="stylesheet" href="style.css">
<div class="formulario">
    <link rel="stylesheet" href="style.css">
    <p class="titulo"> Alta usuario </p>
    <!-- Indico donde enviare los datos luego de que se le de enviar -->
    <form action="confirmarRegistro.php" method="post">
        <div class="camposForm">
            <label> Nombre: </label>
            <input type="text" name="name" value="<?php echo $nombre; ?>" required>
        </div class="camposForm">

        <div class="camposForm">
            <label> Edad: </label>
            <input type="text" name="age" value="<?php echo $edad; ?>" required>
        </div class="camposForm">

        <div class="camposForm">
            <label> Nick: </label>
            <input type="text" name="nick" value="<?php echo $nick; ?>" required>
        </div class="camposForm">

        <div class="camposForm">
            <label> Contraseña: </label>
            <input type="password" name="password" value="<?php echo $password; ?>" required>
        </div class="camposForm">

        <input type="submit" name="send">
        <!-- En casi de cancelar envio al Index-->
        <button type="submit" formaction="index.php"> Cancelar </button>


    </form>
</div>