-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 20/08/2018 às 22:34
-- Versão do servidor: 10.2.16-MariaDB
-- Versão do PHP: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u225746644_eb`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(10) NOT NULL,
  `nome_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nome_categoria`) VALUES
(4, 'Artigos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `niveis_acessos`
--

CREATE TABLE `niveis_acessos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pdf`
--

CREATE TABLE `pdf` (
  `id_pdf` int(10) NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descricao` mediumtext DEFAULT NULL,
  `autor` varchar(150) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tamanho` int(10) UNSIGNED DEFAULT NULL,
  `tipo` varchar(150) DEFAULT NULL,
  `nome_arquivo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(520) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `situacoe_id` int(11) NOT NULL DEFAULT 0,
  `niveis_acesso_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `situacoe_id`, `niveis_acesso_id`, `created`, `modified`) VALUES
(1, 'Robert', 'arleyrobert@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1, '2018-06-12 10:45:00', NULL),
(2, 'UfraBSI', 'ufra@ufra.com', '827ccb0eea8a706c4c34a16891f84e7b', 3, 3, '2018-06-12 15:59:00', '2018-06-24 20:23:19'),
(6, 'romulo', 'romulobsousa@gmail.com', '', 0, 0, '2018-08-12 19:57:14', NULL),
(7, 'Evelyn', 'vickpeniche@hotmail.com', '', 0, 0, '2018-08-12 19:57:45', NULL),
(8, 'Bruno', 'bruno@gmail.com', '', 0, 0, '2018-08-12 19:58:07', NULL),
(9, 'Renato', 'renato@gmail.com', '', 0, 0, '2018-08-12 19:58:32', NULL),
(10, 'Arley', 'arley@gmail.com', '', 0, 0, '2018-08-12 19:59:07', NULL),
(11, 'Ohashi', 'ohashi@ufra.com.br', '', 0, 0, '2018-08-12 19:59:21', NULL),
(12, 'abc', 'abc@gmail.com', '', 0, 0, '2018-08-12 20:00:30', NULL),
(13, 'Martin Silva', 'martin@gmail.com', '', 0, 0, '2018-08-12 20:01:05', NULL),
(14, 'Leandro Castan', 'leandro@gmail.com', '', 0, 0, '2018-08-12 20:01:33', NULL),
(15, 'Maxi Lopez', 'maxi@gmail.com', '', 0, 0, '2018-08-12 20:03:33', NULL);

--
-- Gatilhos `usuarios`
--
DELIMITER $$
CREATE TRIGGER `before_usuario_update` BEFORE UPDATE ON `usuarios` FOR EACH ROW BEGIN
 
    INSERT INTO usuarios_audit
    SET action = 'update',
        usuario_id = OLD.id,
        old_nome = OLD.nome,
		new_nome = NEW.nome,
        changedon = NOW(); 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_usuario` AFTER DELETE ON `usuarios` FOR EACH ROW BEGIN
 
    INSERT INTO usuarios_audit
    SET action = 'delete',
    usuario_id = old.id,
    old_nome = old.nome,
    changedon = NOW();
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios_audit`
--

CREATE TABLE `usuarios_audit` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `old_nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `new_nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `changedon` datetime DEFAULT NULL,
  `action` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `usuarios_audit`
--

INSERT INTO `usuarios_audit` (`id`, `usuario_id`, `old_nome`, `new_nome`, `changedon`, `action`) VALUES
(1, 3, 'Elaine', 'Elaine', '2018-08-05 01:56:49', 'update'),
(2, 5, 'arley', 'arleyrobert', '2018-08-06 21:56:35', 'update'),
(3, 5, 'arleyrobert', 'Allan', '2018-08-06 23:32:20', 'update'),
(4, 5, 'Allan', '', '2018-08-06 23:32:30', 'delete'),
(5, 4, 'Elaine', '', '2018-08-06 23:33:13', 'delete'),
(6, 3, 'Elaine', '', '2018-08-06 23:33:18', 'delete');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `niveis_acessos`
--
ALTER TABLE `niveis_acessos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`id_pdf`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios_audit`
--
ALTER TABLE `usuarios_audit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `niveis_acessos`
--
ALTER TABLE `niveis_acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pdf`
--
ALTER TABLE `pdf`
  MODIFY `id_pdf` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuarios_audit`
--
ALTER TABLE `usuarios_audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
