<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación pedido</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    session_start();
    $horaInicio = date('h:i:s A', $_SESSION["tiempoSesion"]);
    $usuario = $_SESSION["user"];
    echo "<div class='contenedor'>
      <img  class='imagen' src='icono.PNG'>
      <p class='textoCab'> Confirmar pedido </p> </div>";
    echo "<div class='campoUsuario'> <div> user: $usuario | hora de inicio: $horaInicio </div></div>" ;
    echo "<div class='contenedorBotones'>
      <a class='boton' href='../index.php?action=reanudarSesionAdmin'> Volver </a> 
      <a class='boton' href='../index.php?action=cerrarSesion'> Cerrar sesión </a>
   </div>";
   
    if (isset($_POST['titulo']) && isset($_POST['isbn']) && isset($_POST['fecha'])):
        $titulo = $_POST['titulo'];
        $isbn = $_POST['isbn'];
        $fecha = $_POST['fecha'];
        ?>

        <div class="formulario">
            <p class="titulo"> Confirmación de pedido </p>
            <form action="pedidoRealizadoView.php" method="post">
                <div class="camposForm">
                    <!-- Campo oculto donde se almacena el id -->
                    <label> Titulo: </label>
                    <input name="titulo" value="<?php echo $titulo ?> " required>
                </div>

                <div class="camposForm">
                    <label> ISBN </label>
                    <input name="isbn" value="<?php echo $isbn ?>" required>
                </div>

                <div class="camposForm">
                    <label> Fecha: </label>
                    <input name="fecha" value="<?php echo $fecha; ?>">
                </div>

                <!-- Se realiza el envio de los datos de nuevo al formulario anterior -->

                <button type="submit"> Confirmar datos </button>


            </form>
        </div>

        <?php

    else:
        echo "<h1> Error en la recogida de datos post </h1>";
    endif;
    ?>

</body>

</html>