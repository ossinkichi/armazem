-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/03/2024 às 17:00
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
-- Banco de dados: `supermarket`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `category` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Fruta'),
(2, 'Movel'),
(3, 'Roupa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `productentry`
--

CREATE TABLE `productentry` (
  `id` int(10) NOT NULL,
  `codeProduct` int(10) NOT NULL,
  `productName` varchar(350) NOT NULL,
  `amount` int(10) NOT NULL,
  `productInsertionDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `productentry`
--

INSERT INTO `productentry` (`id`, `codeProduct`, `productName`, `amount`, `productInsertionDate`) VALUES
(1, 15973, 'Banana prata', 2, '2024-03-18'),
(2, 15978, 'Poltrona', 1, '2024-03-18');

-- --------------------------------------------------------

--
-- Estrutura para tabela `products`
--

CREATE TABLE `products` (
  `code` int(10) NOT NULL,
  `name` varchar(350) NOT NULL,
  `price` varchar(15) NOT NULL,
  `inStock` int(10) NOT NULL,
  `category` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `products`
--

INSERT INTO `products` (`code`, `name`, `price`, `inStock`, `category`) VALUES
(15973, 'Banana prata', '7.00', 9, 'Fruta'),
(15978, 'Poltrona', '120.50', 6, 'Movel');

-- --------------------------------------------------------

--
-- Estrutura para tabela `promotions`
--

CREATE TABLE `promotions` (
  `id` int(10) NOT NULL,
  `productCode` int(10) NOT NULL,
  `productName` varchar(350) NOT NULL,
  `promotionPrice` varchar(30) NOT NULL,
  `startOfPromotion` varchar(20) NOT NULL,
  `endOfPromotion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `reports`
--

CREATE TABLE `reports` (
  `id` int(10) NOT NULL,
  `code` int(1) NOT NULL,
  `reportDate` varchar(20) NOT NULL,
  `authorOfTheReport` varchar(350) NOT NULL,
  `report` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `reports`
--

INSERT INTO `reports` (`id`, `code`, `reportDate`, `authorOfTheReport`, `report`) VALUES
(1, 12, '18/03/24', 'Gerente', 'esse é um assunto muitp aleatorio so para teste');

-- --------------------------------------------------------

--
-- Estrutura para tabela `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `productCode` int(30) NOT NULL,
  `productName` varchar(350) NOT NULL,
  `amount` int(10) NOT NULL,
  `authorOfTheRequest` varchar(350) NOT NULL,
  `requestDate` varchar(11) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Em analise'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `requests`
--

INSERT INTO `requests` (`id`, `productCode`, `productName`, `amount`, `authorOfTheRequest`, `requestDate`, `status`) VALUES
(1, 15973, 'Banana prata', 2, 'Gerente', '24-03-19', 'Em analise'),
(2, 15978, 'Poltrona', 2, 'Gerente', '24-03-19', 'Aceito'),
(3, 0, '', 0, 'Gerente', '24-03-19', 'Em analise'),
(4, 0, '', 0, 'Gerente', '24-03-19', 'Aceito'),
(5, 0, '', 0, 'Gerente', '24-03-19', 'Em analise'),
(6, 15973, 'Banana prata', 5, 'Gerente', '24-03-19', 'Em analise'),
(7, 15973, 'Banana prata', 7, 'Gerente', '24-03-19', 'Em analise');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(350) NOT NULL,
  `password` varchar(350) NOT NULL,
  `dateOfBirth` varchar(11) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `email` varchar(350) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'ativo',
  `accessLevel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `dateOfBirth`, `gender`, `email`, `phone`, `status`, `accessLevel`) VALUES
(1, 'Admin', '$2y$10$D5LC7mUbOd64QPTndH9RnekDzSEgpP33I/opl9Iny8Wfg7fUu88FK', '2004-12-17', '0', 'admin@gmail.com', '75928469173', 'ativo', 0),
(2, 'Funcionario', '$2y$10$K93G3SYVuwXA/AzpPot6Xunh.Sx9JyRnoe02M7X3Z9Mi7TQsmrNDq', '2004-12-17', '0', 'funcionario@gmail.com', '1876942', 'desativado', 2),
(3, 'Gerente', '$2y$10$ami41duLuLgQFSaK8nAy9e/XkSVLvKELCJ6VVusAwceHwHMzs5JAe', '2587-04-20', '0', 'gerente@gmail.com', '15829764', 'ativo', 1),
(6, 'Julieta Parai', '$2y$10$YfyFN.9Aa392ar9R9lQRyOJx/EKc6a/y4atg6zZVU2uaR3F/DEZPO', '2004-12-17', 'feminino', 'parai351@gmail.com', '5487564899', 'ativo', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `productentry`
--
ALTER TABLE `productentry`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `products`
--
ALTER TABLE `products`
  ADD UNIQUE KEY `code` (`code`);

--
-- Índices de tabela `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `productentry`
--
ALTER TABLE `productentry`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
