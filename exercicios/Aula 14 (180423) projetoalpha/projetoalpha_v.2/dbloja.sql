-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02-Maio-2023 às 20:41
-- Versão do servidor: 8.0.27
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbloja`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedido`
--

DROP TABLE IF EXISTS `tb_pedido`;
CREATE TABLE IF NOT EXISTS `tb_pedido` (
  `ID_PEDIDO` int NOT NULL AUTO_INCREMENT,
  `NOME` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ENDERECO` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `FORMA_PGTO` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `CONDICAO_PGTO` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `VALOR_PARCELA` decimal(10,2) NOT NULL,
  `VALOR_PEDIDO` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID_PEDIDO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

DROP TABLE IF EXISTS `tb_produto`;
CREATE TABLE IF NOT EXISTS `tb_produto` (
  `ID_PRODUTO` int NOT NULL AUTO_INCREMENT,
  `FOTO_PRODUTO` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `VALOR_PRODUTO` decimal(10,2) NOT NULL,
  `DESCRICAO_PRODUTO` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_PRODUTO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `ID_USUARIO` int NOT NULL AUTO_INCREMENT,
  `NOME_USUARIO` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ENDERECO_USUARIO` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL_USUARIO` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SENHA_USUARIO` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  UNIQUE KEY `EMAIL_USUARIO` (`EMAIL_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
