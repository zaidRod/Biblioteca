<?php
// Se reciben los datos enviados desde el formulario de registro, que igualmente se solicitan al servidor ya que allí se almacenan las variables.
if (isset($_POST["name"]) && isset($_POST["age"]) && isset($_POST["nick"]) && isset($_POST["password"])) {
    $nombre = $_POST["name"];
    $edad = $_POST["age"];
    $nick = $_POST["nick"];
    $password = $_POST["password"];

}

// En esta función se recibe como parametro la edad y se evalua es es niño, joven o senior, y dependiendo se realiza un return.
// Función realizada de lado del servidor.
function consultarEdad($valor){
    if ($valor>=15 && $valor<= 20) {
        return "Joven";
    }else if ( $valor<15){
        return "Niño";
    } else if ($valor<60){
        return "Adulto";
    }else{
        return "Senior";
    }

}
?>
<link rel="stylesheet" href="style.css">
<?php
include "cabecera.html";
echo "<p class='textoCab'> Pantalla de confirmación </p> </div>";
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