-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 26-Abr-2023 às 00:47
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
-- Banco de dados: `audote`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adotante`
--

DROP TABLE IF EXISTS `adotante`;
CREATE TABLE IF NOT EXISTS `adotante` (
  `id_adot` int NOT NULL AUTO_INCREMENT,
  `id_usuario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `cpf` char(11) NOT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `posse_animal` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_adot`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `fk_adot_usuario` (`id_usuario`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pets`
--

DROP TABLE IF EXISTS `pets`;
CREATE TABLE IF NOT EXISTS `pets` (
  `id_pet` int NOT NULL AUTO_INCREMENT,
  `nomePet` varchar(255) DEFAULT NULL,
  `tipoAnimal` varchar(255) DEFAULT NULL,
  `raca` varchar(255) DEFAULT NULL,
  `idadePet` int DEFAULT NULL,
  `porte_animal` varchar(255) DEFAULT NULL,
  `sexo` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `vacina_vf` varchar(255) DEFAULT NULL,
  `imagemPet` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`id_pet`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `sobrenome` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
