-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 30-Maio-2023 às 12:18
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dblojamaior`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedido`
--

DROP TABLE IF EXISTS `tb_pedido`;
CREATE TABLE IF NOT EXISTS `tb_pedido` (
  `ID_PEDIDO` int NOT NULL AUTO_INCREMENT,
  `NOME_USUARIO` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `ENDERECO_USUARIO` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `FORMA_PGTO` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `CONDICAO_PGTO` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `VALOR_PARCELA` decimal(10,2) NOT NULL,
  `VALOR_PRODUTO` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID_PEDIDO`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tb_pedido`
--

INSERT INTO `tb_pedido` (`ID_PEDIDO`, `NOME_USUARIO`, `ENDERECO_USUARIO`, `FORMA_PGTO`, `CONDICAO_PGTO`, `VALOR_PARCELA`, `VALOR_PRODUTO`) VALUES
(1, 'Erick', 'Rua A', '8', 'Cartao', '150000.00', '1200000.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

DROP TABLE IF EXISTS `tb_produto`;
CREATE TABLE IF NOT EXISTS `tb_produto` (
  `ID_PRODUTO` int NOT NULL AUTO_INCREMENT,
  `FOTO_PRODUTO` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `VALOR_PRODUTO` decimal(10,2) NOT NULL,
  `ANO_PRODUTO` varchar(4) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `COMBUSTIVEL_PRODUTO` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `LUGARES_PRODUTO` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `PORTAS_PRODUTO` varchar(5) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `PRECEDENCIA_PRODUTO` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `VELMAX_PRODUTO` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `CAMBIO_PRODUTO` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `MARCHAS_PRODUTO` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `TRACAO_PRODUTO` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `CILINDRO_PRODUTO` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `POTENCIA_PRODUTO` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `TORQUE_PRODUTO` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `ACELERACAO_PRODUTO` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `FABRICANTE_PRODUTO` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `MODELO_PRODUTO` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `FICHATEC_PRODUTO` varchar(60) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_PRODUTO`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`ID_PRODUTO`, `FOTO_PRODUTO`, `VALOR_PRODUTO`, `ANO_PRODUTO`, `COMBUSTIVEL_PRODUTO`, `LUGARES_PRODUTO`, `PORTAS_PRODUTO`, `PRECEDENCIA_PRODUTO`, `VELMAX_PRODUTO`, `CAMBIO_PRODUTO`, `MARCHAS_PRODUTO`, `TRACAO_PRODUTO`, `CILINDRO_PRODUTO`, `POTENCIA_PRODUTO`, `TORQUE_PRODUTO`, `ACELERACAO_PRODUTO`, `FABRICANTE_PRODUTO`, `MODELO_PRODUTO`, `FICHATEC_PRODUTO`) VALUES
(1, 'img/dodge-viper-700.jpg', '1200000.00', '2017', 'Gasolina', '2', '2', 'Importado', '331 km/h', 'Manual', '6', 'Traseira', '10 em V', '654 cv', '83 kgfm', '3,5s', 'DODGE', 'VIPER', '8.4 SRT V10 GASOLINA 2P MANUAL'),
(3, 'img/ferrari812gts.jpg', '6800000.00', '2021', 'Gasolina', '2', '2', 'Importado', '340 km/h', 'Automático', '7', 'Traseira', '12 em V', '800 cv', '73,2 kgfm', '3s', 'FERRARI', '812 GTS', 'Ferrari 812 GTS 6.5 V12 AUTOMÁTICO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `ID_USUARIO` int NOT NULL AUTO_INCREMENT,
  `NOME_USUARIO` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `ENDERECO_USUARIO` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `EMAIL_USUARIO` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `SENHA_USUARIO` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  UNIQUE KEY `EMAIL_USUARIO` (`EMAIL_USUARIO`),
  UNIQUE KEY `UNIQUE_EMAIL_USUARIO` (`EMAIL_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
