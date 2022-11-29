-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql302.byetcluster.com
-- Tempo de geração: 14/01/2021 às 20:00
-- Versão do servidor: 5.6.48-88.0
-- Versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `epiz_24270146_dbredacao`
--

create database 'minha_redacao'
use 'minha_redacao'

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nome_admin` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_admin` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `senha_admin` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_admin` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_lithuanian_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_turma` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `senha` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `codigo_usuario` int(11) DEFAULT NULL,
  `codigo_mensagem` int(11) DEFAULT NULL,
  `email_usuario` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_comentario` datetime DEFAULT NULL,
  `tipo_usuario` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentario` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `competencia`
--

CREATE TABLE `competencia` (
  `id` int(11) NOT NULL,
  `codigo_redacao` int(11) DEFAULT NULL,
  `codigo_tema` int(11) DEFAULT NULL,
  `comp1` int(11) DEFAULT NULL,
  `comp2` int(11) DEFAULT NULL,
  `comp3` int(11) DEFAULT NULL,
  `comp4` int(11) DEFAULT NULL,
  `comp5` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `nome_contato` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_contato` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mensagem_contato` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



-- --------------------------------------------------------

--
-- Estrutura para tabela `correcao`
--

CREATE TABLE `correcao` (
  `id` int(11) NOT NULL,
  `codigo_tema` int(11) DEFAULT NULL,
  `codigo_aluno` int(11) DEFAULT NULL,
  `codigo_turma` int(11) DEFAULT NULL,
  `codigo_redacao` int(11) DEFAULT NULL,
  `email_aluno` varchar(34) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correcao` longtext COLLATE utf8mb4_unicode_ci,
  `nota` int(11) DEFAULT NULL,
  `data_envio` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



-- --------------------------------------------------------

--
-- Estrutura para tabela `feedback_redacao`
--

CREATE TABLE `feedback_redacao` (
  `id` int(11) NOT NULL,
  `codigo_redacao` int(11) DEFAULT NULL,
  `codigo_tema` int(11) DEFAULT NULL,
  `codigo_usuario` int(11) DEFAULT NULL,
  `nome_usuario` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_usuario` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_usuario` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_comentario` datetime DEFAULT NULL,
  `comentario` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `inicio` (
  `id` int(11) NOT NULL,
  `codigo_tema` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ler`
--

CREATE TABLE `ler` (
  `codigo_mensagem` int(11) DEFAULT NULL,
  `codigo_usuario` int(11) DEFAULT NULL,
  `para` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id` int(11) NOT NULL,
  `email_usuario` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `id` int(11) NOT NULL,
  `remetente` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mensagem` longtext COLLATE utf8mb4_unicode_ci,
  `imagem` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_envio` datetime DEFAULT NULL,
  `destinatario` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_turma` int(100) DEFAULT NULL,
  `tipo` varchar(34) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentar` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resposta` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `rank`
--

CREATE TABLE `rank` (
  `id` int(11) NOT NULL,
  `codigo_tema` varchar(34) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_turma` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `rascunho`
--

CREATE TABLE `rascunho` (
  `id` int(11) NOT NULL,
  `codigo_tema` int(11) DEFAULT NULL,
  `codigo_aluno` int(11) DEFAULT NULL,
  `codigo_turma` int(100) DEFAULT NULL,
  `tema_redacao` longtext COLLATE utf8mb4_unicode_ci,
  `email_aluno` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rascunho` longtext COLLATE utf8mb4_unicode_ci,
  `data_modificacao` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- --------------------------------------------------------

--
-- Estrutura para tabela `recuperacao`
--

CREATE TABLE `recuperacao` (
  `utilizador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmacao` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `redacao`
--

CREATE TABLE `redacao` (
  `id` int(11) NOT NULL,
  `codigo_tema` int(11) DEFAULT NULL,
  `codigo_aluno` int(11) DEFAULT NULL,
  `codigo_turma` int(11) DEFAULT NULL,
  `tema` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome_aluno` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_aluno` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_aluno` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redacao` longtext COLLATE utf8mb4_unicode_ci,
  `data_envio` datetime DEFAULT NULL,
  `correcao` longtext COLLATE utf8mb4_unicode_ci,
  `nota` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `sugestao`
--

CREATE TABLE `sugestao` (
  `id` int(11) NOT NULL,
  `codigo_aluno` int(11) DEFAULT NULL,
  `nome_contato` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_contato` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `escola_contato` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_contato` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mensagem` longtext COLLATE utf8mb4_unicode_ci,
  `data_envio` datetime DEFAULT NULL,
  `tipo` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- --------------------------------------------------------

--
-- Estrutura para tabela `temas_redacao`
--

CREATE TABLE `temas_redacao` (
  `id` int(11) NOT NULL,
  `nome_tema` longtext COLLATE utf8mb4_unicode_ci,
  `codigo_professor` int(90) DEFAULT NULL,
  `codigo_turma` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_envio` datetime DEFAULT NULL,
  `vencimento` date DEFAULT NULL,
  `maximo_redacao` int(11) DEFAULT NULL,
  `texto_motivacional` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- --------------------------------------------------------

--
-- Estrutura para tabela `texto_motivacional`
--

CREATE TABLE `texto_motivacional` (
  `id` int(11) NOT NULL,
  `codigo_tema` int(11) DEFAULT NULL,
  `texto1` longtext COLLATE utf8mb4_unicode_ci,
  `imagem_texto1` longtext COLLATE utf8mb4_unicode_ci,
  `tipo1` int(11) DEFAULT NULL,
  `texto2` longtext COLLATE utf8mb4_unicode_ci,
  `imagem_texto2` longtext COLLATE utf8mb4_unicode_ci,
  `tipo2` int(11) DEFAULT NULL,
  `texto3` longtext COLLATE utf8mb4_unicode_ci,
  `imagem_texto3` longtext COLLATE utf8mb4_unicode_ci,
  `tipo3` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
--

CREATE TABLE `turma` (
  `id` int(11) NOT NULL,
  `nome_turma` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `escola_turma` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_professor` int(11) DEFAULT NULL,
  `codigo_acesso` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descricao` longtext COLLATE utf8mb4_unicode_ci,
  `data_criacao` date DEFAULT NULL,
  `simbolo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `turmas_selecionadas`
--

CREATE TABLE `turmas_selecionadas` (
  `id` int(11) NOT NULL,
  `codigo_tema` int(11) NOT NULL,
  `codigo_turma` int(11) NOT NULL,
  `codigo_professor` int(11) DEFAULT NULL,
  `situacao` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `turmas_selecionadas`
--
-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(34) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `senha` varchar(34) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` varchar(34) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `situacao` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `competencia`
--
ALTER TABLE `competencia`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `correcao`
--
ALTER TABLE `correcao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `feedback_redacao`
--
ALTER TABLE `feedback_redacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `inicio`
--
ALTER TABLE `inicio`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `ler`
--
ALTER TABLE `ler`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `rascunho`
--
ALTER TABLE `rascunho`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `redacao`
--
ALTER TABLE `redacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sugestao`
--
ALTER TABLE `sugestao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `temas_redacao`
--
ALTER TABLE `temas_redacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `texto_motivacional`
--
ALTER TABLE `texto_motivacional`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `turmas_selecionadas`
--
ALTER TABLE `turmas_selecionadas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=948;

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `competencia`
--
ALTER TABLE `competencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=711;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `correcao`
--
ALTER TABLE `correcao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=801;

--
-- AUTO_INCREMENT de tabela `feedback_redacao`
--
ALTER TABLE `feedback_redacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=652;

--
-- AUTO_INCREMENT de tabela `inicio`
--
ALTER TABLE `inicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ler`
--
ALTER TABLE `ler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=475;

--
-- AUTO_INCREMENT de tabela `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `rank`
--
ALTER TABLE `rank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `rascunho`
--
ALTER TABLE `rascunho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de tabela `redacao`
--
ALTER TABLE `redacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=930;

--
-- AUTO_INCREMENT de tabela `sugestao`
--
ALTER TABLE `sugestao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `temas_redacao`
--
ALTER TABLE `temas_redacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de tabela `texto_motivacional`
--
ALTER TABLE `texto_motivacional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de tabela `turmas_selecionadas`
--
ALTER TABLE `turmas_selecionadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
