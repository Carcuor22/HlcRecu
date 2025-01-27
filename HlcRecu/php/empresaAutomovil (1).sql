-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 22-01-2025 a las 11:25:18
-- Versión del servidor: 8.0.40
-- Versión de PHP: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empresaAutomovil`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Clientes`
--

CREATE TABLE `Clientes` (
  `id_cliente` int NOT NULL,
  `nombre_cliente` varchar(100) NOT NULL,
  `correo_cliente` varchar(100) NOT NULL,
  `direccion_cliente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Clientes`
--

INSERT INTO `Clientes` (`id_cliente`, `nombre_cliente`, `correo_cliente`, `direccion_cliente`) VALUES
(1, 'Carlos Pérez', 'carlos.perez@example.com', 'Av. Siempre Viva 123'),
(2, 'María Gómez', 'maria.gomez@example.com', 'Calle Luna 45'),
(3, 'Juan López', 'juan.lopez@example.com', 'Calle Sol 67'),
(4, 'Ana Torres', 'ana.torres@example.com', 'Av. Estrellas 89'),
(5, 'Luis Martínez', 'luis.martinez@example.com', 'Plaza Mayor 10'),
(6, 'Carmen Sánchez', 'carmen.sanchez@example.com', 'Calle Río 22'),
(7, 'Pedro Morales', 'pedro.morales@example.com', 'Av. Océano 33'),
(8, 'Elena Ruiz', 'elena.ruiz@example.com', 'Calle Montaña 44'),
(9, 'Miguel Herrera', 'miguel.herrera@example.com', 'Av. Cumbre 55'),
(10, 'Laura Fernández', 'laura.fernandez@example.com', 'Calle Valle 66'),
(14, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Pedidos`
--

CREATE TABLE `Pedidos` (
  `id_pedido` int NOT NULL,
  `fecha_pedido` date NOT NULL,
  `descripcion_pedido` varchar(255) NOT NULL,
  `monto_total_pedido` decimal(10,2) NOT NULL,
  `id_cliente` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `Pedidos`
--

INSERT INTO `Pedidos` (`id_pedido`, `fecha_pedido`, `descripcion_pedido`, `monto_total_pedido`, `id_cliente`) VALUES
(2, '2025-01-02', 'Pedido de 5 aceites', 150.00, 2),
(3, '2025-01-03', 'Pedido de 20 filtros', 200.00, 3),
(4, '2025-01-04', 'Pedido de 3 baterías', 300.00, 4),
(5, '2025-01-05', 'Pedido de 50 bujías', 400.00, 5),
(6, '2025-01-06', 'Pedido de 10 amortiguadores', 600.00, 6),
(7, '2025-01-07', 'Pedido de 7 radiadores', 700.00, 7),
(8, '2025-01-08', 'Pedido de 15 espejos laterales', 450.00, 8),
(9, '2025-01-09', 'Pedido de 8 discos de freno', 520.00, 9),
(10, '2025-01-10', 'Pedido de 12 limpiaparabrisas', 240.00, 10),
(11, '2025-01-24', 'asajhsvduagf', 2121.00, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Clientes`
--
ALTER TABLE `Clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `Pedidos`
--
ALTER TABLE `Pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Clientes`
--
ALTER TABLE `Clientes`
  MODIFY `id_cliente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `Pedidos`
--
ALTER TABLE `Pedidos`
  MODIFY `id_pedido` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Pedidos`
--
ALTER TABLE `Pedidos`
  ADD CONSTRAINT `Pedidos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `Clientes` (`id_cliente`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
