<?php
// Recupero datos de parámetro en forma de array asociativo
$cliente = json_decode($_POST['cliente'], true);

require_once("conexionBD.php");
$conexion = obtenerConexion();

// No necesitamos cargar opciones de proyectos para editar un proyecto

// Cabecera HTML que incluye navbar
include_once("index.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="procesoModificarCliente.php" name="frmEditarCliente" id="frmEditarCliente" method="post">
            <fieldset>
                <!-- Form Name -->
                <legend>Modificación de Cliente</legend>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtNombreCliente">Nombre del Cliente</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $cliente['nombre_cliente'] ?>" id="txtNombreCliente" name="txtNombreCliente" placeholder="Nombre del cliente" class="form-control input-md" type="text" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtCorreoCliente">Correo</label>
                    <div class="col-xs-4">
                        <textarea id="txtCorreoCliente" name="txtCorreoCliente" placeholder="Correo del cliente" class="form-control" required><?php echo $cliente['correo_cliente'] ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtDireccionCliente">Descripción</label>
                    <div class="col-xs-4">
                        <textarea id="txtDireccionCliente" name="txtDireccionCliente" placeholder="Direccion del cliente" class="form-control" required><?php echo $cliente['direccion_cliente'] ?></textarea>
                    </div>
                </div>
                <input value="<?php echo $cliente['id_cliente'] ?>" type="hidden" name="id_cliente" id="id_cliente" />
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarEditarProyecto"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarEditarCliente" name="btnAceptarEditarCliente" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
