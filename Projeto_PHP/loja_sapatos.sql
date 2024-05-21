-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/05/2024 às 17:39
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja_sapatos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `sapatos`
--

CREATE TABLE `sapatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sapatos`
--

INSERT INTO `sapatos` (`id`, `nome`, `descricao`, `preco`, `imagem`) VALUES
(1, 'Tênis de Corrida', 'Tênis confortável e leve para corridas.', 299.99, 'tenis_de_corrida.jpg'),
(2, 'Sapato Formal', 'Sapato elegante perfeito para eventos.', 399.99, 'sapato_formal.jpg'),
(3, 'Sapatênis', 'Sapatênis estiloso para uso diário.', 199.99, 'sneaker.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `sapatos`
--
ALTER TABLE `sapatos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `sapatos`
--
ALTER TABLE `sapatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
