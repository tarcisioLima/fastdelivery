-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 10-Dez-2016 às 15:58
-- Versão do servidor: 5.5.50-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `db_fastdelivery`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `cd_adm` int(11) NOT NULL AUTO_INCREMENT,
  `nm_adm` varchar(20) NOT NULL,
  `nm_senha` varchar(20) NOT NULL,
  PRIMARY KEY (`cd_adm`),
  UNIQUE KEY `nm_adm` (`nm_adm`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_admin`
--

INSERT INTO `tb_admin` (`cd_adm`, `nm_adm`, `nm_senha`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE IF NOT EXISTS `tb_cliente` (
  `cd_cliente` smallint(6) NOT NULL AUTO_INCREMENT,
  `nm_cliente` varchar(50) NOT NULL,
  `ds_comprovante` varchar(14) NOT NULL,
  `cd_login` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`cd_cliente`),
  KEY `cd_login_idx` (`cd_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`cd_cliente`, `nm_cliente`, `ds_comprovante`, `cd_login`) VALUES
(1, 'Junior', '99999999999', 67),
(4, 'Maria Lucia', '99999999999', 58),
(5, 'Ayrton da Silva', '12345678910', 74),
(6, 'Cliente Teste', '46858429870', 76);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_login`
--

CREATE TABLE IF NOT EXISTS `tb_login` (
  `cd_login` smallint(6) NOT NULL AUTO_INCREMENT,
  `ds_celular` varchar(11) NOT NULL,
  `ds_senha` varchar(20) NOT NULL,
  `cd_token` text,
  PRIMARY KEY (`cd_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

--
-- Extraindo dados da tabela `tb_login`
--

INSERT INTO `tb_login` (`cd_login`, `ds_celular`, `ds_senha`, `cd_token`) VALUES
(58, '13991086282', '44444444444444444444', NULL),
(62, '55555555555', '55555555555555555555', NULL),
(63, '12121212121', '11111111111111111111', NULL),
(64, '13346440359', '123456', NULL),
(65, '47878974242', '77777777777777777777', NULL),
(66, '32111111111', '32111111111111111111', NULL),
(67, '66666666666', 'wwwwwwwwwwwwwwwwwwww', NULL),
(68, '78787878787', '88888888888888888888', NULL),
(69, '10203000000', '102030', NULL),
(70, '87878787878', 'ssssssssssssssssssss', NULL),
(71, '32323232323', '23333333333333333333', NULL),
(72, '00000000000', '00000000000000000000', NULL),
(73, '13111111111', '123456', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmYXN0ZGVsaXZlcnktZ21vcmFpei5jOXVzZXJzLmlvIiwidXNlcnRlbCI6IjEzMTExMTExMTExIn0=.UaMRbG2btpHFUJIAAh1HcfgDdXPOZhzrmaFeEf5Cs1s='),
(74, '13222222222', '123456', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmYXN0ZGVsaXZlcnktZ21vcmFpei5jOXVzZXJzLmlvIiwidXNlcnRlbCI6IjEzMjIyMjIyMjIyIn0=.Dhd9mA5q/2MsxpBpVCXvyHWSdqR4mbX7IDw1kotZdB4='),
(75, '13933333333', '123456', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmYXN0ZGVsaXZlcnktZ21vcmFpei5jOXVzZXJzLmlvIiwidXNlcnRlbCI6IjEzOTMzMzMzMzMzIn0=.e9AyeYHqZy1jQHx/rOzKq+FsGTN2F2DcTjtOuMh+Wo8='),
(76, '13944444444', '123456', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmYXN0ZGVsaXZlcnktZ21vcmFpei5jOXVzZXJzLmlvIiwidXNlcnRlbCI6IjEzOTQ0NDQ0NDQ0In0=.L5i+pghTcCRmkJAhRD3W3tUoAbZ7kIKgnzPII7jaq5g=');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_medida`
--

CREATE TABLE IF NOT EXISTS `tb_medida` (
  `ds_medida` varchar(12) NOT NULL,
  `vl_medida` decimal(5,2) DEFAULT NULL,
  `qt_medida` tinyint(2) DEFAULT NULL,
  `vl_inicial` decimal(5,2) DEFAULT NULL,
  `qt_inicial` tinyint(2) DEFAULT NULL,
  `ic_medida` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ds_medida`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_medida`
--

INSERT INTO `tb_medida` (`ds_medida`, `vl_medida`, `qt_medida`, `vl_inicial`, `qt_inicial`, `ic_medida`) VALUES
('Kilometro', '2.00', 3, '6.00', 2, 1),
('Metro', '5.00', 2, '3.00', 5, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_motorista`
--

CREATE TABLE IF NOT EXISTS `tb_motorista` (
  `cd_motorista` smallint(6) NOT NULL AUTO_INCREMENT,
  `nm_motorista` varchar(50) NOT NULL,
  `ds_email` varchar(70) DEFAULT NULL,
  `ds_sexo` char(1) NOT NULL,
  `ds_telefone` char(10) DEFAULT NULL,
  `nm_endereco` varchar(70) NOT NULL,
  `nm_cidade` varchar(30) NOT NULL,
  `nm_bairro` varchar(30) NOT NULL,
  `sg_uf` char(2) NOT NULL,
  `ds_cep` varchar(8) NOT NULL,
  `dt_nascimento` date NOT NULL,
  `ds_imagem` mediumblob,
  `vl_latitude` decimal(18,15) DEFAULT NULL,
  `vl_longitude` decimal(18,15) DEFAULT NULL,
  `cd_cpf` char(11) NOT NULL,
  `cd_login` smallint(6) DEFAULT NULL,
  `cd_veiculo` smallint(6) DEFAULT NULL,
  `cd_status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`cd_motorista`),
  KEY `fk_loginmotorista_idx` (`cd_login`),
  KEY `fk_status_idx` (`cd_status`),
  KEY `fk_veiculo_idx` (`cd_veiculo`),
  KEY `id_latitude` (`vl_latitude`),
  KEY `id_longitude` (`vl_longitude`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Extraindo dados da tabela `tb_motorista`
--

INSERT INTO `tb_motorista` (`cd_motorista`, `nm_motorista`, `ds_email`, `ds_sexo`, `ds_telefone`, `nm_endereco`, `nm_cidade`, `nm_bairro`, `sg_uf`, `ds_cep`, `dt_nascimento`, `ds_imagem`, `vl_latitude`, `vl_longitude`, `cd_cpf`, `cd_login`, `cd_veiculo`, `cd_status`) VALUES
(32, 'Tarcisio', 'tarcisio_thallys@hotmail.com', 'M', '34636163', 'Bairro: Parque SÃ£o Vicente, Rua: Goitacazes, NÂº 518, Casa 1, Cidade:', 'sÃ£o Vicente', 'Parque SÃ£o Vicente', 'SP', '11360020', '1997-06-12', NULL, '-23.956823230000000', '-46.388411140000000', '12312321312', 58, 1, 1),
(36, 'Frederico', 'hackerzito@hacker.com', 'M', '34636163', 'trolei viado', 'cade ', 'a tampa', 'SP', '21312312', '1994-12-12', NULL, '-23.971116920000000', '-46.386766430000000', '12312321312', 62, 1, 1),
(37, 'teste', 'teste@teste.com', 'M', '2131232132', 'Teste', 'Teste', 'Teste', 'RN', '23123213', '1995-12-12', NULL, '-23.964215090000000', '-46.328873630000000', '12312312321', 63, 1, 1),
(38, 'Gabriel Morais Silva', 'g.moraissilva@outlook.com', 'M', '1334644035', 'Rua: Alves do Bugre 579', 'SÃ£o Vicente', 'SÃ£o Vicente', 'SP', '11365350', '1997-06-29', NULL, '-23.941232450000000', '-46.323766710000000', '46858429875', 64, 1, 5),
(39, 'Reginaldo', 'reginaldo@gmail.com', 'M', '6542542564', 'Reginaldo Street', 'ReginaldolÃ¢ndia', 'RR', 'PB', '21323123', '1997-06-12', NULL, '-23.981233710000000', '-46.302824020000000', '98707899887', 65, 4, 3),
(40, 'Felipe', 'tarcisio_thallys@hotmail.com', 'M', '2222233333', 'daaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaa', 'AM', 'aaaaaaaa', '1992-02-12', NULL, '-23.987350460000000', '-46.303167340000000', '23211111111', 66, 14, 4),
(41, 'bbbbbbbbbbbbbbb', 'tarcisio_thallys@hotmail.com', 'M', '3333333333', 'bbbbbbbbbbbbb', 'bbbbbbbbbbbb', 'bbbbbbbbb', 'MG', 'bbbbbbbb', '1994-06-12', NULL, '-23.954253830000000', '-46.355524060000000', '33333333333', 67, 8, 5),
(42, 'olavo', 'olavo@hotmail.com', 'M', '2545555555', 'rua feliz', 'feliz', 'feliz', 'RR', '52412242', '1997-03-31', NULL, '-23.973077600000000', '-46.370630260000000', '-s', 68, 15, 1),
(43, 'Sr Teste', 'teste@teste.io', 'M', '100110110', 'Rua dos teste Numero 0', 'Testelandia', 'Jr Don Teste IV', 'SP', '10110110', '1111-11-11', NULL, NULL, NULL, '10102010000', 69, 1, 2),
(44, 'hunter', 'h@h.com', 'M', '3548457815', 'moca', 'sÃ£o paulo', 'moca', 'SP', '54511454', '1994-03-12', NULL, NULL, NULL, '85245654141', 70, 18, 1),
(45, 'cre', 'cre@cre', 'M', '54235245', 'creee', 'creee', 'cree', 'PA', '23241252', '1997-06-12', NULL, NULL, NULL, '21323421522', 71, 14, 1),
(46, 'ola', 'ola@ola.com', 'M', '2312412142', 'olaa', 'olaa', 'olaa', 'PR', '23452412', '1994-02-12', NULL, NULL, NULL, '51251252521', 72, 11, NULL),
(47, 'Fabiano Morais', 'fabianomorais25@gmail.com', 'M', '1334644035', 'Rua: Alves do Bugrete, 579', 'SAO VICENTE', 'SÃ£o Vicente', 'SP', '11365350', '1989-10-08', NULL, '-23.953850700000000', '-46.396722400000000', '11111111111', 73, 4, 1),
(48, 'Motorista Teste', 'teste@teste.cmo', 'M', '1334664035', 'Rua alves do bugre 579', 'SÃ£o vicente', 'Pq sÃ£o vicente', 'SP', '11365350', '1997-06-29', NULL, NULL, NULL, '12345678910', 75, 20, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedido`
--

CREATE TABLE IF NOT EXISTS `tb_pedido` (
  `cd_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `dt_solicitacao` datetime DEFAULT NULL,
  `dt_finalizacao` datetime DEFAULT NULL,
  `ds_endereco_entrega` varchar(150) DEFAULT NULL,
  `ds_endereco_retirada` varchar(150) DEFAULT NULL,
  `vl_pedido` decimal(7,2) DEFAULT NULL,
  `cd_motorista` smallint(6) DEFAULT NULL,
  `cd_cliente` smallint(6) DEFAULT NULL,
  `cd_situacao` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`cd_pedido`),
  KEY `fk_motoristapedido_idx` (`cd_motorista`),
  KEY `fk_cliente_idx` (`cd_cliente`),
  KEY `fk_situacao_idx` (`cd_situacao`),
  KEY `id_endereco_entrega` (`ds_endereco_entrega`),
  KEY `id_endereco_retirada` (`ds_endereco_retirada`),
  KEY `id_pedido` (`vl_pedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tb_pedido`
--

INSERT INTO `tb_pedido` (`cd_pedido`, `dt_solicitacao`, `dt_finalizacao`, `ds_endereco_entrega`, `ds_endereco_retirada`, `vl_pedido`, `cd_motorista`, `cd_cliente`, `cd_situacao`) VALUES
(1, '2016-11-01 03:12:22', '2016-11-01 04:18:23', 'Rua tamoios, 580, casa 5 ', 'Rua Tupi. 300, casa 7', '19.90', 40, 1, 2),
(2, '2016-11-01 03:12:22', '2016-11-01 04:18:23', 'Rua tamoios, 580, casa 5 ', 'Rua Tupi. 300, casa 7', '19.90', 40, 1, 3),
(3, '2016-11-01 00:00:00', '2016-11-01 00:00:00', 'Rua 1', 'Rua 2', '30.58', 36, 4, 3),
(4, '2016-11-28 17:53:57', NULL, 'Rua Tupi 810, SÃ¢o Vicente - SP', 'Rua alves do bugre 579, SÃ£o Vicente - SP', '6.00', 32, 5, 3),
(5, '2016-11-28 17:57:45', '2016-11-28 17:58:32', 'Rua Tupi 810, SÃ¢o Vicente - SP', 'Rua alves do bugre 579, SÃ£o Vicente - SP', '6.00', 47, 5, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_servico`
--

CREATE TABLE IF NOT EXISTS `tb_servico` (
  `cd_motorista` smallint(6) NOT NULL,
  `ds_tempo_estimado` varchar(50) DEFAULT NULL,
  `cd_pedido` int(11) DEFAULT NULL,
  PRIMARY KEY (`cd_motorista`),
  KEY `fk_pedido_idx` (`cd_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_servico`
--

INSERT INTO `tb_servico` (`cd_motorista`, `ds_tempo_estimado`, `cd_pedido`) VALUES
(44, NULL, NULL),
(45, NULL, NULL),
(46, NULL, NULL),
(47, '2 Minutos', NULL),
(48, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_situacao`
--

CREATE TABLE IF NOT EXISTS `tb_situacao` (
  `cd_situacao` tinyint(1) NOT NULL,
  `ds_situacao` varchar(12) NOT NULL,
  PRIMARY KEY (`cd_situacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_situacao`
--

INSERT INTO `tb_situacao` (`cd_situacao`, `ds_situacao`) VALUES
(1, 'Pendente'),
(2, 'Aceito'),
(3, 'Finalizado'),
(4, 'Recusado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_status`
--

CREATE TABLE IF NOT EXISTS `tb_status` (
  `cd_status` tinyint(1) NOT NULL,
  `ds_status` varchar(20) NOT NULL,
  PRIMARY KEY (`cd_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_status`
--

INSERT INTO `tb_status` (`cd_status`, `ds_status`) VALUES
(1, 'Disponivel'),
(2, 'Em Servico'),
(3, 'Pendente'),
(4, 'Offline'),
(5, 'Indisponivel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_veiculo`
--

CREATE TABLE IF NOT EXISTS `tb_veiculo` (
  `cd_veiculo` smallint(6) NOT NULL AUTO_INCREMENT,
  `ds_placa` char(7) NOT NULL,
  `ds_modelo` varchar(40) DEFAULT NULL,
  `ds_cor` varchar(20) DEFAULT NULL,
  `ic_empresa` tinyint(1) DEFAULT NULL,
  `ic_ocupado` tinyint(1) NOT NULL,
  PRIMARY KEY (`cd_veiculo`),
  KEY `cd_veiculo` (`cd_veiculo`),
  KEY `cd_veiculo_2` (`cd_veiculo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Extraindo dados da tabela `tb_veiculo`
--

INSERT INTO `tb_veiculo` (`cd_veiculo`, `ds_placa`, `ds_modelo`, `ds_cor`, `ic_empresa`, `ic_ocupado`) VALUES
(1, '1111111', 'GOL BOLA VERDE', 'VERDE', 0, 1),
(4, '@##S', 'CROSSFOX', 'VERMELHO', 1, 1),
(8, '@ESFSG', 'CORSINHA', 'AMARELO', 0, 1),
(9, 'XXXXXXX', 'RATAO', 'PRETO', NULL, 1),
(10, 'XXXXXX2', 'Chevrolet', 'azul', 0, 0),
(11, '2222222', '222222222222222222', '2222222222222222', 1, 1),
(12, 'SDSDJSH', 'safasf', 'sfasf', 1, 0),
(13, 'xxxxx22', 'voador', 'rosa', 0, 1),
(14, 'hhhhhhh', 'hhhhhhhhhhhhhhhh', 'hhhh', 1, 1),
(15, '3241231', 'Impala', 'Preto', 1, 1),
(16, 'SDASDSF', 'pobres', 'preto', 1, 0),
(17, '2223111', 'ford ', 'rosa', 0, 0),
(18, '54854ss', 'Fusca 200', 'amarelo', 0, 1),
(19, 'fssdsds', 'corsa', 'preto', 1, 0),
(20, 'EFX2959', 'Celta 2.0', 'Preto', 1, 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD CONSTRAINT `fk_logincliente` FOREIGN KEY (`cd_login`) REFERENCES `tb_login` (`cd_login`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_motorista`
--
ALTER TABLE `tb_motorista`
  ADD CONSTRAINT `fk_loginmotorista` FOREIGN KEY (`cd_login`) REFERENCES `tb_login` (`cd_login`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`cd_status`) REFERENCES `tb_status` (`cd_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_veiculo` FOREIGN KEY (`cd_veiculo`) REFERENCES `tb_veiculo` (`cd_veiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`cd_cliente`) REFERENCES `tb_cliente` (`cd_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_motoristapedido` FOREIGN KEY (`cd_motorista`) REFERENCES `tb_motorista` (`cd_motorista`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_situacao` FOREIGN KEY (`cd_situacao`) REFERENCES `tb_situacao` (`cd_situacao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_servico`
--
ALTER TABLE `tb_servico`
  ADD CONSTRAINT `fk_motorista` FOREIGN KEY (`cd_motorista`) REFERENCES `tb_motorista` (`cd_motorista`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedido` FOREIGN KEY (`cd_pedido`) REFERENCES `tb_pedido` (`cd_pedido`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
