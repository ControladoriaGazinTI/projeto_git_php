-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25-Jul-2019 às 19:20
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
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(4, 'Cadeira'),
(5, 'Mesa'),
(6, 'Rack'),
(7, 'Banquetas'),
(9, 'Cadeira de fio'),
(10, 'Cadeira de Escritório'),
(11, 'Conjunto de Mesa'),
(12, 'Estante'),
(13, 'Mesa de Passar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `telefone` varchar(14) NOT NULL,
  `telefone2` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcao`
--

CREATE TABLE `funcao` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcao`
--

INSERT INTO `funcao` (`id`, `nome`) VALUES
(5, 'Auxiliar de Produção'),
(7, 'Lider'),
(8, 'Gerente'),
(9, 'Operador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_nasc` date NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `carteira` varchar(10) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `login` varchar(20) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tipo_usuario` tinyint(4) DEFAULT NULL,
  `idfuncao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id`, `nome`, `data_nasc`, `cpf`, `carteira`, `telefone`, `cidade`, `bairro`, `rua`, `numero`, `login`, `senha`, `email`, `tipo_usuario`, `idfuncao`) VALUES
(37, 'Rômulo da Cruz Vieira', '1999-06-20', '123.375.479-30', '012.34567.', '(44) 9767-2690', 'Douradina', 'Parque Ana Laura', 'Márcio Amarildo de Jesus', 123, 'romulo.vieira', '$1$b9u/K4vD$DK/EF/yIdXYdAhCq6Z0Pf1', 'romuloevil@outlook.com', NULL, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_pedido`
--

CREATE TABLE `item_pedido` (
  `idpedido` int(11) NOT NULL,
  `idproduto` int(11) NOT NULL,
  `qtde` int(11) NOT NULL,
  `valor` float NOT NULL,
  `prioridade` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_producao`
--

CREATE TABLE `item_producao` (
  `idproduto` int(11) NOT NULL,
  `idproducao` int(11) NOT NULL,
  `prioridade` varchar(20) CHARACTER SET armscii8 NOT NULL,
  `qtde` int(11) NOT NULL,
  `qtde_perda` int(11) NOT NULL,
  `idfuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_producao_peca`
--

CREATE TABLE `item_producao_peca` (
  `idpeca` int(11) NOT NULL,
  `idproducao_peca` int(11) NOT NULL,
  `qtde` int(11) NOT NULL,
  `qtde_perda` int(11) NOT NULL,
  `prioridade` varchar(5) NOT NULL,
  `idfuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_produto`
--

CREATE TABLE `item_produto` (
  `idpeca` int(11) NOT NULL,
  `idproduto` int(11) NOT NULL,
  `qtde` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `peca`
--

CREATE TABLE `peca` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `qtde` int(11) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `peca`
--

INSERT INTO `peca` (`id`, `nome`, `qtde`, `foto`) VALUES
(5, 'ADSF', 56564, '1560349332'),
(6, 'pe de cuiba', 0, '1560349792');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `data_entrega` date NOT NULL,
  `data_lancamento` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idfuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `producao`
--

CREATE TABLE `producao` (
  `id` int(11) NOT NULL,
  `data_entrega` date NOT NULL,
  `data_lancamento` date NOT NULL,
  `observacao` varchar(100) NOT NULL,
  `andamento` varchar(45) NOT NULL,
  `idfuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `producao_peca`
--

CREATE TABLE `producao_peca` (
  `id` int(11) NOT NULL,
  `data_lancamento` date NOT NULL,
  `data_entrega` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `idfuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(19, 'Banqueta Bali Baixa', 50, 0, '1560360622', '<span style=\"color: rgb(44, 44, 44); font-family: Montserrat; font-size: 17px;\">Dimensões:</span><br', '1', 7),
(20, 'Banqueta Flórida', 0, 0, '1560360812', '<p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 30px; font-family: Montserrat; li', '1', 7),
(21, 'Banquetas Banqueta Malibu', 0, 0, '1560360984', '<p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 30px; font-family: Montserrat; li', '1', 7),
(23, 'Cadeira de Fio Eletrostático Plus', 0, 0, '1560361338', '<strong style=\"-webkit-tap-highlight-color: transparent; color: rgb(44, 44, 44); font-family: Montse', '1', 9),
(24, 'Cadeira de Fio Infantil', 0, 0, '1560361441', '<strong style=\"-webkit-tap-highlight-color: transparent; color: rgb(44, 44, 44); font-family: Montse', '1', 9),
(25, 'Cadeira Hawai de Fibra', 0, 0, '1560361571', '<strong style=\"-webkit-tap-highlight-color: transparent; color: rgb(44, 44, 44); font-family: Montse', '1', 9),
(26, 'Cadeira Londres ISO', 0, 0, '1560361715', '<strong style=\"-webkit-tap-highlight-color: transparent; color: rgb(44, 44, 44); font-family: Montse', '1', 10),
(27, 'Cadeirão de Fibra master plus', 0, 0, '1560363027', '<span style=\"color: rgb(44, 44, 44); font-family: Montserrat; font-size: 17px;\">Dimensões:</span><br', '1', 9),
(28, 'Cadeirão de Fio Master Plus', 52, 0, '1560363191', '<span style=\"color: rgb(44, 44, 44); font-family: Montserrat; font-size: 17px;\">Dimensões:</span><br', '1', 9),
(29, 'Conjunto de Mesa Los Angeles', 0, 0, '1560363454', '<p style=\"-webkit-tap-highlight-color: transparent; margin-bottom: 30px; font-family: Montserrat; li', '1', 11),
(30, 'Conjunto Mesa Alicante', 200, 0, '1560363897', '<span style=\"color: rgb(44, 44, 44); font-family: Montserrat; font-size: 17px;\">Dimensões da mesa mo', '1', 11),
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
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcao`
--
ALTER TABLE `funcao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_funcao1_idx` (`idfuncao`);

--
-- Indexes for table `item_pedido`
--
ALTER TABLE `item_pedido`
  ADD PRIMARY KEY (`idproduto`,`idpedido`),
  ADD KEY `fk_item_pedido_pedido_idx` (`idpedido`),
  ADD KEY `fk_item_pedido_produto1_idx` (`idproduto`);

--
-- Indexes for table `item_producao`
--
ALTER TABLE `item_producao`
  ADD PRIMARY KEY (`idproduto`,`idproducao`),
  ADD KEY `fk_item_producao_producao1_idx` (`idproducao`),
  ADD KEY `fk_item_producao_usuario1_idx` (`idfuncionario`),
  ADD KEY `fk_item_producao_produto1_idx` (`idproduto`);

--
-- Indexes for table `item_producao_peca`
--
ALTER TABLE `item_producao_peca`
  ADD PRIMARY KEY (`idpeca`,`idproducao_peca`),
  ADD KEY `fk_peca_has_producao_peca_producao_peca1_idx` (`idproducao_peca`),
  ADD KEY `fk_peca_has_producao_peca_peca1_idx` (`idpeca`),
  ADD KEY `fk_item_producao_peca_funcionario1_idx` (`idfuncionario`);

--
-- Indexes for table `item_produto`
--
ALTER TABLE `item_produto`
  ADD PRIMARY KEY (`idpeca`,`idproduto`),
  ADD KEY `fk_peca_has_produto_produto1_idx` (`idproduto`),
  ADD KEY `fk_peca_has_produto_peca1_idx` (`idpeca`);

--
-- Indexes for table `peca`
--
ALTER TABLE `peca`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pedido_usuario1_idx` (`idfuncionario`),
  ADD KEY `fk_pedido_cliente1_idx` (`idcliente`);

--
-- Indexes for table `producao`
--
ALTER TABLE `producao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producao_usuario1_idx` (`idfuncionario`);

--
-- Indexes for table `producao_peca`
--
ALTER TABLE `producao_peca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producao_peca_funcionario1_idx` (`idfuncionario`);

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
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcao`
--
ALTER TABLE `funcao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `peca`
--
ALTER TABLE `peca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producao`
--
ALTER TABLE `producao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producao_peca`
--
ALTER TABLE `producao_peca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fk_usuario_funcao1` FOREIGN KEY (`idfuncao`) REFERENCES `funcao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `item_pedido`
--
ALTER TABLE `item_pedido`
  ADD CONSTRAINT `fk_item_pedido_pedido` FOREIGN KEY (`idpedido`) REFERENCES `pedido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_pedido_produto1` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `item_producao`
--
ALTER TABLE `item_producao`
  ADD CONSTRAINT `fk_item_producao_producao1` FOREIGN KEY (`idproducao`) REFERENCES `producao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_producao_produto1` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_item_producao_usuario1` FOREIGN KEY (`idfuncionario`) REFERENCES `funcionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `item_producao_peca`
--
ALTER TABLE `item_producao_peca`
  ADD CONSTRAINT `fk_item_producao_peca_funcionario1` FOREIGN KEY (`idfuncionario`) REFERENCES `funcionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_peca_has_producao_peca_peca1` FOREIGN KEY (`idpeca`) REFERENCES `peca` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_peca_has_producao_peca_producao_peca1` FOREIGN KEY (`idproducao_peca`) REFERENCES `producao_peca` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `item_produto`
--
ALTER TABLE `item_produto`
  ADD CONSTRAINT `fk_peca_has_produto_peca1` FOREIGN KEY (`idpeca`) REFERENCES `peca` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_peca_has_produto_produto1` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_cliente1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido_usuario1` FOREIGN KEY (`idfuncionario`) REFERENCES `funcionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `producao`
--
ALTER TABLE `producao`
  ADD CONSTRAINT `fk_producao_usuario1` FOREIGN KEY (`idfuncionario`) REFERENCES `funcionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `producao_peca`
--
ALTER TABLE `producao_peca`
  ADD CONSTRAINT `fk_producao_peca_funcionario1` FOREIGN KEY (`idfuncionario`) REFERENCES `funcionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `fk_produto_categoria1` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
