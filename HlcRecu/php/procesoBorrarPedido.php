<?php
require_once("conexionBD.php");
$conexion = obtenerConexion();

$id_pedido = $_POST['id_pedido']; 


// Definir delete
$sql = "DELETE FROM Pedidos WHERE id_pedido = ?;"; // Usamos consultas preparadas para evitar inyecciones SQL

// Preparar consulta
$stmt = $conexion->prepare($sql);
if (!$stmt) {
    die("Error preparando la consulta: " . $conexion->error);
}

// Vincular parámetros y ejecutar
$stmt->bind_param("i", $id_pedido);
if (!$stmt->execute()) {
    $mensaje = "<h2 class='text-center mt-5'>Se ha producido un error: " . $stmt->error . "</h2>";
} else {
    $mensaje = "<h2 class='text-center mt-5'>Pedido con id $id_pedido borrado</h2>"; 
}

// Cerrar statement
$stmt->close();

include_once("index.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>
