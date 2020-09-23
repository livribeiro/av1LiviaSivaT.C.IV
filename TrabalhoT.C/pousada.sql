-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Set-2020 às 23:37
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pousada`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome_cliente` varchar(50) NOT NULL,
  `documento` varchar(20) NOT NULL,
  `data_nascimento` varchar(10) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome_cliente`, `documento`, `data_nascimento`, `cidade`, `estado`) VALUES
(2, 'Lívia', '123.123.123-12', '2004-04-06', 'São Paulo', 'São Paulo'),
(3, 'Luiza', '123.123.123-14', '2011-01-17', 'Belo horizonte', 'Minas Gerais'),
(5, 'Daniel', '123.123.123-15', '1998-05-23', 'Careaçu', 'Minas Gerais'),
(6, 'Pedro', '321.123.454-90', '1997-02-28', 'Pouso Alegre', 'Minas Gerais'),
(7, 'Matheus', '123.123.123-12', '2000-01-18', 'São Paulo', 'São Paulo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `quartos`
--

CREATE TABLE `quartos` (
  `id` int(11) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `valor` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `quartos`
--

INSERT INTO `quartos` (`id`, `numero`, `tipo`, `valor`, `status`) VALUES
(2, '01', 'simples', '200', 'livre'),
(3, '03', 'simples', '200', 'livre'),
(4, '04', 'simples', '200', 'livre'),
(5, '04', 'simples', '200', 'livre'),
(6, '05', 'triplo', '450', 'livre'),
(7, '06', 'duplo', '230', 'ocupado'),
(8, '07', 'duplo', '230', 'Ocupado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `id_quartos` int(11) NOT NULL,
  `id_clientes` int(11) NOT NULL,
  `data_entrada` varchar(30) NOT NULL,
  `data_saida` varchar(30) NOT NULL,
  `valor_reserva` varchar(30) NOT NULL,
  `status_reserva` varchar(30) NOT NULL,
  `datahora_status` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`id`, `id_quartos`, `id_clientes`, `data_entrada`, `data_saida`, `valor_reserva`, `status_reserva`, `datahora_status`) VALUES
(1, 2, 1, '2017', '2007', '200', 'checkin', '2020-01-03 07:45:12'),
(2, 2, 2, '2020-09-22', '2020-09-25', '600', 'checkin', '2020-09-22 02:04:00'),
(3, 2, 2, '2020-09-15', '2020-09-18', '600', 'checkin', '2020-09-20 21:16:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `quartos`
--
ALTER TABLE `quartos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_quartos_fk` (`id_quartos`),
  ADD KEY `id_clientes_fk` (`id_clientes`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `quartos`
--
ALTER TABLE `quartos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
