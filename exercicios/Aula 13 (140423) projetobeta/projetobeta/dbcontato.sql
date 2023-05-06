-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 05-Maio-2023 às 16:40
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbcontato`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cadastro_adm`
--

DROP TABLE IF EXISTS `tb_cadastro_adm`;
CREATE TABLE IF NOT EXISTS `tb_cadastro_adm` (
  `ID_ADM` int(11) NOT NULL AUTO_INCREMENT,
  `NOME_ADM` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL_ADM` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SENHA_ADM` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_ADM`),
  UNIQUE KEY `EMAIL_ADM` (`EMAIL_ADM`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_cadastro_adm`
--

INSERT INTO `tb_cadastro_adm` (`ID_ADM`, `NOME_ADM`, `EMAIL_ADM`, `SENHA_ADM`) VALUES
(1, 'Cleiton Patricio', 'cleiton.patricio@etec.sp.gov.br', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_faleconosco`
--

DROP TABLE IF EXISTS `tb_faleconosco`;
CREATE TABLE IF NOT EXISTS `tb_faleconosco` (
  `ID_CONTATO` int(11) NOT NULL AUTO_INCREMENT,
  `NOME_CONTATO` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `FONE_CONTATO` char(17) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL_CONTATO` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `ASSUNTO_CONTATO` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `MSG_CONTATO` text COLLATE utf8_unicode_ci NOT NULL,
  `RESP_CONTATO` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`ID_CONTATO`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_faleconosco`
--

INSERT INTO `tb_faleconosco` (`ID_CONTATO`, `NOME_CONTATO`, `FONE_CONTATO`, `EMAIL_CONTATO`, `ASSUNTO_CONTATO`, `MSG_CONTATO`, `RESP_CONTATO`) VALUES
(1, 'Cleiton Fabiano Patricio', '(11) 99999-9999', 'cleiton_fsa_bsi@yahoo.com.br', 'Duvidas', 'Teste Contato', NULL),
(2, 'Jean Coelho Neves', '(11) 8-8888-9999', 'jeancoelhoneves8@gmail.com', 'Elogios', 'Muito Legal', NULL),
(3, 'Gustavo Alves de Sousa Carvalho', '(11) 8-7777-8888', 'beadragon20@gmail.com', 'Elogios', 'Demais', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
