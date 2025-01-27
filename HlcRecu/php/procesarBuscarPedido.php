<?php
require_once("conexionBD.php");
$conexion = obtenerConexion();

// Recuperar parámetro
$id_pedido = $_GET['txtIdPedido'];

// Usar consultas preparadas para prevenir inyecciones SQL
$sql = "SELECT p.*, c.nombre_cliente AS nombreCliente FROM Pedidos p 
INNER JOIN Clientes c ON p.id_cliente = c.id_cliente 
WHERE p.id_pedido LIKE ?;";

$stmt = $conexion->prepare($sql);
$id_pedido = "%".$id_pedido."%"; 
$stmt->bind_param("s", $id_pedido);
$stmt->execute();
$resultado = $stmt->get_result();

if($fila = mysqli_fetch_assoc($resultado)){ // Mostrar tabla de datos si hay resultado
    $mensaje = "<h2 class='text-center'>Pedido localizada</h2>";
    $mensaje .= "<table class='table'>";
    $mensaje .= "<thead><tr><th>IDPEDIDO</th><th>FECHA</th><th>DESCRIPCIÓN</th><th>TOTAL</th><th>CLIENTE</th></tr></thead>";
    $mensaje .= "<tbody>";
    
    // Mostrar todas las filas encontradas
    do {
        $mensaje .= "<tr>";
        $mensaje .= "<td>" . $fila['id_pedido'] . "</td>";
        $mensaje .= "<td>" . $fila['fecha_pedido'] . "</td>";
        $mensaje .= "<td>" . $fila['descripcion_pedido'] . "</td>";
        $mensaje .= "<td>" . $fila['monto_total_pedido'] . "</td>";
        $mensaje .= "<td>" . $fila['nombreCliente'] . "</td>";
        $mensaje .= "</tr>";
    } while ($fila = mysqli_fetch_assoc($resultado));
    
    $mensaje .= "</tbody></table>";
} else { // No hay datos
   $mensaje = "<h2 class='text-center mt-5'>No se encontraron pedidos con ese id</h2>";
}

// Cerrar la declaración preparada y la conexión
$stmt->close();
$conexion->close();

// Insertamos cabecera
include_once("index.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>
