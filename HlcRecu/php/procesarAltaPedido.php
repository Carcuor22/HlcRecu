<?php
require_once("conexionBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$fecha_pedido = $_POST['txtFechaPedido'];
$descripcion_pedido = $_POST['txtDescripcion'];
$monto_total_pedido = $_POST['txtMontoTotal'];
$id_cliente = $_POST['lstCliente']; 

// Preparar la consulta para insertar en la tabla 'tareas'
$sql = "INSERT INTO Pedidos(fecha_pedido, descripcion_pedido, monto_total_pedido, id_cliente) VALUES (?, ?, ?, ?);";

$stmt = $conexion->prepare($sql);
if (!$stmt) {
    die("Error preparando la consulta: " . $conexion->error);
}

// Vincular parámetros a la consulta preparada
$stmt->bind_param("sssi", $fecha_pedido, $descripcion_pedido, $monto_total_pedido, $id_cliente);

// Ejecutar consulta
if ($stmt->execute()) {
    $mensaje = "<h2 class='text-center mt-5'>Pedido insertado con éxito</h2>";
} else {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje = "<h2 class='text-center mt-5'>Se ha producido un error número $numerror que corresponde a: $descrerror</h2>";
}

$stmt->close();
$conexion->close();

// Mostrar mensaje
echo $mensaje;

// ESTO LO PONGO PARA QUE TARDE UNOS SEGUNDOS Y TE DEVUELVA A LA PAGINA DE KA WEBAPP
echo "<script>setTimeout(function(){ window.location.href = 'altaPedido.php'; }, 2000);</script>";
?>
