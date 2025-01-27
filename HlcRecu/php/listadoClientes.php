<?php
require_once("conexionBD.php");
$conexion = obtenerConexion();

// Consulta para seleccionar todos los proyectos
$sql = "SELECT * FROM Clientes ORDER BY id_cliente ASC;";
$resultado = mysqli_query($conexion, $sql);

// Montar tabla
$mensaje = "<h2 class='text-center'>Listado:</h2>";
$mensaje .= "<table class='table table-striped'>";
$mensaje .= "<thead><tr><th>IDCLIENTE</th><th>NOMBRE</th><th>CORREO</th><th>DIRECCION</th><th>ACCIÓN</th></tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas
while ($fila = mysqli_fetch_assoc($resultado)) {
    $mensaje .= "<tr><td>" . $fila['id_cliente'] . "</td>";
    $mensaje .= "<td>" . $fila['nombre_cliente'] . "</td>";
    $mensaje .= "<td>" . $fila['correo_cliente'] . "</td>";
    $mensaje .= "<td>" . $fila['direccion_cliente'] . "</td>";

    // Ajusta las acciones según lo que desees permitir, como editar o borrar proyectos
    $mensaje .= "<td><form class='d-inline me-1' action='editarCliente.php' method='post'>";
    $mensaje .= "<input type='hidden' name='cliente' value='" . htmlspecialchars(json_encode($fila), ENT_QUOTES) . "' />";
    $mensaje .= "<button type='submit' name='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></form>";

    $mensaje .= "<form class='d-inline' action='procesoBorrarCliente.php' method='post'>";
    $mensaje .= "<input type='hidden' name='id_cliente' value='" . $fila['id_cliente']  . "' />";
    $mensaje .= "<button type='submit' name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></button></form>";

    $mensaje .= "</td></tr>";
}

// Cerrar tabla
$mensaje .= "</tbody></table>";

include_once("index.html");

// Mostrar mensaje calculado antes
echo $mensaje;
?>
