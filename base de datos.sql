-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-08-2024 a las 11:41:16
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
-- Base de datos: `gestion-gastos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblexpense`
--

CREATE TABLE `tblexpense` (
  `ID` int(10) NOT NULL,
  `UserId` int(10) NOT NULL,
  `ExpenseDate` date DEFAULT NULL,
  `ExpenseItem` varchar(200) DEFAULT NULL,
  `ExpenseCost` varchar(200) DEFAULT NULL,
  `NoteDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tblexpense`
--

INSERT INTO `tblexpense` (`ID`, `UserId`, `ExpenseDate`, `ExpenseItem`, `ExpenseCost`, `NoteDate`) VALUES
(36, 11, '2024-08-29', 'Camiseta Rock', '25', '2024-08-29 09:22:42'),
(37, 8, '2024-08-29', 'Libro Arte Valencia', '25', '2024-08-29 10:29:35'),
(38, 8, '2024-08-28', 'Ropa Turka', '17', '2024-08-29 10:30:21'),
(39, 8, '2024-08-29', 'Chancla Natu', '34', '2024-08-30 02:49:26'),
(40, 8, '2024-08-29', 'Chaqueta Bli', '33', '2024-08-30 02:56:59'),
(41, 8, '2024-09-06', 'Prenda Caat', '58', '2024-08-30 08:31:23'),
(42, 8, '2024-08-30', 'Aparato Electrónico', '58', '2024-08-30 08:40:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbluser`
--

CREATE TABLE `tbluser` (
  `ID` int(10) NOT NULL,
  `FullName` varchar(150) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FullName`, `Email`, `MobileNumber`, `Password`, `RegDate`) VALUES
(8, 'Mauricio Sevilla', 'hola@configuroweb.com', 3162430081, '4b67deeb9aba04a5b54632ad19934f26', '2019-05-17 05:34:16'),
(10, 'Pedro Usuario', 'pusuario@cweb.com', 3256849767, 'f925916e2754e5e03f75dd58a5733251', '2019-05-18 05:34:53'),
(11, 'Juan Usuario', 'jusuario@cweb.com', 3056847512, '75bc4f9d5ddcc951c9686b9780ed48c5', '2024-08-29 09:21:15'),
(12, 'Pedro Usuario', 'pusuario@cweb.com', 3056243157, '4b67deeb9aba04a5b54632ad19934f26', '2024-08-29 10:38:24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblexpense`
--
ALTER TABLE `tblexpense`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblexpense`
--
ALTER TABLE `tblexpense`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
