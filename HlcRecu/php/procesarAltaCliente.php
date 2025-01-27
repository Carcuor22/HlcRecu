<?php
require_once("conexionBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$nombre_cliente = $_POST['txtNombreCliente'];
$correo_cliente = $_POST['txtCorreoCliente'];
$direccion_cliente = $_POST['txtDireccionCliente'];

// Preparar la consulta para insertar en la tabla 'proyectos'
$sql = "INSERT INTO Clientes(nombre_cliente, correo_cliente, direccion_cliente) VALUES (?, ?, ?);";

$stmt = $conexion->prepare($sql);
if (!$stmt) {
    die("Error preparando la consulta: " . $conexion->error);
}

// Vincular parámetros a la consulta preparada
$stmt->bind_param("sss", $nombre_cliente, $correo_cliente, $direccion_cliente);

// Ejecutar consulta
if ($stmt->execute()) {
    $mensaje = "<h2 class='text-center mt-5'>Cliente insertado con éxito</h2>";
} else {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje = "<h2 class='text-center mt-5'>Se ha producido un error número $numerror que corresponde a: $descrerror</h2>";
}

$stmt->close();
$conexion->close();

// Mostrar mensaje
echo $mensaje;

// Usar JavaScript para redireccionar después de 5 segundos
echo "<script>setTimeout(function(){ window.location.href = 'altaCliente.php'; }, 5000);</script>";
?>
