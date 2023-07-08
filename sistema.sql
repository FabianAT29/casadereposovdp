-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2023 a las 22:39:18
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `id` int(11) NOT NULL,
  `caja` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`id`, `caja`, `estado`) VALUES
(1, 'General', 1),
(2, 'Secundario', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` text NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `dni`, `nombre`, `telefono`, `direccion`, `estado`) VALUES
(1, '75341092', 'Fabian', '924365507', 'Lima Perú', 1),
(2, '75341091', 'Fabricio', '986532147', 'Salida', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuración`
--

CREATE TABLE `configuración` (
  `id` int(11) NOT NULL,
  `ruc` varchar(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `mensaje` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `configuración`
--

INSERT INTO `configuración` (`id`, `ruc`, `nombre`, `telefono`, `direccion`, `mensaje`) VALUES
(1, '20601493811', 'CASA DE REPOSO VIDA DE PAZ E.I.R.L.', '986532147', 'CAL.JOSÉ MARTÍ NRO. 420 URB. MARANGA - LIMA - LIMA - SAN MIGUEL', 'Gracias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

CREATE TABLE `diagnostico` (
  `id` int(11) NOT NULL,
  `dnipac` int(8) DEFAULT NULL,
  `medicamento` varchar(100) DEFAULT NULL,
  `detalles` text DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `diagnostico`
--

INSERT INTO `diagnostico` (`id`, `dnipac`, `medicamento`, `detalles`, `estado`) VALUES
(1, 11111112, 'Paracetamol', '2 dosis diarias', '1'),
(2, 75341010, 'Paracetamol', '2 veces', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermeras`
--

CREATE TABLE `enfermeras` (
  `id` int(11) NOT NULL,
  `dni` int(8) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apepaterno` varchar(50) DEFAULT NULL,
  `apematerno` varchar(50) DEFAULT NULL,
  `dnipac` int(8) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `enfermeras`
--

INSERT INTO `enfermeras` (`id`, `dni`, `nombre`, `apepaterno`, `apematerno`, `dnipac`, `estado`) VALUES
(1, 14253698, 'Vanessa', 'Astudillo', 'Robles', 75341010, 1),
(2, 2020202, 'Vane', 'Lopez', 'Torres', 75341852, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familiares`
--

CREATE TABLE `familiares` (
  `id` int(11) NOT NULL,
  `dni` int(8) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apepaterno` varchar(50) NOT NULL,
  `apematerno` varchar(50) NOT NULL,
  `telefono` int(9) NOT NULL,
  `correoelec` varchar(100) NOT NULL,
  `dnipac` int(8) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `familiares`
--

INSERT INTO `familiares` (`id`, `dni`, `nombre`, `apepaterno`, `apematerno`, `telefono`, `correoelec`, `dnipac`, `estado`) VALUES
(1, 10101010, 'Juan', 'Perez', 'Yupa', 986532147, 'yupa@gmail.com', 78451236, 1),
(2, 10101020, 'Gianella', 'Paitan', 'Paitan', 986532142, 'giane@gmail.com', 78451236, 1),
(3, 74185296, 'Marcos ', 'Peralta', 'Perez', 986532144, 'marco@gmail.com', 78451236, 1),
(4, 11111111, 'Ralph', 'Amador', 'Barreto', 992837456, 'ralphama@gmail.com', 75341010, 1),
(5, 11111118, 'Piero', 'Boredo', 'Polo', 98653222, 'Piero@gmail.com', 11111112, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `dni` int(8) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apepaterno` varchar(50) NOT NULL,
  `apematerno` varchar(50) NOT NULL,
  `fechanac` date NOT NULL,
  `edad` int(2) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `id_estadia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `dni`, `nombre`, `apepaterno`, `apematerno`, `fechanac`, `edad`, `estado`, `id_estadia`) VALUES
(1, 75341010, 'Fabian Alfredo', 'Amador', 'Tirado', '2003-04-29', 20, 1, 1),
(5, 78451236, 'Hugo Mateo', 'Perez', 'Encarnación', '1975-11-26', 47, 1, 3),
(6, 78451236, 'Leonardo', 'Paitan', 'Quispe', '1970-10-10', 52, 1, 5),
(7, 11111112, 'Marco Alejandro', 'Polo', 'Barreto', '1980-01-11', 43, 1, 1),
(8, 75341092, 'Daniel Santiago', 'Dextre', 'Cuellar', '1980-02-11', 43, 1, 4),
(9, 75341852, 'Diburcio', 'Fernández', 'Vargas', '1980-10-10', 42, 1, 3),
(10, 77777777, 'Maria Esmeralda', 'Cancho', 'Huaman', '1960-04-24', 63, 1, 5),
(11, 71449576, 'Gian', 'Jimenez', 'Panes', '1971-11-29', 51, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoestadia`
--

CREATE TABLE `tipoestadia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoestadia`
--

INSERT INTO `tipoestadia` (`id`, `nombre`) VALUES
(1, '2 semanas'),
(2, '1 mes'),
(3, '3 meses'),
(4, '6 meses'),
(5, '12 meses');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `id_caja` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `nombre`, `clave`, `id_caja`, `estado`) VALUES
(1, 'admin', 'Fabian', 'admin', 1, 1),
(10, 'contra', 'contra', '2270e73a86e507f7a99d98e739a62f96ec812c1a19b37a0db27785e620518566', 2, 1),
(11, 'admin1', 'admin1', '25f43b1486ad95a1398e3eeb3d83bc4010015fcc9bedb35b432e00298d5021f7', 1, 1),
(12, 'gianella', 'Gianella', 'c41c9b8b44853563cb9e3a2291e1c5e4ede7522006bd5b0c056dfaf5ee8f8809', 1, 1),
(13, 'secretaria1', 'Secretaria', 'secretaria1', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `id` int(11) NOT NULL,
  `dni` int(8) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `turno` varchar(10) DEFAULT NULL,
  `horario` varchar(100) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`id`, `dni`, `fecha`, `turno`, `horario`, `estado`) VALUES
(2, 75341852, '2023-06-16', 'Tarde', '1-2 p.m.', 1),
(3, 75341010, '2023-06-17', 'Tarde', '2-3 p.m.', 1),
(4, 78451236, '2023-06-16', 'Mañana', '10-11 a.m.', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuración`
--
ALTER TABLE `configuración`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dnipac` (`dnipac`);

--
-- Indices de la tabla `enfermeras`
--
ALTER TABLE `enfermeras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dnipac` (`dnipac`);

--
-- Indices de la tabla `familiares`
--
ALTER TABLE `familiares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dnipac` (`dnipac`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estadia` (`id_estadia`),
  ADD KEY `idx_dni` (`dni`);

--
-- Indices de la tabla `tipoestadia`
--
ALTER TABLE `tipoestadia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_caja` (`id_caja`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dnipac` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `configuración`
--
ALTER TABLE `configuración`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `enfermeras`
--
ALTER TABLE `enfermeras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `familiares`
--
ALTER TABLE `familiares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipoestadia`
--
ALTER TABLE `tipoestadia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD CONSTRAINT `diagnostico_ibfk_1` FOREIGN KEY (`dnipac`) REFERENCES `pacientes` (`dni`);

--
-- Filtros para la tabla `enfermeras`
--
ALTER TABLE `enfermeras`
  ADD CONSTRAINT `enfermeras_ibfk_1` FOREIGN KEY (`dnipac`) REFERENCES `pacientes` (`dni`);

--
-- Filtros para la tabla `familiares`
--
ALTER TABLE `familiares`
  ADD CONSTRAINT `familiares_ibfk_1` FOREIGN KEY (`dnipac`) REFERENCES `pacientes` (`dni`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_estadia`) REFERENCES `tipoestadia` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_caja`) REFERENCES `caja` (`id`);

--
-- Filtros para la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD CONSTRAINT `visitas_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `pacientes` (`dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
