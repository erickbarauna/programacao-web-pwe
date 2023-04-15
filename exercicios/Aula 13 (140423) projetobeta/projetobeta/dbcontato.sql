-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 14-Abr-2023 às 18:13
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_faleconosco`
--

INSERT INTO `tb_faleconosco` (`ID_CONTATO`, `NOME_CONTATO`, `FONE_CONTATO`, `EMAIL_CONTATO`, `ASSUNTO_CONTATO`, `MSG_CONTATO`, `RESP_CONTATO`) VALUES
(8, 'Erick Silva Barauna', '(11) 96209-3586', 'ericksbarauna26@gmail.com', 'Elogios', 'Finalmente! \r\n\r\nMeu primeiro formulário usando banco de dados!', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
