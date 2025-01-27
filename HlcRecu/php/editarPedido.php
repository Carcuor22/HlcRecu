<?php

// Recupero datos de parámetro en forma de array asociativo
$pedido = json_decode($_POST['pedido'], true);

require_once("conexionBD.php");
$conexion = obtenerConexion();

// Consulta para obtener todos los proyectos y poder seleccionar a cuál pertenece la tarea
$sql = "SELECT id_cliente, nombre_cliente FROM Clientes;";

$resultado = mysqli_query($conexion, $sql);

$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    // Si coincide el proyecto con el de la tarea es el que debe aparecer seleccionado (selected)
    if ($fila['id_cliente'] == $pedido['id_cliente']){
        $options .= " <option selected value='" . $fila["id_cliente"] . "'>" . $fila["nombre_cliente"] . "</option>";
    } else{
        $options .= " <option value='" . $fila["id_cliente"] . "'>" . $fila["nombre_cliente"] . "</option>";
    }
}

// Cabecera HTML que incluye navbar
include_once("index.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="procesoModificarPedido.php" name="frmEditarPedido" id="frmEditarPedido" method="post">
            <fieldset>
                <!-- Form Name -->
                <legend>Modificación de Pedido</legend>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtFecha">Fecha</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $pedido['fecha_pedido'] ?>" id="txtFecha" name="txtFecha" placeholder="Fecha del pedido" class="form-control input-md" type="date" required>
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtDescripcion">Descripción</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $pedido['descripcion_pedido'] ?>" id="txtDescripcion" name="txtDescripcion" placeholder="Descripción" class="form-control input-md" type="text" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtMontoTotal">Monto Total</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $pedido['monto_total_pedido'] ?>" id="txtMontoTotal" name="txtMontoTotal" placeholder="Monto total del pedido" class="form-control input-md" type="number" required>
                    </div>
                </div>
                <!-- Select Basic -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="lstCliente">Clientes</label>
                    <div class="col-xs-4">
                        <select id="lstCliente" name="lstCliente" class="form-select" required>
                            <?php echo $options; ?>
                        </select>
                    </div>
                </div>
                <input value="<?php echo $pedido['id_pedido'] ?>" type="hidden" name="id_pedido" id="id_pedido" />
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarEditarPedido"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarEditarPedido" name="btnAceptarEditarPedido" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
