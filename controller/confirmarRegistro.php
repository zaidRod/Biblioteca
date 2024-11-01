<?php
include_once "../model/bibliotecaBd.php";
// Se reciben los datos enviados desde el formulario de registro, que igualmente se solicitan al servidor ya que allí se almacenan las variables.
if (isset($_POST["name"]) && isset($_POST["age"]) && isset($_POST["nick"]) && isset($_POST["password"])) {
    $nombre = $_POST["name"];
    $edad = $_POST["age"];
    $nick = $_POST["nick"];
    $password = $_POST["password"];

}
//Base de datos
$consulta = "SELECT * FROM `usuarios` where nick_usuario = ? ";
$comprobacion = BibliotecaBd::consultaLectura($consulta, $nick );
if ($comprobacion === null) :


function consultarEdad($valor)
{
    if ($valor >= 15 && $valor <= 20) {
        return "Joven";
    } else if ($valor < 15) {
        return "Niño";
    } else if ($valor < 60) {
        return "Adulto";
    } else {
        return "Senior";
    }

}
?>
<link rel="stylesheet" href="../view/style.css">
<?php
echo "<div class='contenedor'>
    <img  class='imagen' src='../view/icono.PNG'>
    <p class='textoCab'> Pantalla de confirmación </p> </div>";
?>
<div class="formulario">
    <p class="titulo"> Confirmación </p>
    <form action="confirmacion.php" method="post">
        <!--Muestro los valores recibidos a la vez que los relleno en los input ocultos para enviarlos en caso de correción -->
        <div class="camposForm">
            <label> Nombre: </label>
            <input name="name" value="<?php echo $nombre; ?>">
        </div>

        <div class="camposForm">
            <label> Edad: </label>

            <!-- Se realiza la solicitud al servidor, llamando a la funcion, la cual retorna el valor que el cliente recibe como parte del HTML -->

            <input name="young" value="<?php echo consultarEdad($edad); ?>">
            <!-- Aca coloco un campo adicional oculto donde guardare el valor de la edad para pasarlo al otro formulario -->
            <input type="hidden" name="age" value="<?php echo $edad; ?>">

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
        <button type="submit"> Enviar </button>


    </form>
</div>
<?php
else:
    echo "<div class='centrado'> Usuario existente, intente de nuevo <div>";
    BibliotecaBd::cerrarConexion(); 
endif;
?>