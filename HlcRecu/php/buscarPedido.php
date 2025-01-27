<?php
include_once("index.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="procesarBuscarPedido.php" name="frmBuscarPedido" id="frmBuscarPedido" method="get">
            <fieldset>
                <!-- Form Name -->
                <legend>Buscar un pedido</legend>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtIdPedido">Id</label>
                    <div class="col-xs-4">
                        <input id="txtIdPedido" name="txtIdPedido" placeholder="Id de la tarea" class="form-control input-md" type="number">
                    </div>
                </div>
                
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarBuscarPedido"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarBuscarPedido" name="btnAceptarBuscarPedido" class="btn btn-primary" value="Buscar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
