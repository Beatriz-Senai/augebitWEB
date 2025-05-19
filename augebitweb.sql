-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/05/2025 às 21:01
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
-- Banco de dados: `augebitweb`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `baixoestoque`
--

CREATE TABLE `baixoestoque` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `fornecedor` varchar(255) NOT NULL,
  `quantidade` int(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` int(25) NOT NULL,
  `projeto` varchar(255) NOT NULL,
  `total` int(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `contaspagar`
--

CREATE TABLE `contaspagar` (
  `id` int(11) NOT NULL,
  `lancamento` varchar(255) NOT NULL,
  `pagamento` varchar(255) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `valor` decimal(65,0) NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `vencimento` date NOT NULL,
  `parcelas` int(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `contaspagarvencidas`
--

CREATE TABLE `contaspagarvencidas` (
  `id` int(11) NOT NULL,
  `banco` varchar(255) NOT NULL,
  `destinatario` varchar(255) NOT NULL,
  `valor` int(65) NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `dataVencimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `contasreceber`
--

CREATE TABLE `contasreceber` (
  `id` int(11) NOT NULL,
  `lancamento` varchar(255) NOT NULL,
  `pagamento` varchar(255) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `valor` decimal(65,0) NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `vencimento` date NOT NULL,
  `parcelas` int(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `contasrecebervencidas`
--

CREATE TABLE `contasrecebervencidas` (
  `id` int(11) NOT NULL,
  `banco` varchar(255) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `valor` int(65) NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `vencimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `telefone` int(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `produtos` text NOT NULL,
  `total` int(65) NOT NULL,
  `conta` varchar(255) NOT NULL,
  `cnpj` int(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `lucrototal`
--

CREATE TABLE `lucrototal` (
  `id` int(11) NOT NULL,
  `investimento` decimal(65,0) NOT NULL,
  `receita` decimal(65,0) NOT NULL,
  `lucro` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `preco` decimal(65,0) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `fornecedor` varchar(255) NOT NULL,
  `garantia` varchar(255) NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `projetos`
--

CREATE TABLE `projetos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `fornecedor` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `funcao` varchar(255) NOT NULL,
  `resumo` text NOT NULL,
  `prazo` date NOT NULL,
  `progresso` int(11) NOT NULL,
  `produto` int(65) NOT NULL,
  `quantidade` int(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nomeCompleto` varchar(255) NOT NULL,
  `nomeUsuario` varchar(255) NOT NULL,
  `dataNascimento` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `projeto` varchar(255) NOT NULL,
  `cpf` int(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendaseretorno`
--

CREATE TABLE `vendaseretorno` (
  `id` int(11) NOT NULL,
  `produto` varchar(255) NOT NULL,
  `vendas` int(65) NOT NULL,
  `investimento` decimal(65,0) NOT NULL,
  `valor` decimal(65,0) NOT NULL,
  `retorno` decimal(65,0) NOT NULL,
  `lucro` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `baixoestoque`
--
ALTER TABLE `baixoestoque`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `contaspagar`
--
ALTER TABLE `contaspagar`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `contaspagarvencidas`
--
ALTER TABLE `contaspagarvencidas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `contasreceber`
--
ALTER TABLE `contasreceber`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `contasrecebervencidas`
--
ALTER TABLE `contasrecebervencidas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `lucrototal`
--
ALTER TABLE `lucrototal`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `vendaseretorno`
--
ALTER TABLE `vendaseretorno`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `baixoestoque`
--
ALTER TABLE `baixoestoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contaspagar`
--
ALTER TABLE `contaspagar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contaspagarvencidas`
--
ALTER TABLE `contaspagarvencidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contasreceber`
--
ALTER TABLE `contasreceber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contasrecebervencidas`
--
ALTER TABLE `contasrecebervencidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `lucrototal`
--
ALTER TABLE `lucrototal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vendaseretorno`
--
ALTER TABLE `vendaseretorno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
