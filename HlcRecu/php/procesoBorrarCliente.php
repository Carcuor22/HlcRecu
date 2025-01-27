<?php
require_once("conexionBD.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$id_cliente = $_POST['id_cliente']; 

// No validamos, suponemos que la entrada de datos es correcta

// Definir delete
$sql = "DELETE FROM Clientes WHERE id_cliente = ?;"; // Usamos consultas preparadas para evitar inyecciones SQL

// Preparar consulta
$stmt = $conexion->prepare($sql);
if (!$stmt) {
    die("Error preparando la consulta: " . $conexion->error);
}

// Vincular parámetros y ejecutar
$stmt->bind_param("i", $id_cliente);
if (!$stmt->execute()) {
    $mensaje = "<h2 class='text-center mt-5'>Se ha producido un error: " . $stmt->error . "</h2>";
} else {
    $mensaje = "<h2 class='text-center mt-5'>Cliente con id $id_cliente borrado</h2>"; 
}

// Cerrar statement
$stmt->close();

include_once("index.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>
