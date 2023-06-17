-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2023 a las 18:45:22
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
(2, '75341091', 'fa', '986532147', 'Salida', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

CREATE TABLE `diagnostico` (
  `id` int(11) NOT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `medicamento` varchar(100) DEFAULT NULL,
  `detalles` text DEFAULT NULL,
  `dnipac` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermera`
--

CREATE TABLE `enfermera` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apepaterno` varchar(50) DEFAULT NULL,
  `apematerno` varchar(50) DEFAULT NULL,
  `dni` int(8) DEFAULT NULL,
  `dnipac` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(17, 10101010, 'Juan', 'Quispe', 'Yupa', 986532147, 'yupa@gmail.com', 75341010, 1),
(18, 10101020, 'Gianella', 'Ximenez', 'Ximenez', 986532141, 'giane@gmail.com', 78451236, 1);

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
(5, 78451236, 'Juan', 'Perez', 'Quispe', '0000-00-00', 33, 1, 5),
(6, 78451236, 'Juan', 'Perez', 'Quispe', '0000-00-00', 33, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planestadia`
--

CREATE TABLE `planestadia` (
  `idplan` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `duracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'admin', 'Fabian', 'admin', 1, 0),
(3, 'fabian', 'FabianJ', 'fabian', 2, 0),
(4, 'fabiancito', 'fabiancito', 'faa', 2, 0),
(5, 'julia', 'julia<3', 'julia', 1, 0),
(6, 'amador', 'amador modificado', 'amador', 2, 0),
(7, 'yuli', 'yuli', 'yuli', 1, 0),
(8, 'maria', 'maria', 'maria', 2, 0),
(9, 'mari', 'mari', 'mari1', 1, 0),
(10, 'contra', 'contra', '2270e73a86e507f7a99d98e739a62f96ec812c1a19b37a0db27785e620518566', 2, 0),
(11, 'admin1', 'admin1', '25f43b1486ad95a1398e3eeb3d83bc4010015fcc9bedb35b432e00298d5021f7', 1, 1),
(12, 'gianella', 'Gianella', 'c41c9b8b44853563cb9e3a2291e1c5e4ede7522006bd5b0c056dfaf5ee8f8809', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE `visita` (
  `id` int(11) NOT NULL,
  `dnipac` int(8) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `turno` varchar(10) DEFAULT NULL,
  `horario` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indices de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dnipac` (`dnipac`);

--
-- Indices de la tabla `enfermera`
--
ALTER TABLE `enfermera`
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
-- Indices de la tabla `planestadia`
--
ALTER TABLE `planestadia`
  ADD PRIMARY KEY (`idplan`);

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
-- Indices de la tabla `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dnipac` (`dnipac`);

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
-- AUTO_INCREMENT de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `enfermera`
--
ALTER TABLE `enfermera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `familiares`
--
ALTER TABLE `familiares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipoestadia`
--
ALTER TABLE `tipoestadia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD CONSTRAINT `diagnostico_ibfk_1` FOREIGN KEY (`dnipac`) REFERENCES `pacientes` (`dni`);

--
-- Filtros para la tabla `enfermera`
--
ALTER TABLE `enfermera`
  ADD CONSTRAINT `enfermera_ibfk_1` FOREIGN KEY (`dnipac`) REFERENCES `pacientes` (`dni`);

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
-- Filtros para la tabla `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `visita_ibfk_1` FOREIGN KEY (`dnipac`) REFERENCES `pacientes` (`dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
