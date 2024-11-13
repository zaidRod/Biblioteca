<div class="formulario">
    <p class="titulo"> Confirmación de edición en pedido </p>
    <form action="confirmarActualizacionPedidoView.php" method="post">
        <div class="camposForm">
            <label> ID pedido: </label>
            <input readonly name="id" value="<?php echo $pedido['id']; ?>">
        </div>

        <div class="camposForm">
            <label> Titulo: </label>
            <input name="titulo" value="<?php echo $pedido['titulo']; ?> " required>
        </div>

        <div class="camposForm">
            <label> ISBN: </label>
            <input name="isbn" value="<?php echo $pedido['isbn']; ?>" required>
        </div>

        <div class="camposForm">
            <label> Fecha: </label>
            <input name="fecha" value="<?php echo $pedido['fecha']; ?>">
        </div>

        <div class="camposForm">
            <label> Usuario: </label>
            <input name="usuario" value="<?php echo $pedido['usuario']; ?>">
        </div>


        <!-- Se realiza el envio de los datos de nuevo al formulario anterior -->

        <button type="submit"> Confirmar datos </button>


    </form>
</div>