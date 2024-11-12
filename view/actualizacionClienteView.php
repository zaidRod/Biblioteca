<div class="formulario">
    <p class="titulo"> Confirmación de edición </p>
    <form action="confirmacionActualizacionView.php" method="post">
        <div class="camposForm">
            <!-- Campo oculto donde se almacena el id -->
            <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
            <label> Nombre: </label>
            <input name="name" value="<?php echo $usuario['nombre']; ?> " required>
        </div>

        <div class="camposForm">
            <label> Edad: </label>
            <input name="age" value="<?php echo $usuario['edad']; ?>" required> 
        </div>

        <div class="camposForm">
            <label> Nick: </label>
            <input name="nick" readonly value="<?php echo $usuario['nick_usuario']; ?>" >
        </div>

        <div class="camposForm">
            <label> Contraseña: </label>
            <input name="password" maxlength="6" type="text" required>
        </div>
        <!-- Se realiza el envio de los datos de nuevo al formulario anterior -->
        
        <button type="submit"> Confirmar datos </button>


    </form>
</div>