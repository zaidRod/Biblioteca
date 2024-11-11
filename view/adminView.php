<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <?php
    //Almacenamiento de las variables
    $horaInicio = date('h:i:s A', $_SESSION["tiempoSesion"]);
    $usuario = $_SESSION["user"];
    // El servidor responde con la información del usuario y la hora de inicio y los coloca en la cabecera.
    echo "<p class='campoUsuario'> user: $usuario | hora de inicio: $horaInicio </p>";
    echo " <p class='titulo'> Bienvenido a LibroSphere <p> ";
    ?>

    <div class="contenedorEnlaces">
        <div class="fichaEnlaces">
            <a href="view/gestionUsuariosView.php">
                
               <img class="iconoGestion" src="assets/img/gClientes.png">
            </a>
            <p> Gestión de clientes </p>
        </div>

        <div class="fichaEnlaces">
            <a>
                <img class="iconoGestion" src="assets/img/gLibros.png">
            </a>
            <p> Gestión de libros </p>
        </div>

        <div class="fichaEnlaces">
            <a>
                <img class="iconoGestion" src="assets/img/gPedidos.png">
            </a>
            <p> Gestión de pedidos </p>
        </div>

    </div>

</body>

</html>