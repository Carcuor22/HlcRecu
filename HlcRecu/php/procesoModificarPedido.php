<?php
require_once("conexionBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$id_pedido = $_POST['id_pedido']; 
$fecha_pedido = $_POST['txtFecha'];
$descripcion_pedido = $_POST['txtDescripcion'];
$monto_total_pedido = $_POST['txtMontoTotal'];
$id_cliente = $_POST['lstCliente']; 


$sql = "UPDATE Pedidos SET fecha_pedido = ?, descripcion_pedido = ?, monto_total_pedido = ?, id_cliente = ? WHERE id_pedido = ?;";

$stmt = $conexion->prepare($sql);
if (!$stmt) {
    die("Error preparando la consulta: " . $conexion->error);
}

$stmt->bind_param("ssii", $fecha_pedido, $descripcion_pedido, $monto_total_pedido, $id_cliente);
if ($stmt->execute()) {
    $mensaje = "<h2 class='text-center mt-5'>Pedido actualizada con éxito</h2>";
} else {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje = "<h2 class='text-center mt-5'>Se ha producido un error número $numerror que corresponde a: $descrerror </h2>";
}

$stmt->close();
$conexion->close();

include_once("index.html");

echo $mensaje;
?>
