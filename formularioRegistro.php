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
    <h1> Formulario de registro </h1>
    <!-- Indico donde enviare los datos luego de que se le de enviar -->
    <form action="confirmarRegistro.php" method="post">
        <div>
            <label> Nombre: </label>
            <input type="text" name="name" value="<?php echo $nombre; ?>" required>
        </div>

        <div>
            <label> Edad: </label>
            <input type="text" name="age" value="<?php echo $edad; ?>" required>
        </div>

        <div>
            <label> Nick: </label>
            <input type="text" name="nick" value="<?php echo $nick; ?>" required>
        </div>

        <div>
            <label> Contraseña: </label>
            <input type="password" name="password" value="<?php echo $password; ?>" required>
        </div>

        <input type="submit" name="send">
        <!-- En casi de cancelar envio al Index-->
        <button type="submit" formaction="index.php"> Cancelar </button>


    </form>
</div>