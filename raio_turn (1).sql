-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Out-2022 às 04:27
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `raio_turn`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `classe_material`
--

CREATE TABLE `classe_material` (
  `id` int(2) NOT NULL,
  `designacao` varchar(20) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `voltagem` varchar(5) DEFAULT NULL,
  `material_feito` varchar(255) DEFAULT NULL,
  `peso` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `classe_material`
--

INSERT INTO `classe_material` (`id`, `designacao`, `imagem`, `voltagem`, `material_feito`, `peso`) VALUES
(2, 'AA', 'pilhaAA.jpg', '5v', 'chumbo', 0.1),
(14, 'AAA', 'pilhaAAA.jpg', '5v', 'chumbo', 0.3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `depositos`
--

CREATE TABLE `depositos` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `qtd_total` int(11) NOT NULL,
  `peso_total` float NOT NULL,
  `data_deposito` date NOT NULL,
  `codigo_deposito` int(11) NOT NULL,
  `situacao` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `depositos`
--

INSERT INTO `depositos` (`id`, `id_user`, `qtd_total`, `peso_total`, `data_deposito`, `codigo_deposito`, `situacao`) VALUES
(10, 0, 13, 3.3, '0000-00-00', 24101989, 'Aguardando Depósito'),
(11, 0, 10, 1, '0000-00-00', 24101927, 'Aguardando Depósito'),
(12, 0, 0, 0, '0000-00-00', 24101988, 'Aguardando Depósito'),
(13, 19, 0, 0, '0000-00-00', 24101917, 'Deposito realizado'),
(14, 19, 13, 1.9, '0000-00-00', 24101955, 'Aguardando Depósito'),
(15, 19, 0, 0, '0000-00-00', 24101988, 'Aguardando Depósito'),
(16, 20, 5, 0.9, '0000-00-00', 25102095, 'Aguardando Depósito'),
(17, 20, 0, 0, '0000-00-00', 25102033, 'Aguardando Depósito'),
(18, 20, 0, 0, '0000-00-00', 25102026, 'Aguardando Depósito'),
(19, 20, 0, 0, '0000-00-00', 25102012, 'Aguardando Depósito'),
(20, 20, 0, 0, '0000-00-00', 25102052, 'Aguardando Depósito'),
(21, 20, 0, 0, '0000-00-00', 25102042, 'Aguardando Depósito'),
(22, 20, 0, 0, '0000-00-00', 25102014, 'Aguardando Depósito'),
(23, 20, 0, 0, '0000-00-00', 25102064, 'Aguardando Depósito'),
(24, 20, 0, 0, '0000-00-00', 25102044, 'Aguardando Depósito'),
(25, 20, 1, 0.3, '0000-00-00', 25102036, 'Aguardando Depósito'),
(26, 20, 210, 21, '0000-00-00', 25102032, 'Aguardando Depósito'),
(27, 20, 0, 0, '0000-00-00', 25102015, 'Aguardando Depósito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` char(2) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `cpf`, `cidade`, `estado`, `senha`, `avatar`, `is_admin`) VALUES
(1, 'David Balk Clipel', 'davidalfagame@gmail.com', '053.868.272-86', 'espigao do oeste', 'ro', '12345678', '1665883415meuperfil.jpg', 1),
(16, 'david', 'davidclipel00@gmail.com', '053.8342332', 'espigao do oeste', 'ro', '$2y$10$lPJfbj3DTb0kYEZXrB7sdemCw3HH0Bv35aBV2BNZYgMTS7RY0nGPS', 'icon-perfil.png', 1),
(17, 'David Balk Clipel', 'davidalfagame@gmail.c', '433443433', 'espigao do oeste', 'ro', '12345678', 'icon-perfil.png', 1),
(18, 'Karine', 'karineclipel@gmail.com', '213232344355', 'espigao do oeste', 'ro', '$2y$10$T2JiuvqZ8q0qBeViUc0gN.A.2uA/N1lydA9dO5hG3ZWA7nbQ8wboq', 'icon-perfil.png', 1),
(20, 'David Balk Clipel', 'davidclipel001@gmail.com', '05386827286', 'espigao', 'ro', '$2y$10$OqhOgU2ZSZJpTERskBen4.HoQRpMJ02pJ.QBCxTqssaHzhIsMOpMS', '1666653697steven.png', 1),
(22, '2332e23e', 'dlipel001@gmail.com', '1234234', 'wedqwdw', 'wd', '$2y$10$FzSFyXupgtGm2sXXtP0E.efwZjATadpKm9P0yWLzpMXGkiY1vvD3i', 'icon-perfil.png', 0),
(23, '32e23e', 'daclipel001@gmail.com', '312312', 'espigao', 'wd', '$2y$10$FsvvbmtvqH8.8HDhJE9vTeyfdJnhx.7l5Q2t6aFsTvriqw8b2NxeW', 'icon-perfil.png', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `classe_material`
--
ALTER TABLE `classe_material`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `depositos`
--
ALTER TABLE `depositos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `classe_material`
--
ALTER TABLE `classe_material`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `depositos`
--
ALTER TABLE `depositos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
