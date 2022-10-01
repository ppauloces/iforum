-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Set-2022 às 17:01
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iforum`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id_aluno` int(11) NOT NULL,
  `nome_aluno` varchar(50) NOT NULL,
  `email_aluno` varchar(50) NOT NULL,
  `name_user_aluno` varchar(15) NOT NULL,
  `foto_perfil` varchar(255) NOT NULL,
  `bio_aluno` varchar(255) NOT NULL,
  `num_matricula_aluno` varchar(50) NOT NULL,
  `senha_aluno` varchar(50) NOT NULL,
  `campus_aluno` varchar(150) NOT NULL,
  `data_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `nome_aluno`, `email_aluno`, `name_user_aluno`, `foto_perfil`, `bio_aluno`, `num_matricula_aluno`, `senha_aluno`, `campus_aluno`, `data_cadastro`) VALUES
(31, 'Thiago', 'thiago@gmail.com', 'thiago', '', '', '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'CAMPUS Teresina I', '0000-00-00 00:00:00'),
(32, 'Paulo Amaral', 'ppauloces27@gmail.com', 'ppauloces', '835fe9e259cb0fd3b698e3091bfaefb3.png', '', '123', '202cb962ac59075b964b07152d234b70', 'CAMPUS Eunápolis', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `amizade`
--

CREATE TABLE `amizade` (
  `id_amzd` int(11) NOT NULL,
  `id_aluno_de` int(11) NOT NULL,
  `id_aluno_para` int(11) NOT NULL,
  `status_amizade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `nome` varchar(75) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Unidades Federativas';

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`id`, `nome`, `uf`) VALUES
(1, 'Acre', 'AC'),
(2, 'Alagoas', 'AL'),
(3, 'Amazonas', 'AM'),
(4, 'Amapá', 'AP'),
(5, 'Bahia', 'BA'),
(6, 'Ceará', 'CE'),
(7, 'Distrito Federal', 'DF'),
(8, 'Espírito Santo', 'ES'),
(9, 'Goiás', 'GO'),
(10, 'Maranhão', 'MA'),
(11, 'Minas Gerais', 'MG'),
(12, 'Mato Grosso do Sul', 'MS'),
(13, 'Mato Grosso', 'MT'),
(14, 'Pará', 'PA'),
(15, 'Paraíba', 'PB'),
(16, 'Pernambuco', 'PE'),
(17, 'Piauí', 'PI'),
(18, 'Paraná', 'PR'),
(19, 'Rio de Janeiro', 'RJ'),
(20, 'Rio Grande do Norte', 'RN'),
(21, 'Rondônia', 'RO'),
(22, 'Roraima', 'RR'),
(23, 'Rio Grande do Sul', 'RS'),
(24, 'Santa Catarina', 'SC'),
(25, 'Sergipe', 'SE'),
(26, 'São Paulo', 'SP'),
(27, 'Tocantins', 'TO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `institutos`
--

CREATE TABLE `institutos` (
  `id_instituto` int(11) NOT NULL,
  `nome_instituto` varchar(55) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `institutos`
--

INSERT INTO `institutos` (`id_instituto`, `nome_instituto`, `id_estado`) VALUES
(1, 'CAMPUS Rio Branco', 1),
(2, 'CAMPUS Cruzeiro do Sul', 1),
(3, 'CAMPUS Sena Madureira', 1),
(4, 'CAMPUS Maceió', 2),
(5, 'CAMPUS Satuba', 2),
(6, 'CAMPUS Palmeira dos Índios', 2),
(7, 'CAMPUS Marechal Deodoro', 2),
(8, 'CAMPUS Penedo', 2),
(9, 'CAMPUS Piranhas', 2),
(10, 'CAMPUS Arapiraca', 2),
(11, 'CAMPUS Maragogi', 2),
(12, 'CAMPUS Macapá', 4),
(13, 'CAMPUS Laranjal do Jari', 4),
(14, 'CAMPUS Manaus Centro', 3),
(15, 'CAMPUS Manaus Distrito Industrial', 3),
(16, 'CAMPUS Coari', 3),
(17, 'CAMPUS São Gabriel da Cachoeira', 3),
(18, 'CAMPUS Agrotécnico de Manaus', 3),
(19, 'CAMPUS Presidente Figueiredo', 3),
(20, 'CAMPUS Lábrea', 3),
(21, 'CAMPUS Maués', 3),
(22, 'CAMPUS Tabatinga', 3),
(23, 'CAMPUS Parintins', 3),
(24, 'CAMPUS Guanambi', 5),
(25, 'CAMPUS Catu', 5),
(26, 'CAMPUS Santa Inês', 5),
(27, 'CAMPUS Senhor do Bonfim', 5),
(28, 'CAMPUS Itapetinga', 5),
(29, 'CAMPUS Teixeira de Freitas', 5),
(30, 'CAMPUS Uruçuca', 5),
(31, 'CAMPUS Valença', 5),
(32, 'CAMPUS Bom Jesus da Lapa', 5),
(33, 'CAMPUS Jequié', 5),
(34, 'CAMPUS Salvador', 5),
(35, 'CAMPUS Valença', 5),
(36, 'CAMPUS Barreiras', 5),
(37, 'CAMPUS Vitória da Conquista', 5),
(38, 'CAMPUS Eunápolis', 5),
(39, 'CAMPUS Santo Amaro', 5),
(40, 'CAMPUS Simões Filho', 5),
(41, 'CAMPUS Porto Seguro', 5),
(42, 'CAMPUS Camaçari', 5),
(43, 'CAMPUS Feira de Santana', 5),
(44, 'CAMPUS Irecê', 5),
(45, 'CAMPUS Ilhéus', 5),
(46, 'CAMPUS Jacobina', 5),
(47, 'CAMPUS Paulo Afonso', 5),
(48, 'CAMPUS Seabra', 5),
(49, 'CAMPUS Fortaleza', 6),
(50, 'CAMPUS Cedro', 6),
(51, 'CAMPUS Juazeiro do Norte', 6),
(52, 'CAMPUS Maracanaú', 6),
(53, 'CAMPUS Crato', 6),
(54, 'CAMPUS Iguatu', 6),
(55, 'CAMPUS Acaraú', 6),
(56, 'CAMPUS Canindé', 6),
(57, 'CAMPUS Crateús', 6),
(58, 'CAMPUS Limoeiro do Norte', 6),
(59, 'CAMPUS Quixadá', 6),
(60, 'CAMPUS Sobral', 6),
(61, 'CAMPUS Brasília', 7),
(62, 'CAMPUS Gama', 7),
(63, 'CAMPUS Samambaia', 7),
(64, 'CAMPUS Planaltina', 7),
(65, 'CAMPUS Taguatinga', 7),
(66, 'CAMPUS Vitória', 8),
(67, 'CAMPUS Alegre', 8),
(68, 'CAMPUS Cariacica', 8),
(69, 'CAMPUS Cachoeiro de Itapemirim', 8),
(70, 'CAMPUS Colatina I', 8),
(71, 'CAMPUS Colatina II', 8),
(72, 'CAMPUS Santa Teresa', 8),
(73, 'CAMPUS São Mateus', 8),
(74, 'CAMPUS Serra', 8),
(75, 'CAMPUS Aracruz', 8),
(76, 'CAMPUS Ibatiba', 8),
(77, 'CAMPUS Linhares', 8),
(78, 'CAMPUS Nova Venécia', 8),
(79, 'CAMPUS Vila Velha', 8),
(80, 'CAMPUS Goiânia', 9),
(81, 'CAMPUS Jataí', 9),
(82, 'CAMPUS Inhumas', 9),
(83, 'CAMPUS Uruaçu', 9),
(84, 'CAMPUS Itumbiara', 9),
(85, 'CAMPUS Luziânia', 9),
(86, 'CAMPUS Formosa', 9),
(87, 'CAMPUS Anápolis', 9),
(88, 'CAMPUS Ceres', 9),
(89, 'CAMPUS Iporá', 9),
(90, 'CAMPUS Rio Verde', 9),
(91, 'CAMPUS Morrinhos', 9),
(92, 'CAMPUS Urutaí', 9),
(93, 'CAMPUS Monte Castelo', 10),
(94, 'CAMPUS Maracanã', 10),
(95, 'CAMPUS Codó', 10),
(96, 'CAMPUS Imperatriz', 10),
(97, 'CAMPUS Zé Doca', 10),
(98, 'CAMPUS Buriticupu', 10),
(99, 'CAMPUS Centro Histórico', 10),
(100, 'CAMPUS Açailândia', 10),
(101, 'CAMPUS Santa Inês', 10),
(102, 'CAMPUS Caxias', 10),
(103, 'CAMPUS Timon', 10),
(104, 'CAMPUS Barreirinhas', 10),
(105, 'CAMPUS São Raimundo das Mangabeiras', 10),
(106, 'CAMPUS Bacabal', 10),
(107, 'CAMPUS Barra do Corda', 10),
(108, 'CAMPUS São João dos Patos', 10),
(109, 'CAMPUS Pinheiro', 10),
(110, 'CAMPUS Alcântara', 10),
(111, 'CAMPUS Montes Claros', 11),
(112, 'CAMPUS Januária', 11),
(113, 'CAMPUS Salinas', 11),
(114, 'CAMPUS Pirapora', 11),
(115, 'CAMPUS Araçuaí', 11),
(116, 'CAMPUS Arinos', 11),
(117, 'CAMPUS Almenara', 11),
(118, 'CAMPUS Barbacena', 11),
(119, 'CAMPUS Juiz de Fora', 11),
(120, 'CAMPUS Muriaé', 11),
(121, 'CAMPUS Rio Pomba', 11),
(122, 'CAMPUS Ouro Preto', 11),
(123, 'CAMPUS Congonhas', 11),
(124, 'CAMPUS São João Evangelista', 11),
(125, 'CAMPUS Governador Valadares', 11),
(126, 'CAMPUS Contagem', 11),
(127, 'CAMPUS Bambuí', 11),
(128, 'CAMPUS Formiga', 11),
(129, 'CAMPUS Curvelo', 11),
(130, 'CAMPUS Inconfidentes', 11),
(131, 'CAMPUS Machado', 11),
(132, 'CAMPUS Muzambinho', 11),
(133, 'CAMPUS Ituiutaba', 11),
(134, 'CAMPUS Paracatu', 11),
(135, 'CAMPUS Uberaba', 11),
(136, 'CAMPUS Uberlândia', 11),
(137, 'CAMPUS Cuiabá', 13),
(138, 'CAMPUS Bela Vista', 13),
(139, 'CAMPUS Cáceres', 13),
(140, 'CAMPUS São Vicente', 13),
(141, 'CAMPUS Barra do Garças', 13),
(142, 'CAMPUS Campo Novo do Parecis', 13),
(143, 'CAMPUS Confresa', 13),
(144, 'CAMPUS Juína', 13),
(145, 'CAMPUS Pontes e Lacerda', 13),
(146, 'CAMPUS Rondonópolis', 13),
(147, 'CAMPUS Campo Grande', 12),
(148, 'CAMPUS Nova Andradina', 12),
(149, 'CAMPUS Aquidauana', 12),
(150, 'CAMPUS Ponta Porã', 12),
(151, 'CAMPUS Três Lagoas', 12),
(152, 'CAMPUS Corumbá', 12),
(153, 'CAMPUS Coxim', 12),
(154, 'CAMPUS Belém', 14),
(155, 'CAMPUS Castanhal', 14),
(156, 'CAMPUS Altamira', 14),
(157, 'CAMPUS Marabá Industrial', 14),
(158, 'CAMPUS Tucuruí', 14),
(159, 'CAMPUS Agrícola Marabá', 14),
(160, 'CAMPUS Abaetetuba', 14),
(161, 'CAMPUS Conceição do Araguaia', 14),
(162, 'CAMPUS de Bragança', 14),
(163, 'CAMPUS de Itaituba', 14),
(164, 'CAMPUS de Santarém', 14),
(165, 'CAMPUS João Pessoa', 15),
(166, 'CAMPUS Sousa', 15),
(167, 'CAMPUS Cajazeiras', 15),
(168, 'CAMPUS Campina Grande', 15),
(169, 'CAMPUS Picuí', 15),
(170, 'CAMPUS Princesa Isabel', 15),
(171, 'CAMPUS Monteiro', 15),
(172, 'CAMPUS Patos', 15),
(173, 'CAMPUS Cabedelo', 15),
(174, 'CAMPUS Recife', 16),
(175, 'CAMPUS Ipojuca', 16),
(176, 'CAMPUS Pesqueira', 16),
(177, 'CAMPUS Barreiros', 16),
(178, 'CAMPUS Vitória de Santo Antão', 16),
(179, 'CAMPUS Belo Jardim', 16),
(180, 'CAMPUS Garanhuns', 16),
(181, 'CAMPUS Caruaru', 16),
(182, 'CAMPUS Afogados da Ingazeira', 16),
(183, 'CAMPUS de Ciências e Tecnologia de Petrolina', 16),
(184, 'CAMPUS de Ciências Agrárias de Petrolina', 16),
(185, 'CAMPUS Floresta', 16),
(186, 'CAMPUS Salgueiro', 16),
(187, 'CAMPUS Ouricuri', 16),
(188, 'CAMPUS Teresina I', 17),
(189, 'CAMPUS Floriano', 17),
(190, 'CAMPUS Picos', 17),
(191, 'CAMPUS Parnaíba', 17),
(192, 'CAMPUS Angical', 17),
(193, 'CAMPUS Uruçuí', 17),
(194, 'CAMPUS Corrente', 17),
(195, 'CAMPUS Paulistana', 17),
(196, 'CAMPUS São Raimundo Nonato', 17),
(197, 'CAMPUS Piripiri', 17),
(198, 'CAMPUS Curitiba', 18),
(199, 'CAMPUS Foz do Iguaçu', 18),
(200, 'CAMPUS Jacarezinho', 18),
(201, 'CAMPUS Paranaguá', 18),
(202, 'CAMPUS Paranavaí', 18),
(203, 'CAMPUS Telêmaco Borba', 18),
(204, 'CAMPUS Umuarama', 18),
(205, 'CAMPUS Nilópolis', 19),
(206, 'CAMPUS Maracanã', 19),
(207, 'CAMPUS Paracambi', 19),
(208, 'CAMPUS Duque de Caxias', 19),
(209, 'CAMPUS Volta Redonda', 19),
(210, 'CAMPUS Realengo', 19),
(211, 'Pinheiral', 19),
(212, 'CAMPUS São Gonçalo', 19),
(213, 'CAMPUS Lagos', 19),
(214, 'CAMPUS Bom Jesus de Itabapoana', 19),
(215, 'CAMPUS Campos', 19),
(216, 'CAMPUS Guarus', 19),
(217, 'CAMPUS Macaé', 19),
(218, 'CAMPUS Noroeste', 19),
(219, 'CAMPUS Central de Natal', 20),
(220, 'CAMPUS Zona Norte de Natal', 20),
(221, 'CAMPUS Mossoró', 20),
(222, 'CAMPUS Currais Novos', 20),
(223, 'CAMPUS Ipanguaçu', 20),
(224, 'CAMPUS João Câmara', 20),
(225, 'CAMPUS Macau', 20),
(226, 'CAMPUS Santa Cruz', 20),
(227, 'CAMPUS Caicó', 20),
(228, 'CAMPUS Pau dos Ferros', 20),
(229, 'CAMPUS Apodi', 20),
(230, 'CAMPUS Porto Velho', 21),
(231, 'CAMPUS Colorado do Oeste', 21),
(232, 'CAMPUS Ariquemes', 21),
(233, 'CAMPUS Vilhena', 21),
(234, 'CAMPUS Ji-Paraná', 21),
(235, 'CAMPUS Boa Vista', 22),
(236, 'CAMPUS Novo Paraíso', 22),
(237, 'CAMPUS Amajarí', 22),
(238, 'CAMPUS Pelotas', 23),
(239, 'CAMPUS Sapucaia do Sul', 23),
(240, 'CAMPUS Charqueadas', 23),
(241, 'CAMPUS Venâncio Aires', 23),
(242, 'CAMPUS Camaquã', 23),
(243, 'CAMPUS Bagé', 23),
(244, 'CAMPUS Alegrete', 23),
(245, 'CAMPUS Júlio de Castilhos', 23),
(246, 'CAMPUS Panambi', 23),
(247, 'CAMPUS Santa Rosa', 23),
(248, 'CAMPUS São Borja', 23),
(249, 'CAMPUS Santo Augusto', 23),
(250, 'CAMPUS São Vicente do Sul', 23),
(251, 'CAMPUS Bento Gonçalves', 23),
(252, 'CAMPUS Canoas', 23),
(253, 'CAMPUS Caxias do Sul', 23),
(254, 'CAMPUS Osório', 23),
(255, 'CAMPUS Erechim', 23),
(256, 'CAMPUS Passo Fundo', 23),
(257, 'CAMPUS Porto Alegre', 23),
(258, 'CAMPUS Restinga', 23),
(259, 'CAMPUS Sertão', 23),
(260, 'CAMPUS Concórdia', 24),
(261, 'CAMPUS Rio do Sul', 24),
(262, 'CAMPUS Sombrio', 24),
(263, 'CAMPUS Camboriú', 24),
(264, 'CAMPUS Araquari', 24),
(265, 'CAMPUS Videira', 24),
(266, 'CAMPUS Florianópolis', 24),
(267, 'CAMPUS São José', 24),
(268, 'CAMPUS Continente', 24),
(269, 'CAMPUS Jaraguá do Sul', 24),
(270, 'CAMPUS Joinville', 24),
(271, 'CAMPUS Chapecó', 24),
(272, 'CAMPUS Araranguá', 24),
(273, 'CAMPUS Criciúma', 24),
(274, 'CAMPUS Gaspar', 24),
(275, 'CAMPUS Itajaí', 24),
(276, 'CAMPUS Lages', 24),
(277, 'CAMPUS Canoinhas', 24),
(278, 'CAMPUS São Miguel do Oeste', 24),
(279, 'CAMPUS Aracaju', 25),
(280, 'CAMPUS Lagarto', 25),
(281, 'CAMPUS São Cristóvão', 25),
(282, 'CAMPUS Estância', 25),
(283, 'CAMPUS Nossa Senhora da Glória', 25),
(284, 'CAMPUS Itabaiana', 25),
(285, 'CAMPUS São Paulo', 26),
(286, 'CAMPUS Cubatão', 26),
(287, 'CAMPUS Sertãozinho', 26),
(288, 'CAMPUS Guarulhos', 26),
(289, 'CAMPUS Caraguatatuba', 26),
(290, 'CAMPUS São João da Boa Vista', 26),
(291, 'CAMPUS Salto', 26),
(292, 'CAMPUS Bragança Paulista', 26),
(293, 'CAMPUS São Roque', 26),
(294, 'CAMPUS Campos do Jordão', 26),
(295, 'CAMPUS Barretos', 26),
(296, 'CAMPUS Suzano', 26),
(297, 'CAMPUS Campinas', 26),
(298, 'CAMPUS Catanduva', 26),
(299, 'CAMPUS Avaré', 26),
(300, 'CAMPUS Araraquara', 26),
(301, 'CAMPUS Itapetininga', 26),
(302, 'CAMPUS Birigüi', 26),
(303, 'CAMPUS Votuporanga', 26),
(304, 'CAMPUS Registro', 26),
(305, 'CAMPUS Presidente Epitácio', 26),
(306, 'CAMPUS Piracicaba', 26),
(307, 'CAMPUS Palmas', 27),
(308, 'CAMPUS Paraíso do Tocantins', 27),
(309, 'CAMPUS Araguatins', 27),
(310, 'CAMPUS Araguaína', 27),
(311, 'CAMPUS Gurupi', 27),
(312, 'CAMPUS Porto Nacional', 27);

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `texto_post` varchar(255) NOT NULL,
  `media_post` varchar(255) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id_post`, `id_usuario`, `texto_post`, `media_post`, `data`) VALUES
(251, 20, 'oi', '', '2022-06-29'),
(252, 20, 'po', '', '2022-06-29'),
(253, 20, 'oi', '', '2022-06-29'),
(254, 20, 'teste', '', '2022-06-29'),
(255, 20, 'opa', '', '2022-06-29'),
(256, 20, 'teste', '', '2022-06-29'),
(257, 21, 'oi', '03dc38993af623335e2e5ae71b4047a9.gif', '2022-06-29'),
(258, 21, 'OI', '', '2022-06-29'),
(259, 21, '', '249022e2960aab97665f1634a4d0218a.gif', '2022-06-29'),
(260, 21, 'o post finalmente funciona', '6ea2895d62df4a1891b04442dae4b9d7.jpg', '2022-06-29'),
(261, 21, 'aeeeeee', '460a32ddc9e2c753a5c99404c1bcd8ab.jpg', '2022-06-29'),
(262, 21, 'postagem com imagem', 'd99087451a349038a12cdfd1cfd59d9d.jpg', '2022-06-29'),
(263, 21, 'oi', '8a5422a47e644e96c079a0a93f64af50.jpg', '2022-06-29'),
(264, 21, '', 'd88b7098f6877c0e3b4a2e92bde32a08.jpg', '2022-06-29'),
(265, 21, 'que dia lindo\r\nhttps://upload.wikimedia.org/wikipedia/commons/thumb/7/77/Google_Images_2015_logo.svg/640px-Google_Images_2015_logo.svg.png', '', '2022-06-29'),
(266, 21, 'https', '', '2022-06-29'),
(267, 21, 'otto é muito bonito', '', '2022-06-29'),
(268, 21, 'https://www.google.com/search?q=compartilhar+link+no+textarea+php&oq=compartilhar+link+no+textarea&aqs=chrome.3.69i57j33i160l3.6945j1j9&sourceid=chrome&ie=UTF-8', '', '2022-06-29'),
(269, 21, 'https://codepen.io/pen/', '', '2022-06-29'),
(270, 21, 'oi, bom dia', '2a8ed02b8445fde1db64957e025db25d.jpg', '2022-06-30'),
(271, 21, 'bom dia', '1ce1d48b62112020f6b5204c42f0b6ae.jpg', '2022-06-30'),
(272, 19, 'Olá mundo!', '', '2022-06-30'),
(273, 19, 'olaa', '', '2022-06-30'),
(274, 19, 'teste', '', '2022-06-30'),
(275, 19, 'boa noite', '', '2022-06-30'),
(276, 19, 'opa', '', '2022-06-30'),
(277, 19, 'oi', '', '2022-06-30'),
(278, 19, 'boa noite', '', '2022-06-30'),
(279, 19, 'que dia lindo!', 'ae8740eea5f811f122e4d2fc6110f7f7.jpg', '2022-06-30'),
(280, 20, 'otto é gay', '', '2022-06-30'),
(281, 20, 'otto', '', '2022-06-30'),
(282, 20, 'oi', '', '2022-06-30'),
(283, 20, 'oi', '83ec53f8fd8d8edae6d3c0cbada8be4b.jpg', '2022-06-30'),
(284, 20, 'oi', 'bbe5a24ca5642c6448fffb3f9e385ffd.jpg', '2022-06-30'),
(285, 20, 'oi', '', '2022-06-30'),
(286, 20, 'oi', '', '2022-06-30'),
(287, 20, 'oi', '', '2022-06-30'),
(288, 20, 'oi', '', '2022-06-30'),
(289, 20, 'oi', '', '2022-06-30'),
(290, 20, 'teste', '', '2022-06-30'),
(291, 20, 'oi', '315b0d3cd4a86a06fcc87067279c95e6.png', '2022-06-30'),
(292, 20, 'teste', '', '2022-06-30'),
(293, 20, 'ola', '', '2022-07-05'),
(294, 21, 'bom dia!!', '', '2022-07-05'),
(295, 20, 'oi', '', '2022-07-07'),
(296, 20, 'oi', '', '0000-00-00'),
(297, 20, 'oi', '', '2022-07-08'),
(298, 20, 'teste', '', '2022-07-08'),
(299, 20, 'coco', '', '2022-07-08'),
(300, 20, 'asda', '', '2022-07-12'),
(301, 20, 'fgdfgdgdf', '', '2022-07-12'),
(302, 20, 'Bom dia!', '', '2022-07-12'),
(303, 20, 'Olá joao', '', '2022-07-19'),
(304, 20, 'oi', '', '2022-07-31'),
(305, 20, 'oi', '', '2022-08-02'),
(306, 20, 'teste', '', '2022-08-02'),
(307, 21, '', '6a206a3099949c45b7f8ec1ee5e10cd6.jpg', '2022-08-09'),
(308, 21, 'oiiiiiii', '6e125849d65d59c9a690ba97e3bb3b69.jpg', '2022-08-16'),
(309, 23, 'oi', '', '2022-08-17'),
(310, 23, 'oi', '', '2022-08-17'),
(311, 23, 'des', '', '2022-08-17'),
(312, 23, 'paulo', '', '2022-08-17'),
(313, 23, 'oi', '', '2022-08-17'),
(314, 21, 'oi', '', '2022-08-18'),
(315, 21, 'teste', '', '2022-08-18'),
(316, 21, 'teste', '', '2022-08-18'),
(317, 21, 'o', '', '2022-08-18'),
(318, 21, 'o', '', '2022-08-18'),
(319, 21, 'p', '', '2022-08-18'),
(320, 21, 'p', '', '2022-08-18'),
(321, 21, 'm', '', '2022-08-18'),
(322, 21, 'm', '', '2022-08-18'),
(323, 21, 'n', '', '2022-08-18'),
(324, 21, 'n', '', '2022-08-18'),
(325, 21, 'l', '', '2022-08-18'),
(326, 21, 'm', '', '2022-08-18'),
(327, 21, 'a', '', '2022-08-18'),
(328, 21, 'j', '', '2022-08-18'),
(329, 21, 'm', '', '2022-08-18'),
(330, 21, 'jjjj', '', '2022-08-18'),
(331, 21, 'o', '', '2022-08-18'),
(332, 21, 'l', '', '2022-08-20'),
(333, 21, 'l\r\nl', '', '2022-08-20'),
(334, 21, 'ç', '', '2022-08-20'),
(335, 21, 'm', '', '2022-08-21'),
(336, 32, 'oi', '', '2022-08-28'),
(337, 32, 'oi', '', '2022-08-28'),
(338, 32, 'teste', '', '2022-08-28'),
(339, 32, 'paulo', '', '2022-08-28'),
(340, 32, 'cesar', '', '2022-08-28'),
(341, 32, 'oiiii', '', '2022-08-28'),
(342, 32, 'oi', '9bbcdfcb03890c092ca068dbfed18428.jpg', '2022-08-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro_login`
--

CREATE TABLE `registro_login` (
  `id_login` int(11) NOT NULL,
  `id_usuario_login` int(11) NOT NULL,
  `data_entrada` datetime NOT NULL,
  `data_saida` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `registro_login`
--

INSERT INTO `registro_login` (`id_login`, `id_usuario_login`, `data_entrada`, `data_saida`) VALUES
(15, 31, '2022-08-23 07:36:42', '2022-08-23 07:39:13'),
(16, 31, '2022-08-23 07:39:22', NULL),
(17, 32, '2022-08-23 08:20:36', '2022-08-23 08:22:07'),
(18, 32, '2022-08-23 08:24:16', '2022-08-23 08:24:33'),
(19, 31, '2022-08-23 08:36:51', NULL),
(20, 31, '2022-08-23 08:36:52', NULL),
(21, 32, '2022-08-27 15:51:44', NULL),
(22, 32, '2022-08-28 11:49:53', NULL),
(23, 32, '2022-08-29 19:26:27', NULL),
(24, 32, '2022-08-30 19:17:47', NULL),
(25, 31, '2022-08-30 19:44:47', NULL),
(26, 32, '2022-09-01 10:58:19', NULL),
(27, 31, '2022-09-01 11:31:50', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reply`
--

CREATE TABLE `reply` (
  `id_reply` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_aluno_reply` int(11) NOT NULL,
  `mensagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`);

--
-- Indexes for table `amizade`
--
ALTER TABLE `amizade`
  ADD PRIMARY KEY (`id_amzd`),
  ADD KEY `id_usuario_de` (`id_aluno_de`),
  ADD KEY `id_usuario_para` (`id_aluno_para`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institutos`
--
ALTER TABLE `institutos`
  ADD PRIMARY KEY (`id_instituto`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `registro_login`
--
ALTER TABLE `registro_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id_reply`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `amizade`
--
ALTER TABLE `amizade`
  MODIFY `id_amzd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `institutos`
--
ALTER TABLE `institutos`
  MODIFY `id_instituto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;

--
-- AUTO_INCREMENT for table `registro_login`
--
ALTER TABLE `registro_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id_reply` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
