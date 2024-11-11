<?php
include_once "../model/bibliotecaBd.php";
// Se reciben los datos enviados desde el formulario de confirmación.
if (isset($_POST["name"]) && isset($_POST["age"]) && isset($_POST["nick"]) && isset($_POST['young']) && isset($_POST['password'])) {
    $nombre = $_POST["name"];
    $edad = $_POST["age"];
    $nick = $_POST["nick"];
    $esJoven = $_POST["young"]; // Clasificación de la edad que se recibe desde el formulario anterior
    $password = $_POST["password"];
}

// Encriptado de contraseña
$hash = hash('sha256', $password);
//Inserción del nuevo usuario
$consulta = "INSERT INTO `usuarios`(`nombre`, `edad`, `nick_usuario`, `contrasena`) VALUES (?,?,?,?)";
//llamada al método de la consulta
$accion = BibliotecaBd::consultaInsercion($consulta, $nombre, $edad, $nick, $hash);

//Si la inserción fue correctamente. 
if ($accion == true):
    //Cabecera
    echo "<div class='contenedor'>
    <img  class='imagen' src='../view/icono.PNG'>
    <p class='textoCab'> Pantalla de envío </p> </div>";
    ?>
    <link rel="stylesheet" href="../view/style.css">
    <p class="titulo"> El usuario <?php echo $nick; ?> ha sido creado satisfactoriamente.</p>
    <div class="formulario">
        Nombre: <?php echo $nombre ?> <br>
        Edad: <?php
        if ($esJoven == "Joven") {
            echo "😉"; // Si el usuario es clasificado como joven, se muestra este emoji.
        } else {
            echo $edad; // Si no es joven, se muestra la edad real.
        }
        ?> 
        <br>
        <a href="../index.php" class="enlace"> Volver al inicio </a>
    <?php
//Error en la inserción.
else:
    echo "<h1>Eror en la escritura en la Bd</h1>";
endif;
//Cierre de conexion;
BibliotecaBd::cerrarConexion();
?>
</div>