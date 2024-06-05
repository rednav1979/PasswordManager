-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 05-Jun-2024 às 14:18
-- Versão do servidor: 10.3.28-MariaDB
-- versão do PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tecnologia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `control_passwords`
--

CREATE TABLE `control_passwords` (
  `descricao` varchar(200) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  `endereco_ip` varchar(200) NOT NULL,
  `forma_acesso` varchar(50) DEFAULT NULL,
  `usu_criacao` varchar(50) DEFAULT NULL,
  `data_criacao` date DEFAULT NULL,
  `id` int(11) NOT NULL,
  `ip_criacao` varchar(50) DEFAULT NULL,
  `usu_solicitacao` varchar(50) DEFAULT NULL,
  `ip_solicitacao` varchar(50) DEFAULT NULL,
  `data_ultima_solicitacao` varchar(50) DEFAULT NULL,
  `login` varchar(500) DEFAULT NULL,
  `D_E_L_E_T_E` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `control_passwords`
--



--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `control_passwords`
--
ALTER TABLE `control_passwords`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `control_passwords`
--
ALTER TABLE `control_passwords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
