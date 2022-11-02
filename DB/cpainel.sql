-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Set-2022 às 03:15
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cpainel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) UNSIGNED NOT NULL,
  `razaosocial` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `cnpj` int(20) NOT NULL,
  `telefone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `razaosocial`, `endereco`, `cnpj`, `telefone`) VALUES
(3, 'Adventure Gamez LTDA', 'Lot. Belo horizonte 331', 321654, '79999345626'),
(4, 'Almaviva do Brasil', 'Aracaju', 2147483647, '7999999999'),
(5, 'ODA Yakuza', 'N/A', 2035410001, '79999999999'),
(8, 'Nova Empresa', 'fic', 123654987, '7999999999'),
(10, 'Tipo', '321', 321, '321'),
(18, 'Guarda Real de Canaban', 'Reino de CANABAN', 2147483647, '87987989879'),
(20, 'Mineras', 'mirinha', 1234560001, '7933331111'),
(21, 'Grand Chase', 'Arredores do muro de Serdin', 2147483647, '79999345626');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `ID_Funcionario` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(12) NOT NULL,
  `nome` text NOT NULL,
  `sobrenome` text NOT NULL,
  `rg` int(11) NOT NULL,
  `email` text NOT NULL,
  `empresa` text NOT NULL,
  `Permissao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`ID_Funcionario`, `usuario`, `senha`, `nome`, `sobrenome`, `rg`, `email`, `empresa`, `Permissao`) VALUES
(27, '', '', 'Ronan', 'Canaban', 779898987, 'ronan.warrior@canaban.com', '21', 0),
(30, 'rodrigo', '123', 'Rodrigo', 'Chantel', 2147483647, 'rodrigochantel@gmail.com', '8', 5),
(36, '', '', 'Marie', 'Hown', 55889966, 'marie.hown@adventure.com', '8', 0),
(37, '', '', 'Elesis', 'Sieghart', 2147483647, 'elesis@grandchase.com', '21', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `usuario`, `senha`) VALUES
(1, 'rodrigo', '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`ID_Funcionario`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `ID_Funcionario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
