-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 30, 2021 at 04:01 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TabChan`
--

-- --------------------------------------------------------

--
-- Table structure for table `BUG`
--

CREATE TABLE `BUG` (
  `idBug` int(11) NOT NULL,
  `bug` varchar(600) NOT NULL,
  `idUsu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `BUG`
--

INSERT INTO `BUG` (`idBug`, `bug`, `idUsu`) VALUES
(1, 'no funciona el inciar sesion', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `PUBLICACIONES`
--

CREATE TABLE `PUBLICACIONES` (
  `idPub` int(11) NOT NULL,
  `texto` varchar(600) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `imagen` longblob DEFAULT NULL,
  `idUsu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PUBLICACIONES`
--

INSERT INTO `PUBLICACIONES` (`idPub`, `texto`, `titulo`, `imagen`, `idUsu`) VALUES
(5, 'arriaaaaa', 'arre', 0x696d672f646f673a302e6a7067, 5),
(19, 'dsadsa', 'asd', 0x696d672f646f673a302e6a7067, 1),
(26, 'dsadsa', 'asd', 0x696d672f646f673a302e6a7067, 1),
(37, 'juan escutia agustin', 'jose maria morelos', 0x696d672f35306332373564636132373161626665336234393134343130663439353430322e706e67, 1),
(38, 'buen dia', 'waaaa', 0x696d672f313633323538323637373038302e6a7067, 1),
(51, 'como tas', 'hola', 0x696d672f3136333430383537383238393630335f31335f3135706d323032315f31315f33305f312e706e67, 1);

-- --------------------------------------------------------

--
-- Table structure for table `REPORTES`
--

CREATE TABLE `REPORTES` (
  `idRep` int(11) NOT NULL,
  `razRep` varchar(100) NOT NULL,
  `idUsu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `REPORTES`
--

INSERT INTO `REPORTES` (`idRep`, `razRep`, `idUsu`) VALUES
(3, 'que mal se porto el vato', 1);

-- --------------------------------------------------------

--
-- Table structure for table `USUARIO`
--

CREATE TABLE `USUARIO` (
  `idUsu` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `contra` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `USUARIO`
--

INSERT INTO `USUARIO` (`idUsu`, `username`, `contra`) VALUES
(1, 'asd', 'dsa'),
(5, 'pla', 'asd'),
(9, 'admin', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BUG`
--
ALTER TABLE `BUG`
  ADD PRIMARY KEY (`idBug`),
  ADD KEY `fkUsuBug` (`idUsu`);

--
-- Indexes for table `PUBLICACIONES`
--
ALTER TABLE `PUBLICACIONES`
  ADD PRIMARY KEY (`idPub`),
  ADD KEY `fkUsuPub` (`idUsu`);

--
-- Indexes for table `REPORTES`
--
ALTER TABLE `REPORTES`
  ADD PRIMARY KEY (`idRep`),
  ADD KEY `fkUsuRep` (`idUsu`);

--
-- Indexes for table `USUARIO`
--
ALTER TABLE `USUARIO`
  ADD PRIMARY KEY (`idUsu`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BUG`
--
ALTER TABLE `BUG`
  MODIFY `idBug` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `PUBLICACIONES`
--
ALTER TABLE `PUBLICACIONES`
  MODIFY `idPub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `REPORTES`
--
ALTER TABLE `REPORTES`
  MODIFY `idRep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `USUARIO`
--
ALTER TABLE `USUARIO`
  MODIFY `idUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
