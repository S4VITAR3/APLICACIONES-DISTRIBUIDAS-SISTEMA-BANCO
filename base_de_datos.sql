-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2022 at 06:54 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banco_aps`
--

-- --------------------------------------------------------

--
-- Table structure for table `capital`
--

CREATE TABLE `capital` (
  `id_capital` int(11) NOT NULL,
  `monto_neto` double NOT NULL,
  `numero_cuenta` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `capital`
--

INSERT INTO `capital` (`id_capital`, `monto_neto`, `numero_cuenta`) VALUES
(3, 3500, 555589129),
(4, 70, 554567892),
(5, 70, 554567892),
(6, 499, 554816219),
(7, 4000, 554716252),
(8, 4000, 554716252),
(9, 2.5, 554167891),
(10, 630, 554614242),
(11, 8.5, 554256902),
(12, 8.5, 554256902),
(13, 8.5, 554256902),
(14, 11, 555091082),
(15, 3114, 555192101);

-- --------------------------------------------------------

--
-- Table structure for table `movimientos`
--

CREATE TABLE `movimientos` (
  `id_movimiento` int(11) NOT NULL,
  `monto` double NOT NULL,
  `destinatario` int(30) NOT NULL,
  `remitente` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movimientos`
--

INSERT INTO `movimientos` (`id_movimiento`, `monto`, `destinatario`, `remitente`) VALUES
(6, 1000, 554423681, 554167891),
(7, 3, 554423681, 554167891),
(8, 300, 554423681, 554567892),
(9, 16, 554567892, 554167891),
(10, 300, 554716252, 554167891),
(11, 200, 554614242, 554816219),
(12, 100, 555091082, 555589129),
(13, 300, 554816219, 554614242),
(14, 1000, 554716252, 554816219),
(15, 2900, 555091082, 555589129),
(16, 200, 554716252, 554567892),
(17, 3000, 554716252, 554567892),
(18, 101, 554256902, 554816219),
(19, 1, 554256902, 554716252),
(20, 1, 554614242, 554716252),
(21, 1, 554816219, 554167891),
(22, 3000, 554816219, 555091082),
(23, 7000, 554423681, 554816219),
(24, 100, 554716252, 554256902),
(25, 9000, 554423681, 554614242),
(26, 499, 554816219, 554716252),
(27, 12, 555589129, 554167891),
(28, 54, 554567892, 554167891),
(29, 45, 555192101, 554167891),
(30, 69, 555192101, 554167891),
(35, 2.5, 554167891, 554256902),
(36, 1, 555589129, 554256902),
(37, 1, 555091082, 554614242),
(38, 10, 555091082, 554614242);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `numero_cuenta` int(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_paterno` varchar(100) NOT NULL,
  `apellido_materno` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nip` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`numero_cuenta`, `nombre`, `apellido_paterno`, `apellido_materno`, `username`, `nip`, `rol`, `estado`) VALUES
(554167891, 'Cesar', 'Garcia', 'Ramos', 'Cesar23', 1234, 'Administrador', 1),
(554256902, 'roberto', 'hernandez', 'reyes', 'robert', 1234, 'Cliente', 1),
(554390876, 'Roberto', 'Gamaliel', 'Campos', 'Roberto2', 1234, 'Capturista', 1),
(554423681, 'Marco', 'Galeana', 'Vargas', 'MarcoAntonio', 1234, 'Cliente', 1),
(554567892, 'Jesus', 'Tabarez', 'Natividad', 'Jesus', 1234, 'Cliente', 1),
(554614242, 'kevin', 'maldonado', 'maldonado', 'kevin', 1234, 'Cliente', 1),
(554716252, 'jonathan', 'dimas', 'gonzalez', 'jonathan', 1234, 'Cliente', 1),
(554816219, 'Edgar', 'Mesino', 'Vega', 'edgar', 1234, 'Cliente', 1),
(555091082, 'sebastian', 'rico', 'rodriguez', 'sebastian', 1234, 'Cliente', 1),
(555192101, 'marcos', 'antonio', 'maldonado', 'marcos', 1234, 'Cliente', 1),
(555589129, 'Marco', 'Lopez', 'Castro', 'Mari23', 1234, 'Cliente', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `capital`
--
ALTER TABLE `capital`
  ADD PRIMARY KEY (`id_capital`),
  ADD KEY `fk_capital_usuario` (`numero_cuenta`);

--
-- Indexes for table `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id_movimiento`),
  ADD KEY `fk_remitente` (`remitente`),
  ADD KEY `fk_destinatario` (`destinatario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`numero_cuenta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `capital`
--
ALTER TABLE `capital`
  MODIFY `id_capital` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id_movimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `capital`
--
ALTER TABLE `capital`
  ADD CONSTRAINT `fk_capital_usuario` FOREIGN KEY (`numero_cuenta`) REFERENCES `usuarios` (`numero_cuenta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `fk_destinatario` FOREIGN KEY (`destinatario`) REFERENCES `usuarios` (`numero_cuenta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_remitente` FOREIGN KEY (`remitente`) REFERENCES `usuarios` (`numero_cuenta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
