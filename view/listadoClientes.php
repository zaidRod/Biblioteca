<div class="titulo"> Panel de control de usuarios </div>
<br>

<div class="titulosTabla">
    <div class="col"> ID </div>
    <div class="col"> Nombre </div>
    <div class="col"> Edad </div>
    <div class="col"> Nick </div>
    <div class="col"> Contraseña </div>
    <div class="col"> Editar </div>
    <div class="col"> Borrar </div>

</div>

<?php
if ($usuarios !== null): ?>
    <?php foreach ($usuarios as $usuario): ?>
        <div class="listadoFila">
            <div class="col"><?php echo $usuario['id'] ?></div>
            <div class="col"><?php echo $usuario['nombre'] ?></div>
            <div class="col"><?php echo $usuario['edad'] ?></div>
            <div class="col"><?php echo $usuario['nick_usuario'] ?></div>
            <div class="col"> <img class="icono" src="../assets/img/passwordIcon.png" alt="Contraseña" > </div>

            <div class="col"><a href="gestionUsuariosView.php?action=editar&id=<?php echo $usuario['id'] ?>"> <img class="icono" src="../assets/img/editIcon.png" alt="Editar" ></a> </div>
            <div class="col"><a href="gestionUsuariosView.php?action=borrar&id=<?php echo $usuario['id'] ?>"> <img class="icono" src="../assets/img/removeIcon.png" alt="Editar" ></a> </div>

        </div>
    <?php endforeach; ?>
<?php else:
    echo "<h1> Error al mostar los datos </h1>";
endif; ?>