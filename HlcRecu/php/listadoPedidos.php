<?php
require_once("conexionBD.php");
$conexion = obtenerConexion();

// Verificar si se ha enviado el ID del proyecto a través de GET
if (isset($_GET['lstCliente'])) {
    $id_cliente = $_GET['lstCliente'];

    // Preparamos la consulta SQL usando consultas preparadas
    $sql = "SELECT p.*, c.nombre_cliente AS nombreCliente FROM Pedidos p INNER JOIN Clientes c ON p.id_cliente = c.id_cliente WHERE p.id_cliente = ? ORDER BY id_pedido ASC;";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id_cliente);
    $stmt->execute();
    $resultado = $stmt->get_result();
} else {
    // Si no se ha seleccionado un proyecto, seleccionamos todas las tareas
    $sql = "SELECT p.*, c.nombre_cliente AS nombreCliente FROM Pedidos p INNER JOIN Clientes c ON p.id_cliente = c.id_cliente ORDER BY id_pedido ASC;";
    $resultado = mysqli_query($conexion, $sql);
}

// Montar tabla
$mensaje = "<h2 class='text-center'>Listado de Pedidos</h2>";
$mensaje .= "<table class='table table-striped'>";
$mensaje .= "<thead><tr><th>IDPEDIDO</th><th>FECHAPEDIDO</th><th>DESCRIPCIÓN</th><th>MONTOTOTAL</th><th>CLIENTE</th><th>ACCIÓN</th></tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas
while ($fila = mysqli_fetch_assoc($resultado)) {
    $mensaje .= "<tr><td>" . $fila['id_pedido'] . "</td>";
    $mensaje .= "<td>" . $fila['fecha_pedido'] . "</td>";
    $mensaje .= "<td>" . $fila['descripcion_pedido'] . "</td>";
    $mensaje .= "<td>" . $fila['monto_total_pedido'] . "</td>";
    $mensaje .= "<td>" . $fila['nombreCliente'] . "</td>";

    // Asegúrate de ajustar los formularios de acción a tus necesidades
    $mensaje .= "<td><form class='d-inline me-1' action='editarPedido.php' method='post'>";
    $mensaje .= "<input type='hidden' name='pedido' value='" . htmlspecialchars(json_encode($fila), ENT_QUOTES) . "' />";
    $mensaje .= "<button name='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></form>";

    $mensaje .= "<form class='d-inline' action='procesoBorrarPedido.php' method='post'>";
    $mensaje .= "<input type='hidden' name='id_pedido' value='" . $fila['id_pedido']  . "' />";
    $mensaje .= "<button name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></button></form>";

    $mensaje .= "</td></tr>";
}

// Cerrar tabla
$mensaje .= "</tbody></table>";

// Liberar resultados y cerrar statement si se usó consulta preparada
if (isset($stmt)) {
    $stmt->free_result();
    $stmt->close();
}

// Insertamos cabecera
include_once("index.html");

// Mostrar mensaje calculado antes
echo $mensaje;
?>
