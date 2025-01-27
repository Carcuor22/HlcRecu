<?php
require_once("conexionBD.php");

$conexion = obtenerConexion();

$sql = "SELECT id_cliente, nombre_cliente FROM Clientes;"; // Corrección del nombre de la tabla

$resultado = mysqli_query($conexion, $sql);

if ($resultado === false) {
    die("Error en la consulta: " . mysqli_error($conexion));
}

$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    $options .= "<option value='" . $fila["id_cliente"] . "'>" . $fila["nombre_cliente"] . "</option>";
}

include_once("index.html");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Pedido</title>
</head>
<body>
<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="procesarAltapedido.php" name="frmAltaPedido" id="frmAltaPedido" method="post">
            <fieldset>
                <legend>Alta de Pedido</legend>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtFechaPedido">Fecha Pedido</label>
                    <div class="col-xs-4">
                        <input id="txtFechaPedido" name="txtFechaPedido"  class="form-control input-md" type="date" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtDescripcion">Descripción</label>
                    <div class="col-xs-4">
                        <input id="txtDescripcion" name="txtDescripcion" placeholder="Descripción" class="form-control input-md" type="text" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtMontoTotal">Monto total</label>
                    <div class="col-xs-4">
                        <input id="txtMontoTotal" name="txtMontoTotal" class="form-control input-md" type="number" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="lstCliente">Cliente</label>
                    <div class="col-xs-4">
                        <select name="lstCliente" id="lstCliente" class="form-select" aria-label="Default select example">
                            <?php echo $options; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarAltaPedido" name="btnAceptarAltaPedido" class="btn btn-primary" value="Aceptar">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
