<?php
require_once("conexionBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros del formulario de edición de proyecto
$id_cliente = $_POST['id_cliente']; 
$nombre_cliente = $_POST['txtNombreCliente']; 
$correo_cliente = $_POST['txtCorreoCliente']; 
$direccion_cliente = $_POST['txtDireccionCliente'];  

// Definir la consulta de actualización usando consultas preparadas para mejorar la seguridad
$sql = "UPDATE Clientes SET nombre_cliente = ?, correo_cliente = ?, direccion_cliente = ? WHERE id_cliente = ?;";

// Preparar consulta
$stmt = $conexion->prepare($sql);
if (!$stmt) {
    die("Error preparando la consulta: " . $conexion->error);
}

// Vincular parámetros y ejecutar
$stmt->bind_param("sssi", $nombre_cliente, $correo_cliente, $direccion_cliente, $id_cliente);
if ($stmt->execute()) {
    $mensaje = "<h2 class='text-center mt-5'>Cliente actualizado con éxito</h2>";
} else {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje = "<h2 class='text-center mt-5'>Se ha producido un error número $numerror que corresponde a: $descrerror </h2>";
}

// Cerrar sentencia y conexión
$stmt->close();
$conexion->close();

// Incluir cabecera HTML
include_once("index.html");

// Mostrar mensaje
echo $mensaje;
?>
