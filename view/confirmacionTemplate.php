<link rel='stylesheet' href='style.css'>
<div class='contenedor'>
    <img class='imagen' src='icono.PNG'>
    <p class='textoCab'> <?php echo $titulo; ?> </p>
</div>
<div class='campoUsuario'> <div> user: <?php echo $usuario ?> | hora de inicio: <?php echo date('h:i:s A', $horaInicio) ?> </div> <a class='boton' href='index.php?action=cerrarSesion'> Cerrar sesión </a> </div>;
<div class='contenedorCentrado'>
    <p class='contenido'> <?php echo $mensaje; ?> </p>
    <a class='boton' href='<?php echo $enlaceUrl; ?>'> <?php echo $enlaceTexto; ?> </a>
</div>