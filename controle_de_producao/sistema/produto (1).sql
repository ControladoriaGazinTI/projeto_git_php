-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jun-2019 às 21:35
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
-- Database: `banco_tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `qtde` int(11) NOT NULL,
  `valor` float NOT NULL,
  `foto` varchar(30) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `cor` varchar(30) NOT NULL,
  `idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `qtde`, `valor`, `foto`, `descricao`, `cor`, `idcategoria`) VALUES
(18, 'Banqueta Bali Alta', 0, 0, '1560360083', '<span style=\"color: rgb(44, 44, 44); font-family: Montserrat; font-size: 17px;\">Dimensões:</span><br', '1', 7),
(19, 'Banqueta Bali Baixa', 0, 0, '1560360622', '<span style=\"color: rgb(44, 44, 44); font-family: Montserrat; font-size: 17px;\">Dimensões:</span><br', '1', 7),
(20, 'Banqueta Flórida', 0, 0, '1560360812', '<p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 30px; font-family: Montserrat; li', '1', 7),
(21, 'Banquetas Banqueta Malibu', 0, 0, '1560360984', '<p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 30px; font-family: Montserrat; li', '1', 7),
(23, 'Cadeira de Fio Eletrostático Plus', 0, 0, '1560361338', '<strong style=\"-webkit-tap-highlight-color: transparent; color: rgb(44, 44, 44); font-family: Montse', '1', 9),
(24, 'Cadeira de Fio Infantil', 0, 0, '1560361441', '<strong style=\"-webkit-tap-highlight-color: transparent; color: rgb(44, 44, 44); font-family: Montse', '1', 9),
(25, 'Cadeira Hawai de Fibra', 0, 0, '1560361571', '<strong style=\"-webkit-tap-highlight-color: transparent; color: rgb(44, 44, 44); font-family: Montse', '1', 9),
(26, 'Cadeira Londres ISO', 0, 0, '1560361715', '<strong style=\"-webkit-tap-highlight-color: transparent; color: rgb(44, 44, 44); font-family: Montse', '1', 10),
(27, 'Cadeirão de Fibra master plus', 0, 0, '1560363027', '<span style=\"color: rgb(44, 44, 44); font-family: Montserrat; font-size: 17px;\">Dimensões:</span><br', '1', 9),
(28, 'Cadeirão de Fio Master Plus', 0, 0, '1560363191', '<span style=\"color: rgb(44, 44, 44); font-family: Montserrat; font-size: 17px;\">Dimensões:</span><br', '1', 9),
(29, 'Conjunto de Mesa Los Angeles', 0, 0, '1560363454', '<p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 30px; font-family: Montserrat; li', '1', 11),
(30, 'Conjunto Mesa Alicante', 0, 0, '1560363897', '<span style=\"color: rgb(44, 44, 44); font-family: Montserrat; font-size: 17px;\">Dimensões da mesa mo', '1', 11),
(31, 'Conjunto Mesa Nevada', 0, 0, '1560364103', '<p><strong style=\"-webkit-tap-highlight-color: transparent; color: rgb(44, 44, 44); font-family: Mon', '1', 11),
(32, 'Estante de Aço Bariloche', 0, 0, '1560364277', '<strong style=\"-webkit-tap-highlight-color: transparent; color: rgb(44, 44, 44); font-family: Montse', '1', 12),
(33, 'Estante de Aço Bariloche', 0, 0, '1560367059', '<strong style=\"-webkit-tap-highlight-color: transparent; color: rgb(44, 44, 44); font-family: Montse', '1', 12),
(34, 'Estante de Aço Bariloche 3', 0, 0, '1560367133', '<span style=\"color: rgb(44, 44, 44); font-family: Montserrat; font-size: 17px;\">Dimensões:</span><br', '1', 12),
(35, 'Estante de Aço Bariloche 3 Bandejas', 0, 0, '1560367290', '<span style=\"color: rgb(44, 44, 44); font-family: Montserrat; font-size: 17px;\">Dimensões:</span><br', '1', 12),
(36, 'Estante de Aço Bariloche 5 Bandejas', 0, 0, '1560367413', '<strong style=\"-webkit-tap-highlight-color: transparent; color: rgb(44, 44, 44); font-family: Montse', '1', 12),
(37, 'Estante de Aço Bariloche 5 Bandejas', 0, 0, '1560367472', '<strong style=\"-webkit-tap-highlight-color: transparent; color: rgb(44, 44, 44); font-family: Montse', '1', 12),
(38, 'Mesa Bistrô Paris', 0, 0, '1560367558', '<strong style=\"-webkit-tap-highlight-color: transparent; color: rgb(44, 44, 44); font-family: Montse', '1', 5),
(39, 'Mesa de Centro Havana', 0, 0, '1560367663', '<strong style=\"-webkit-tap-highlight-color: transparent; color: rgb(44, 44, 44); font-family: Montse', '1', 5),
(40, 'Mesa de Passar Madri', 0, 0, '1560367787', '<span style=\"color: rgb(44, 44, 44); font-family: Montserrat; font-size: 17px;\">Altura: &nbsp;80 cm<', '1', 13),
(41, 'Rack Multiuso Aspen', 0, 0, '1560367883', '<span style=\"color: rgb(44, 44, 44); font-family: Montserrat; font-size: 17px;\">Dimensões:</span><br', '1', 6),
(42, 'Rack Multiuso Dallas', 0, 0, '1560367994', '<span style=\"color: rgb(44, 44, 44); font-family: Montserrat; font-size: 17px;\">Dimensões:</span><br', '1', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produto_categoria1_idx` (`idcategoria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_produto_categoria1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
