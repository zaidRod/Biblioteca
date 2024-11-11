<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de usuarios</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include "../controller/bdControllador.php";
    $listado = new bibliotecaControlador();

    $accion = isset($_GET['action']) ? $_GET['action'] : null;
    $id= isset($_GET['id']) ? $_GET['id'] : null;

    switch ($accion){
        default:
        $listado->listarClientes();
        break;
    }



    ?>
    
</body>
</html>