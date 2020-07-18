-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2020 at 11:57 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_proyecto_u_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id_estudiante` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `nombre`, `apellido`, `username`) VALUES
(4, 'hector eduardo', 'narvaez pantoja', 'hector.narvaez'),
(6, 'oscar alejandro', 'ortega estrada', 'oscar.ortega'),
(26, 'nestor andres', 'burbano pantoja', 'nestor.burbano'),
(27, 'andres camilo', 'estrada ortega', 'andres.estrada'),
(28, 'mateo danilo', 'leyton luna', 'mateo.leyton');

-- --------------------------------------------------------

--
-- Table structure for table `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `materia_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `usuario_estudiante` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `profesor` varchar(60) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vacio',
  `nota` decimal(5,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `materias`
--

INSERT INTO `materias` (`id_materia`, `materia_name`, `usuario_estudiante`, `profesor`, `nota`) VALUES
(56, 'Matematicas', 'nestor.burbano', 'gladys.benitez', '5.00'),
(57, 'Ingles', 'nestor.burbano', 'gladys.benitez', '1.00'),
(58, 'Ingles', 'andres.estrada', 'gladys.benitez', '3.00'),
(59, 'Fisica', 'andres.estrada', 'carlos.alberto', '0.00'),
(60, 'Ingles', 'mateo.leyton', 'gladys.benitez', '0.00'),
(61, 'Sociales', 'nestor.burbano', 'felipe.arteaga', '0.00'),
(62, 'Sociales', 'mateo.leyton', 'felipe.arteaga', '0.00'),
(63, 'Español', 'nestor.burbano', 'fransisco.pantoja', '0.00'),
(64, 'Español', 'andres.estrada', 'fransisco.pantoja', '0.00'),
(65, 'Sociales', 'hector.narvaez', 'felipe.arteaga', '0.00'),
(66, 'Español', 'oscar.ortega', 'fransisco.pantoja', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `materias_profesor`
--

CREATE TABLE `materias_profesor` (
  `id` int(11) NOT NULL,
  `materia_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `profesor` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `materias_profesor`
--

INSERT INTO `materias_profesor` (`id`, `materia_name`, `profesor`) VALUES
(11, 'Fisica', 'carlos.alberto'),
(12, 'Sociales', 'felipe.arteaga'),
(15, 'Arte', 'fransisco.pantoja'),
(26, 'Ingles', 'gladys.benitez'),
(29, 'Matematicas', 'gladys.benitez'),
(30, 'Fisica', 'gladys.benitez'),
(31, 'Bilogia', 'carlos.alberto'),
(32, 'Español', 'fransisco.pantoja'),
(33, 'Arte', 'claudia.pereira');

-- --------------------------------------------------------

--
-- Table structure for table `profesores`
--

CREATE TABLE `profesores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profesores`
--

INSERT INTO `profesores` (`id`, `nombre`, `apellido`, `username`) VALUES
(3, 'andres felipe', 'jaramillo arteaga', 'felipe.arteaga'),
(4, 'carlos fransico', 'pantoja velez', 'fransisco.pantoja'),
(7, 'muñoz ereso', 'Carlos alberto', 'carlos.alberto'),
(8, 'Gladys Elenas', 'Benitez Pantoja', 'gladys.benitez'),
(9, 'Claudia Andrea', 'Pereria Diaz', 'claudia.pereira');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(2, 'admin'),
(3, 'estudiante'),
(1, 'profesor');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rol_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`username`, `password`, `rol_id`) VALUES
('admin', 'admin1234', 2),
('andres.estrada', 'andres1234', 3),
('carlos.alberto', 'carlos1234', 1),
('claudia.pereira', 'claudia1234', 1),
('felipe.arteaga', 'felipe1234', 1),
('fransisco.pantoja', 'fransisco1234', 1),
('gladys.benitez', 'gladys1234', 1),
('hector.narvaez', 'hector1234', 3),
('mateo.leyton', 'mateo1234', 3),
('nestor.burbano', 'nestor1234', 3),
('oscar.ortega', 'oscar1234', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_estudiante`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `materia_name` (`materia_name`) USING BTREE,
  ADD KEY `profesor` (`profesor`),
  ADD KEY `materia-estudiante` (`usuario_estudiante`);

--
-- Indexes for table `materias_profesor`
--
ALTER TABLE `materias_profesor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materias-profesor` (`profesor`);

--
-- Indexes for table `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profesor-usuario` (`username`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rol` (`rol`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`username`),
  ADD KEY `rol-usuario` (`rol_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `materias_profesor`
--
ALTER TABLE `materias_profesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiante-usuario` FOREIGN KEY (`username`) REFERENCES `usuarios` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materia-estudiante` FOREIGN KEY (`usuario_estudiante`) REFERENCES `estudiantes` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materia-profesor` FOREIGN KEY (`profesor`) REFERENCES `profesores` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materias_profesor`
--
ALTER TABLE `materias_profesor`
  ADD CONSTRAINT `materias-profesor` FOREIGN KEY (`profesor`) REFERENCES `profesores` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profesores`
--
ALTER TABLE `profesores`
  ADD CONSTRAINT `profesor-usuario` FOREIGN KEY (`username`) REFERENCES `usuarios` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `rol-usuario` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
