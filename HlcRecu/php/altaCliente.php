<?php
require_once("conexionBD.php");
$conexion = obtenerConexion();


include_once("index.html");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Clientes</title>
</head>
<body>
<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="procesarAltaCliente.php" name="frmAltaCliente" id="frmAltaCliente" method="post">
            <fieldset>
                <legend>Alta de Cliente</legend>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtNombreCliente">Nombre del Cliente</label>
                    <div class="col-xs-4">
                        <input id="txtNombreCliente" name="txtNombreCliente" placeholder="Nombre del cliente" class="form-control input-md" type="text" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtCorreoCliente">Correo de contacto</label>
                    <div class="col-xs-4">
                        <input id="txtCorreoCliente" name="txtCorreoCliente" type="email" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtDireccionCliente">Direccion</label>
                    <div class="col-xs-4">
                        <textarea id="txtDireccionCliente" name="txtDireccionCliente" placeholder="direccion del cliente" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarAltaCliente" name="btnAceptarAltaCliente" class="btn btn-primary" value="Aceptar">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
