<?php
//Verifico si se ha recibido alguna petición post, en tal caso almaceno las variables para rellenar el form.
// Este proceso se realiza en el servidor para almacenar los datos enviados por el usuario.
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

<?php
// Este archivo se carga en el lado del servidor, pero el HTML resultante se envía al cliente.
echo "<div class='contenedor'>
    <img  class='imagen' src='../view/icono.PNG'>
   <p class='textoCab'> Pantalla de registro </p> </div>";
?>

<!-- Incluyo el Css  -->
<link rel="stylesheet" href="../view/style.css">
<div class="formulario">
    <link rel="stylesheet" href="style.css">
    <p class="titulo"> Alta usuario </p>
    <!-- Indico donde enviare los datos luego de que se le de enviar -->
    <form action="confirmarRegistro.php" method="post">
        <div class="camposForm">
            <label> Nombre: </label>
            <!-- Cada echo es una solicitud al servidor, en la que se solicita el valor de la variable que sera mostrado al cliente -->
            <input type="text" name="name" value="<?php echo $nombre; ?>" required>
        </div class="camposForm">

        <div class="camposForm">
            <label> Edad: </label>
            <input type="text" name="age" value="<?php echo $edad; ?>" required>
        </div class="camposForm">

        <div class="camposForm">
            <label> Nick: </label>
            <input type="text" name="nick" maxlength="8" value="<?php echo $nick; ?>" required>
        </div class="camposForm">

        <div class="camposForm">
            <label> Contraseña: </label>
            <input type="password" name="password" maxlength="5" value="<?php echo $password; ?>" required>
        </div class="camposForm">
        
        <div class="grupoBoton">
        <input type="submit" name="send">
        <!-- En caso de cancelar envio al Index-->
        <!-- <button type="button" > Cancelar </button> -->
         <a href="../index.php"> Cancelar </a>
         </div>


    </form>
</div>