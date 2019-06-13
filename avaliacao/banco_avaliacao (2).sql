-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Jun-2019 às 21:22
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banco_avaliacao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `especialista`
--

CREATE TABLE `especialista` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `contato` varchar(14) NOT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `resultado`
--

CREATE TABLE `resultado` (
  `id` int(11) NOT NULL,
  `imc` float NOT NULL,
  `data` date NOT NULL,
  `resultado_id` int(11) NOT NULL,
  `classificacao` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idtratamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tratamento`
--

CREATE TABLE `tratamento` (
  `id` int(11) NOT NULL,
  `exercicio` varchar(250) NOT NULL,
  `medicamento` varchar(100) NOT NULL,
  `alimentacao` varchar(500) NOT NULL,
  `tipo_tratamento` int(11) NOT NULL,
  `idespecialista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_nasc` date NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `altura` float NOT NULL,
  `peso` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `especialista`
--
ALTER TABLE `especialista`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resultado`
--
ALTER TABLE `resultado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_resultado_usuario_idx` (`idusuario`),
  ADD KEY `fk_resultado_tratamento1_idx` (`idtratamento`);

--
-- Indexes for table `tratamento`
--
ALTER TABLE `tratamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tratamento_especialista1_idx` (`idespecialista`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `especialista`
--
ALTER TABLE `especialista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resultado`
--
ALTER TABLE `resultado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tratamento`
--
ALTER TABLE `tratamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `resultado`
--
ALTER TABLE `resultado`
  ADD CONSTRAINT `fk_resultado_tratamento1` FOREIGN KEY (`idtratamento`) REFERENCES `tratamento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_resultado_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tratamento`
--
ALTER TABLE `tratamento`
  ADD CONSTRAINT `fk_tratamento_especialista1` FOREIGN KEY (`idespecialista`) REFERENCES `especialista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
