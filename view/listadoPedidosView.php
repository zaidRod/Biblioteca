<div class="titulo"> Panel de control de pedidos </div>
<br>

<div class="titulosTabla">
    <div class="col"> ID </div>
    <div class="col"> Titulo </div>
    <div class="col"> ISBN </div>
    <div class="col"> Fecha </div>
    <div class="col"> Usuario </div>
    <div class="col"> Editar </div>
    <div class="col"> Borrar </div>

</div>

<?php
if ($pedidos !== null): ?>
    <?php foreach ($pedidos as $pedido): ?>
        <div class="listadoFila">
            <div class="col"><?php echo $pedido['id'] ?></div>
            <div class="col"><?php echo $pedido['titulo'] ?></div>
            <div class="col"><?php echo $pedido['isbn'] ?></div>
            <div class="col"><?php echo $pedido['fecha'] ?></div>
            
            <div class="col"><?php echo $pedido['usuario'] ?></div>

            <div class="col"><a href="gestionPedidosView.php?action=editar&id=<?php echo $pedido['id'] ?>"> <img class="icono" src="../assets/img/editIcon.png" alt="Editar" ></a> </div>
            <div class="col"><a href="gestionPedidosView.php?action=borrar&id=<?php echo $pedido['id'] ?>" onclick="return confirm('¿Estas seguro?')"> <img class="icono" src="../assets/img/removeIcon.png" alt="Borrar" ></a> </div>

        </div>
    <?php endforeach; ?>
<?php else:
    echo "<h1> Error al mostar los datos </h1>";
endif; ?>