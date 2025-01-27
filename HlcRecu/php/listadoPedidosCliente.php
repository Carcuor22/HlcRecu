<?php
require_once("conexionBD.php");

$conexion = obtenerConexion();

// Cambiamos la consulta para seleccionar proyectos en lugar de tipos de componentes
$sql = "SELECT id_cliente, nombre_cliente FROM Clientes ORDER BY id_cliente ASC;";

$resultado = mysqli_query($conexion, $sql);

$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    // Ahora llenamos el select con proyectos en lugar de tipos
    $options .= " <option value='" . $fila["id_cliente"] . "'>" . $fila["nombre_cliente"] . "</option>";
}

include_once("index.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="listadoPedidos.php" method="get">
            <fieldset>
                <!-- Form Name -->
                <legend>Buscar pedidos de un cliente</legend>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="lstCliente">Cliente</label>
                    <div class="col-xs-4">
                        <select name="lstCliente" id="lstCliente" class="form-select" aria-label="Default select example">
                            <?php echo $options; ?>
                        </select>
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarBuscarPedidosCliente"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarBuscarPedidosCliente" name="btnAceptarBuscarPedidosCliente" class="btn btn-primary" value="Buscar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
