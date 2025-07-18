-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2024 a las 00:13:56
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_inventarios_calzashop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(54, 'sandalias', 'varios estilos,variados', 'Imagenes/Categorias/b78f103a261b2de35157.jpg'),
(55, 'pantuflas ', 'muchos motivos ', 'Imagenes/Categorias/8edbaf71ea36fa113ed1.png'),
(56, 'sandalias hombre ', 'sandalias para los caballeros y niños de la casa ', 'Imagenes/Categorias/e1e6611029006fb7eda6.jpg'),
(57, 'pijamas', 'gran variedad, diferentes estilos y colores ', 'Imagenes/Categorias/3df5059d9bac1c1f3b5e.jpg'),
(59, 'tenis ', 'variedad de tenis, tipos, colores y diseños ', 'Imagenes/Categorias/c15d59bb206f535ef3d3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactar`
--

CREATE TABLE `contactar` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `celular` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `contactar`
--

INSERT INTO `contactar` (`id`, `nombre`, `celular`) VALUES
(22, 'juan', 2838723);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `total` int(11) NOT NULL,
  `codigo` varchar(9) NOT NULL,
  `tipo_venta` enum('online','local') NOT NULL,
  `estado` enum('Solicitado','Atendido','Entregado','Rechazado') NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`id`, `fecha`, `total`, `codigo`, `tipo_venta`, `estado`, `id_usuario`) VALUES
(25, '2024-10-02', 515878, 'RKOH49', 'online', 'Atendido', NULL),
(27, '2024-10-02', 198000, 'G5RWMW', 'online', 'Atendido', 1),
(29, '2024-10-02', 280000, 'JDC8M2', 'online', 'Atendido', 1),
(31, '2024-10-09', 185000, 'AZAPQV', 'online', 'Atendido', 1),
(32, '2024-10-09', 310000, 'HRDQC9', 'online', 'Atendido', 1),
(33, '2024-10-09', 495000, 'EHA8CI7WS', 'local', 'Entregado', 1),
(34, '2024-10-10', 60000, 'DLOQAFGCP', 'local', 'Entregado', 1),
(35, '2024-10-10', 120000, 'JXJO7WRIS', 'local', 'Entregado', 1),
(36, '2024-10-10', 124500, 'KAT4E3', 'online', 'Rechazado', 1),
(37, '2024-10-11', 227000, 'L4IOK7', 'online', 'Solicitado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio_unitario` varchar(150) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `tallas` varchar(200) NOT NULL,
  `colores` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio_unitario`, `cantidad`, `descuento`, `imagen`, `id_categoria`, `tallas`, `colores`, `descripcion`) VALUES
(17, 'sandalia plataforma baja ', '60000', 491, 0, 'Imagenes/Productos/77d14e48160fd7fe2ad3.jpg', 54, '36,37,38,39,40', 'Multicolor', 'sandalia champaña , muy linda y comoda '),
(20, 'pantufa vaquita ', '55000', 499, 10, 'Imagenes/Productos/1753179853f316a6a9b5.png', 55, '36,37,38,39,40,41', 'Negro,Blanco,Beige,Marrón', 'comodas,suaves y textura adorable '),
(21, 'sandalias para hombre ', '75000', 18, 0, 'Imagenes/Productos/a18cbddbf1d46cbe6e03.jpg', 56, '36,37,38,39,40,41', 'Negro,Azul,Rojo,Celeste', 'comodidad y suavidad '),
(27, 'sandalia Masmelo ', '95000', 498, 20, 'Imagenes/Productos/1c02cf53f08892e95d0b.jpg', 54, '36,37,38,39,40,41', 'Verde', 'especial para todo tipo de look, lindas para la playa ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `celular` int(11) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `celular`, `clave`, `rol`) VALUES
(1, 'valeri', 'valeri@gmail.com ', 2146483647, '$2y$10$IHx/Tg.pMDOTA3gbayUsv.oIvVMbTh/bcOhEYIokp.TcinBo9T2JW', 'administrador'),
(3, 'Juan', 'juan@gmail.com', 2147483647, '$2y$10$5DiQvLReSycZume6hqDTe.4HoJqC20ZkUQMixeOBH2e.8saN0NBuK', 'empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_orden` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_producto`, `id_orden`, `cantidad`, `valor_total`) VALUES
(54, 20, 27, 1, 1212),
(55, 27, 25, 2, 2222),
(56, 17, 31, 2, 120000),
(58, 17, 32, 3, 180000),
(60, 17, 33, 2, 120000),
(62, 17, 34, 1, 60000),
(63, 17, 35, 2, 120000),
(64, 20, 36, 1, 49500),
(65, 21, 36, 1, 75000),
(66, 27, 37, 2, 152000),
(67, 21, 37, 1, 75000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contactar`
--
ALTER TABLE `contactar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_productos` (`id_producto`),
  ADD KEY `id_orden` (`id_orden`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `contactar`
--
ALTER TABLE `contactar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_orden`) REFERENCES `ordenes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
