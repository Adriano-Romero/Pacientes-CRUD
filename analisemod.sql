-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2016 at 06:02 PM
-- Server version: 10.1.9-MariaDB-log
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `analisemod`
--

-- --------------------------------------------------------

--
-- Table structure for table `exames`
--
CREATE SCHEMA IF NOT EXISTS `analisemod` DEFAULT CHARACTER SET utf8 ;
USE `analise` ;

CREATE TABLE `exames` (
  `id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `procedimento_id` int(11) NOT NULL,
  `data` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exames`
--

INSERT INTO `exames` (`id`, `paciente_id`, `procedimento_id`, `data`) VALUES
(1, 1, 1, '1'),
(2, 2, 2, '2'),
(3, 1, 1, '3'),
(4, 1, 1, '4'),
(5, 1, 4, '4'),
(6, 16, 3, '12/4/5'),
(7, 1, 4, '12/03/2016');

-- --------------------------------------------------------

--
-- Table structure for table `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `login`, `password`, `remember_token`) VALUES
(1, 'Maria Silva', 'silva', '4620', '0UxHdrwOlXQO0vlkBVAoK0sGhIBe4zWh0CZGnclyVDnkQDYoUiyLc8Lf0FVT'),
(2, 'José Santos', 'santos', '4298', 'uzDNXQCuJwpwLrktZUqDobD48KIJq7QlGuhrDnJ3y24MQ082k0iWPk7nEiQX'),
(3, 'Antônio Oliveira', 'oliveira', '4631', 'zvKEka6QpPfXS2iBrLOHn0MBTgEVdLGeEPhRwmN3M7Np8O6RVNjlkN2QpDxA'),
(4, 'João Souza', 'souza', '3262', ''),
(5, 'Francisco Pereira', 'pereira', '3415', ''),
(6, 'Ana Costela', 'costela', '4291', ''),
(7, 'Luiz Carvalho', 'carvalho', '4211', ''),
(8, 'Paulo Almeida', 'almeida', '3181', ''),
(9, 'Carlos Ferreira', 'ferreira', '4272', ''),
(10, 'Manoel Ribeiro', 'ribeiro', '4817', ''),
(11, 'Pedro Rodrigues', 'rodrigues', '4270', ''),
(12, 'Francisca Gomes', 'gomes', '3898', ''),
(13, 'Marcos Lima', 'lima', '3683', ''),
(14, 'Raimundo Martins', 'martins', '3723', ''),
(15, 'Sebastião Rocha', 'rocha', '4563', ''),
(16, 'Antônia Alves', 'alves', '4649', ''),
(17, 'Marcelo Araújo', 'araujo', '4557', ''),
(18, 'Jorge Xavier', 'xavier', '3837', ''),
(19, 'Márcia Barbosa', 'barbosa', '4516', ''),
(20, 'Geraldo Castro', 'castro', '4069', ''),
(21, 'Adriana Fernandes', 'fernandes', '3796', ''),
(22, 'Sandra Melo', 'melo', '3773', ''),
(23, 'Luis Azevedo', 'azevedo', '4477', ''),
(24, 'Fernando Barros', 'barros', '4070', ''),
(25, 'Fabio Cardoso', 'cardoso', '3916', ''),
(26, 'Roberto Correia', 'correia', '4371', 'ntW4G0OGotHMUFCCpoygIviwR6ZYLeHrffM9sTDnEC6jyDTxNZk7gsI9O6zl'),
(27, 'Márcio Cunha', 'cunha', '3109', ''),
(28, 'Edson Dias', 'dias', '3431', ''),
(29, 'André Mesquita', 'mesquita', '4828', ''),
(30, 'testando2', 'testando2', 'testando2', 'T01emMcJYcpDIWnw3e5xzG8fifby773MKE0FCTtlRObHsyfP8ZhGIsG2fDKt');

-- --------------------------------------------------------

--
-- Table structure for table `procedimentos`
--

CREATE TABLE `procedimentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `procedimentos`
--

INSERT INTO `procedimentos` (`id`, `nome`, `preco`) VALUES
(1, 'GLICEMIA', '10.00'),
(2, 'HIDROXIVITAMINA D', '15.00'),
(3, 'PROTEINAS TOTAIS', '45.00'),
(4, 'DENGUE', '22.00'),
(5, 'BETA HCG QUANTITATIVO', '18.00'),
(6, 'HEMOGRAMA', '12.00'),
(7, 'VITAMINA K', '45.00'),
(8, 'COLESTEROL TOTAL', '15.00'),
(9, 'GRUPO SANGUINEO + FATOR RH', '10.00'),
(10, 'HORMONIO DE CRESCIMENTO (GH)', '45.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exames`
--
ALTER TABLE `exames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procedimentos`
--
ALTER TABLE `procedimentos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exames`
--
ALTER TABLE `exames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `procedimentos`
--
ALTER TABLE `procedimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
