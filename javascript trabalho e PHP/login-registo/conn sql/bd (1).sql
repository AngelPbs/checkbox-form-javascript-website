-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 31-Jul-2023 às 19:52
-- Versão do servidor: 5.7.24
-- versão do PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE `administradores` (
  `id` int(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `administradores`
--

INSERT INTO `administradores` (`id`, `email`, `senha`, `role`) VALUES
(1, 'admin@admin.com', '123', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(120) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `sexo` varchar(15) NOT NULL,
  `datan` date NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `admins`
--

INSERT INTO `admins` (`id`, `nome`, `senha`, `email`, `telefone`, `sexo`, `datan`, `cidade`, `estado`, `endereco`) VALUES
(1, 'Exemplo', 'senha123', 'exemplo@example.com', '123456789', 'Masculino', '1990-07-26', 'Exemploville', 'Exemplostate', 'Rua Exemplo, 123'),
(1, 'admin', 'admin', 'admin@admin.com', '123456789', 'Masculino', '1990-07-26', 'Exemploville', 'Exemplostate', 'Rua Exemplo, 123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

CREATE TABLE `noticia` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`id`, `titulo`, `conteudo`) VALUES
(1, 'Empresa Master D recebe reconhecimento', 'A Empresa Master D foi reconhecida por sua \r\nsignificativa contribuição à comunidade de desenvolvimento web. Através de iniciativas educacionais,\r\n eventos e compartilhamento de conhecimentos, a Empresa Master D tem desempenhado um papel vital no\r\n  avanço da indústria. O reconhecimento destaca o compromisso da empresa em capacitar outros profissionais e \r\n  promover o crescimento do setor como um todo.'),
(2, 'Empresa Master D recebe reconhecimento', 'A Empresa Master D foi reconhecida por sua \r\nsignificativa contribuição à comunidade de desenvolvimento web. Através de iniciativas educacionais,\r\n eventos e compartilhamento de conhecimentos, a Empresa Master D tem desempenhado um papel vital no\r\n  avanço da indústria. O reconhecimento destaca o compromisso da empresa em capacitar outros profissionais e \r\n  promover o crescimento do setor como um todo.'),
(3, 'Empresa Master D recebe reconhecimento', 'A Empresa Master D foi reconhecida por sua \r\nsignificativa contribuição à comunidade de desenvolvimento web. Através de iniciativas educacionais,\r\n eventos e compartilhamento de conhecimentos, a Empresa Master D tem desempenhado um papel vital no\r\n  avanço da indústria. O reconhecimento destaca o compromisso da empresa em capacitar outros profissionais e \r\n  promover o crescimento do setor como um todo.'),
(4, 'Empresa Master D recebe reconhecimento', 'A Empresa Master D foi reconhecida por sua \r\nsignificativa contribuição à comunidade de desenvolvimento web. Através de iniciativas educacionais,\r\n eventos e compartilhamento de conhecimentos, a Empresa Master D tem desempenhado um papel vital no\r\n  avanço da indústria. O reconhecimento destaca o compromisso da empresa em capacitar outros profissionais e \r\n  promover o crescimento do setor como um todo.'),
(5, 'Empresa Master D recebe reconhecimento', 'A Empresa Master D foi reconhecida por sua \r\nsignificativa contribuição à comunidade de desenvolvimento web. Através de iniciativas educacionais,\r\n eventos e compartilhamento de conhecimentos, a Empresa Master D tem desempenhado um papel vital no\r\n  avanço da indústria. O reconhecimento destaca o compromisso da empresa em capacitar outros profissionais e \r\n  promover o crescimento do setor como um todo.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projecto`
--

CREATE TABLE `projecto` (
  `id` int(11) NOT NULL,
  `email` varchar(110) NOT NULL,
  `pagina` varchar(60) NOT NULL,
  `mes` int(10) DEFAULT NULL,
  `valor` varchar(200) NOT NULL,
  `checks` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `projecto`
--

INSERT INTO `projecto` (`id`, `email`, `pagina`, `mes`, `valor`, `checks`) VALUES
(17, 'paulobruno_11@hotmail.com', 'Empresarial', 1, '665 Euros', 'Onde estamos'),
(18, 'paulobruno_11@hotmail.com', 'Educacional', 5, '1200 Euros', 'Quem somos, Onde estamos, Noticías'),
(19, 'dave@example.com', 'Empresarial', 0, '1900 Euros', 'Onde estamos, Gestão interna, Noticías, Redes Sociais'),
(20, 'dave@example.com', 'Educacional', 4, '1200 Euros', 'Quem somos, Onde estamos, eCommerce'),
(23, 'paulobruno_11@hotmail.com', 'Educacional', 12, '880 Euros', 'Onde estamos'),
(24, 'paulobruno_11@hotmail.com', 'Educacional', 12, '880 Euros', 'Onde estamos, Noticías'),
(26, 'teste@teste.com', 'Educacional', 10, '1520 Euros', 'Quem somos, Galeria de fotografias, Gestão interna, Redes Sociais'),
(27, 'teste@teste.com', 'Educacional', 5, '1200 Euros', 'Quem somos, Onde estamos, Galeria de fotografias'),
(28, 'david@david.com', 'Empresarial', 4, '1200 Euros', 'Onde estamos, Gestão interna, Noticías'),
(29, 'maria@maria.com', 'Educacional', 4, '880 Euros', 'Onde estamos, Noticías');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` int(15) NOT NULL,
  `genero` varchar(15) NOT NULL,
  `datan` date NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `senha`, `email`, `telefone`, `genero`, `datan`, `cidade`, `estado`, `endereco`, `role`) VALUES
(19, 'Paulo', '$2y$10$UkY0vDBFIgf75XNK4Yr4muLiQqbB4/Q.YUToOso/pY0BIIHm6.noi', 'paulobruno_11@hotmail.com', 938829667, 'outro', '2023-06-28', 'porto', '12', 'rua', 'cliente'),
(21, 'teste', '$2y$10$JpOOvAG4POzVH5J.gNdU/edSBE7UO7Lh5Wpw2tRsT27C.fonej8lu', 'teste@teste.com', 123456789, 'feminino', '2023-07-06', 'aveiro', 'aveiro', 'rua', 'cliente'),
(23, 'Maria', '$2y$10$DUv7HRg9HRMB0giyTHJW6emI0orH/aKJxNKJcAtQYW.u6UW/oQxAC', 'maria@maria.com', 123456789, 'feminino', '2023-06-28', 'coimbraa', 'coimbra', 'Rua de Coimbra', 'cliente');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `projecto`
--
ALTER TABLE `projecto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `projecto`
--
ALTER TABLE `projecto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
