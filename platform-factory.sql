-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 09/10/2020 às 17:11
-- Versão do servidor: 8.0.21-0ubuntu0.20.04.4
-- Versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `platform-factory`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Administrador', 'admin@platformfactory.co.uk', '6d4e0be30a4930cc23fbb47564e34119', '2020-10-09 05:43:36');

-- --------------------------------------------------------

--
-- Estrutura para tabela `book_call`
--

CREATE TABLE `book_call` (
  `id` int NOT NULL,
  `service` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `client_name` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `client_email` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `client_phone` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `book_call`
--

INSERT INTO `book_call` (`id`, `service`, `description`, `client_name`, `client_email`, `client_phone`, `created_at`) VALUES
(1, 'Develop a website or App', 'Fist test', 'Lucas da Silva Morais', 'Lucas da Silva Morais', '33988169097', '2020-09-29 18:08:16'),
(2, 'Develop a website or App', 'Test', 'Lucas', 'Lucas', '33988169097', '2020-09-29 20:35:07'),
(3, 'Develop a website or App', 'Jhjjbj teste', 'Graciane Augusto Martins', 'Graciane Augusto Martins', '21959037919', '2020-09-30 09:24:57');

-- --------------------------------------------------------

--
-- Estrutura para tabela `projects`
--

CREATE TABLE `projects` (
  `id` int NOT NULL,
  `name` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `descr` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `technologies` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `logo` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `projects`
--

INSERT INTO `projects` (`id`, `name`, `descr`, `technologies`, `logo`) VALUES
(1, 'Prato Fit', 'Descrição do aplicativo', 'React JS, React Native, Node.JS', 'capa-prato-fit.png'),
(2, 'Horista', 'Descrição do app horista', 'PHP, MySql', 'capa-horista.png'),
(3, 'Idiomaster', 'Descrição do app idiomaster', 'React Native, Node.JS, Mongodb', '049772afef4d79a51722f797fb9a9a10.png'),
(4, 'Busco Sócio', 'Descrição do app busco socio', 'ReactJS, React Native, Node.JS, Mongodb, Firebase', 'capa-busco-socio.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `projects_photos`
--

CREATE TABLE `projects_photos` (
  `id` int NOT NULL,
  `project_id` int NOT NULL,
  `photo` varchar(250) NOT NULL,
  `descr` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `projects_photos`
--

INSERT INTO `projects_photos` (`id`, `project_id`, `photo`, `descr`) VALUES
(1, 1, 'tela-1 prato fit.png', 'Imagem 1'),
(2, 1, 'tela-2 prato fit.png', 'Imagem 2'),
(3, 1, 'tela-3 prato fit.png', 'Tela 3'),
(4, 2, 'tela-1 horista.jpg', ''),
(5, 2, 'tela-2 horista.jpg', ''),
(6, 2, 'tela-3 horista.jpg', ''),
(7, 3, 'login-idiomaster.png', ''),
(8, 3, 'idiomaster 1.png', ''),
(9, 3, 'idiomaster 2.png', ''),
(10, 4, 'tela-1-busco-socio.jpg', ''),
(11, 4, 'tela-2-busco-socio.jpg', ''),
(12, 4, 'tela-3-busco-socio.jpg', ''),
(13, 5, '94bade31dd34cd38624becfef6bbfcd5.png', NULL),
(14, 6, '9f39f2b34d21a758bb4448cf88e010e1.png', NULL),
(15, 6, '527feeabe6b7a97d4c1a20ccecc4d68f.png', NULL);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `book_call`
--
ALTER TABLE `book_call`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `projects_photos`
--
ALTER TABLE `projects_photos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `book_call`
--
ALTER TABLE `book_call`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `projects_photos`
--
ALTER TABLE `projects_photos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
