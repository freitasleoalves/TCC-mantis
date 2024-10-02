-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.5.32 - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              8.0.0.4396
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- Copiando dados para a tabela pizzaria.atendimento: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `atendimento` DISABLE KEYS */;
INSERT INTO `atendimento` (`dia`, `horarioAbertura`, `horarioFechamento`, `diaSeguinte`, `delivery`) VALUES
	(0, '19:00:00', '23:59:59', 0, 1),
	(2, '20:00:00', '23:59:59', 0, 1),
	(4, '20:00:00', '23:59:59', 0, 1),
	(5, '10:00:00', '12:00:00', 0, 0),
	(5, '00:00:00', '02:00:00', 1, 0),
	(6, '00:00:00', '03:00:00', 1, 1),
	(5, '19:00:00', '23:59:59', 0, 1);
/*!40000 ALTER TABLE `atendimento` ENABLE KEYS */;

-- Copiando dados para a tabela pizzaria.box: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `box` DISABLE KEYS */;
INSERT INTO `box` (`codBox`, `pagina`, `descricao`, `titulo`, `conteudo`, `imagem`) VALUES
	(1, 'inicio', 'Boas Vindas', 'Bem vindo', '&lt;p&gt;&lt;span style=&quot;line-height: 19.200000762939453px;&quot;&gt;Em poucos cliques o cliente pode fazer seu pedido atrav&eacute;s da navega&ccedil;&atilde;o intuitiva, simples e &aacute;gil oferecida pelo sistema PIZZAMANTIS.&lt;/span&gt;&lt;span class=&quot;col2&quot;&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 'welcome_img.png'),
	(2, 'inicio', 'Lista de Atributos', 'Vantagens', '&lt;ul class=&quot;list&quot;&gt;	        &lt;li&gt;Navega&ccedil;&atilde;o intuitiva e simples&lt;/li&gt;		&lt;li&gt;Agilidade e comodidade para o cliente&lt;/li&gt;		&lt;li&gt;Economia de tempo e dinheiro&lt;/li&gt;		&lt;li&gt;Acompanhamento atrav&eacute;s de relat&oacute;rios dia a dia&lt;/li&gt;		&lt;li&gt;Personaliza&ccedil;&atilde;o dos pedidos na pizzaria&lt;/li&gt;&lt;/ul&gt;', NULL),
	(3, 'sobre', 'Descrição da empresa', 'Sobre N&oacute;s', '&lt;p style=&quot;margin-left: 0px; text-align: justify;&quot;&gt;&lt;span data-font=&quot;font-family&quot; style=&quot;font-family: Arial, Helvetica;&quot;&gt;Para voc&ecirc; que prefere saborear&lt;span data-font=&quot;fontFamily&quot;&gt;&lt;/span&gt; uma boa pizza, por um pre&ccedil;o justo, sem sair de casa, a Nobilis conta com delivery gratuito, com a m&aacute;xima agilidade na entrega&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-left: 0px;&quot;&gt;&lt;span data-font=&quot;font-family&quot; style=&quot;font-family: Arial, Helvetica;&quot;&gt;Carinho na hora de fazer e tecnologia nos momentos de servir.&amp;nbsp;&lt;span style=&quot;line-height: 19.200000762939453px;&quot;&gt;Ainda que muita gente esteja impressionada com o “tchan” que a Nobilis causou no mercado, a receita deste sucesso &eacute; simples: mat&eacute;ria-prima de primeira, m&atilde;o de obra especialmente treinada e um card&aacute;pio diferenciado pela variedade e pelas novidades.&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-left: 0px; text-align: justify;&quot;&gt;&lt;span data-font=&quot;font-family&quot; style=&quot;font-family: Arial, Helvetica;&quot;&gt;Venha saborear nossas saborosas pizzas salgadas e doces feitas em forno &agrave; lenha, com a massa aberta na hora, ao gosto do cliente: fina ou grossa.&lt;/span&gt;&lt;/p&gt;', 'page2_img1.jpg'),
	(4, 'sobre', 'História dos donos ', 'Quem s&atilde;o os donos?', '&lt;div class=&quot;extra_wrapper&quot;&gt;		&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;div class=&quot;title&quot;&gt;Jos&eacute; &amp;amp; Ricardo&amp;nbsp;	&lt;br&gt;	Fragoli&lt;/div&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;/div&gt;&lt;p&gt;Os dois irm&atilde;os, nascidos na decada de 70 fundaram juntos a lanchonete Nobilis, inicialmente como ponto de encontro para concentrar a torcida de seu time de cora&ccedil;&atilde;o (O S&atilde;o Paulo).&amp;nbsp;&lt;/p&gt;&lt;p&gt;A id&eacute;ia acabou aumentando, assim como o card&aacute;pio, que passava ent&atilde;o a oferecer pizzas.&amp;nbsp;&lt;/p&gt;&lt;p&gt;Com o tempo esse se tornou o produto chave da Nobilis, que se destaca na cidade de Jacupiranga assim como na regi&atilde;o.&amp;nbsp;&lt;/p&gt;&lt;p&gt;Localizada pr&oacute;xima a rodovia Regis Bittencourt a pizzaria costuma receber visitas de muitos viajantes.&lt;/p&gt;', 'page2_img2.png'),
	(5, 'menu', 'Descrição do Cardápio', 'Nosso Card&aacute;pio', '&lt;p class=&quot;col2 inn1&quot;&gt;&lt;br&gt;&lt;/p&gt;', NULL);
/*!40000 ALTER TABLE `box` ENABLE KEYS */;

-- Copiando dados para a tabela pizzaria.caixa: ~142 rows (aproximadamente)
/*!40000 ALTER TABLE `caixa` DISABLE KEYS */;
INSERT INTO `caixa` (`codCaixa`, `codFuncionario`, `dataAtual`, `saldoAtual`, `faturamento`) VALUES
	(1, 1, '2014-04-23', 54, NULL),
	(2, 1, '2014-04-24', 99.99, NULL),
	(3, 1, '2014-04-24', 99.99, NULL),
	(4, 1, '2014-04-24', 8, NULL),
	(5, 1, '2014-04-24', 99.99, NULL),
	(6, 1, '2014-04-24', 99.99, NULL),
	(7, 1, '2014-04-24', 99.99, NULL),
	(8, 1, '2014-04-24', 54, NULL),
	(9, 1, '2014-04-24', 54, NULL),
	(10, 1, '2014-04-24', 54, NULL),
	(11, 1, '2014-04-24', 54, NULL),
	(12, 1, '2014-04-24', 54, NULL),
	(13, 1, '2014-04-25', 54, NULL),
	(14, 0, '2014-04-25', 54, NULL),
	(15, 0, '2014-04-25', 99.99, NULL),
	(16, 0, '2014-04-25', 99.99, NULL),
	(17, 1, '2014-04-25', 74, NULL),
	(18, 2, '2014-04-25', 74, NULL),
	(19, 1, '2014-04-25', 99.99, NULL),
	(20, 1, '2014-04-25', 7, NULL),
	(21, 1, '2014-04-25', 99.99, NULL),
	(22, 1, '2014-04-25', 54, NULL),
	(23, 1, '2014-04-25', 54, NULL),
	(24, 1, '2014-04-25', 54, NULL),
	(25, 1, '2014-04-25', 89, NULL),
	(26, 1, '2014-04-25', 32, NULL),
	(27, 1, '2014-04-25', 58, NULL),
	(28, 1, '2014-04-25', 99.99, NULL),
	(29, 1, '2014-04-25', 65, NULL),
	(30, 1, '2014-04-28', 21, NULL),
	(31, 1, '2014-04-28', 87, NULL),
	(32, 1, '2014-04-28', 54, NULL),
	(33, 1, '2014-04-28', 98, NULL),
	(34, 1, '2014-04-28', 54, NULL),
	(35, 1, '2014-04-28', 54, NULL),
	(36, 1, '2014-04-28', 99.99, NULL),
	(37, 1, '2014-04-28', 87, NULL),
	(38, 1, '2014-05-05', 76, NULL),
	(39, 1, '2014-05-05', 65, NULL),
	(40, 1, '2014-05-05', 32, NULL),
	(41, 1, '2014-05-05', 99.99, NULL),
	(42, 1, '2014-05-05', 56, NULL),
	(43, 1, '2014-05-05', 54, NULL),
	(44, 1, '2014-05-05', 54, NULL),
	(45, 1, '2014-05-05', 99.99, NULL),
	(46, 1, '2014-05-05', 65, NULL),
	(47, 1, '2014-05-05', 65, NULL),
	(48, 1, '2014-05-05', 7, NULL),
	(49, 1, '2014-05-05', 54, NULL),
	(50, 1, '2014-05-05', 87, NULL),
	(51, 1, '2014-05-05', 99.99, NULL),
	(52, 1, '2014-05-05', 99.99, NULL),
	(53, 1, '2014-05-05', 54, NULL),
	(54, 1, '2014-05-05', 99.99, NULL),
	(55, 1, '2014-05-05', 54, NULL),
	(56, 1, '2014-05-05', 85, NULL),
	(57, 1, '2014-05-05', 99.99, NULL),
	(58, 1, '2014-05-05', 54, NULL),
	(59, 1, '2014-05-05', 99.99, NULL),
	(60, 1, '2014-05-05', 47, NULL),
	(61, 1, '2014-05-05', 87, NULL),
	(62, 1, '2014-05-05', 87, NULL),
	(63, 1, '2014-05-05', 99.99, NULL),
	(64, 1, '2014-05-05', 99.99, NULL),
	(65, 1, '2014-05-05', 5, NULL),
	(66, 1, '2014-05-05', 4, NULL),
	(67, 1, '2014-05-05', 87, NULL),
	(68, 1, '2014-05-08', 54, NULL),
	(69, 1, '2014-05-08', 54, NULL),
	(70, 1, '2014-05-08', 4, NULL),
	(71, 1, '2014-05-08', 87, NULL),
	(72, 1, '2014-05-08', 87, NULL),
	(73, 1, '2014-05-08', 54, NULL),
	(74, 1, '2014-05-08', 87, NULL),
	(75, 1, '2014-05-08', 54, NULL),
	(76, 1, '2014-05-09', 54, NULL),
	(77, 1, '2014-05-09', 54, NULL),
	(78, 1, '2014-05-09', 54, NULL),
	(79, 1, '2014-05-09', 54, NULL),
	(80, 1, '2014-05-09', 54, NULL),
	(81, 1, '2014-05-09', 54, NULL),
	(82, 1, '2014-05-09', 54, NULL),
	(83, 1, '2014-05-09', 54, NULL),
	(84, 1, '2014-05-09', 54, NULL),
	(85, 1, '2014-05-09', 54, NULL),
	(86, 1, '2014-05-09', 54, NULL),
	(87, 1, '2014-05-09', 54, NULL),
	(88, 1, '2014-05-09', 54, NULL),
	(89, 1, '2014-05-09', 54, NULL),
	(90, 1, '2014-05-09', 54, NULL),
	(91, 1, '2014-05-09', 54, NULL),
	(92, 1, '2014-05-09', 54, NULL),
	(93, 1, '2014-05-09', 54, NULL),
	(94, 1, '2014-05-09', 99.99, NULL),
	(95, 1, '2014-05-09', 99.99, NULL),
	(96, 1, '2014-05-09', 99.99, NULL),
	(97, 1, '2014-05-09', 99.99, NULL),
	(98, 1, '2014-05-09', 99.99, NULL),
	(99, 1, '2014-05-09', 99.99, NULL),
	(100, 1, '2014-05-09', 99.99, NULL),
	(101, 1, '2014-05-09', 99.99, NULL),
	(102, 1, '2014-05-09', 99.99, NULL),
	(103, 1, '2014-05-09', 99.99, NULL),
	(104, 1, '2014-05-09', 99.99, NULL),
	(105, 1, '2014-05-09', 99.99, NULL),
	(106, 1, '2014-05-09', 99.99, NULL),
	(107, 1, '2014-05-09', 99.99, NULL),
	(108, 1, '2014-05-09', 99.99, NULL),
	(109, 1, '2014-05-09', 99.99, NULL),
	(110, 1, '2014-05-09', 99.99, NULL),
	(111, 1, '2014-05-09', 99.99, NULL),
	(112, 1, '2014-05-09', 99.99, NULL),
	(113, 1, '2014-05-09', 99.99, NULL),
	(114, 1, '2014-05-09', 99.99, NULL),
	(115, 1, '2014-05-09', 99.99, NULL),
	(116, 1, '2014-05-12', 99.99, NULL),
	(117, 1, '2014-05-12', 99.99, NULL),
	(118, 1, '2014-05-12', 99.99, NULL),
	(119, 1, '2014-05-12', 99.99, NULL),
	(120, 1, '2014-05-12', 99.99, NULL),
	(121, 1, '2014-05-12', 99.99, NULL),
	(122, 1, '2014-05-12', 99.99, NULL),
	(123, 1, '2014-05-12', 99.99, NULL),
	(124, 1, '2014-05-12', 99.99, NULL),
	(125, 1, '2014-05-12', 99.99, NULL),
	(126, 1, '2014-05-12', 99.99, NULL),
	(127, 1, '2014-05-12', 99.99, NULL),
	(128, 1, '2014-05-12', 99.99, NULL),
	(129, 1, '2014-05-12', 99.99, NULL),
	(130, 1, '2014-05-12', 99.99, NULL),
	(131, 1, '2014-05-12', 99.99, NULL),
	(132, 1, '2014-05-12', 99.99, NULL),
	(133, 1, '2014-05-12', 99.99, NULL),
	(134, 1, '2014-05-12', 99.99, NULL),
	(135, 1, '2014-05-13', 99.99, NULL),
	(136, 3, '2014-05-15', 99.99, NULL),
	(137, 3, '2014-05-15', 99.99, NULL),
	(138, 3, '2014-05-15', 99.99, NULL),
	(139, 3, '2014-05-15', 99.99, NULL),
	(140, 3, '2014-05-15', 99.99, NULL),
	(141, 3, '2014-05-15', 99.99, NULL),
	(142, 3, '2014-05-15', 99.99, NULL);
/*!40000 ALTER TABLE `caixa` ENABLE KEYS */;

-- Copiando dados para a tabela pizzaria.categoria: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`codCategoria`, `nomeCategoria`, `imagemCategoria`, `estoque`) VALUES
	(1, 'Pizza Especial', NULL, NULL),
	(2, 'Pizza Tradicional', NULL, NULL);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Copiando dados para a tabela pizzaria.classificacao: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `classificacao` DISABLE KEYS */;
INSERT INTO `classificacao` (`codCliente`, `codProduto`, `dataVoto`, `nota`) VALUES
	(2, 6, '2014-04-25', 2),
	(2, 7, '2014-04-25', 2),
	(2, 12, '2014-04-25', 4),
	(13, 4, '2014-06-05', 5),
	(13, 7, '2014-06-05', 4),
	(13, 12, '2014-06-05', 1),
	(14, 13, '2014-04-25', 1);
/*!40000 ALTER TABLE `classificacao` ENABLE KEYS */;

-- Copiando dados para a tabela pizzaria.cliente: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`codCliente`, `nomeCliente`, `sobrenomeCliente`, `sexoCliente`, `enderecoCliente`, `bairroCliente`, `cidadeCliente`, `telefoneCliente`, `dataCadastro`) VALUES
	(2, 'Leonardo', 'Alves Freitas', 'M', 'Av. Fernando Costa; 982;', 'Parafuso', 'Cajati', '998885521', '2014-04-25'),
	(13, 'Pedro Luiz', 'de Souza Moreira', 'M', 'Bacuri;210;', 'Jardim Botujuru', 'Jacupiranga', '1397442247', '2014-05-25'),
	(14, 'João Batista', 'Da Silva', 'M', 'Brauna;45;', 'Pedreira', 'Registro', '(13) 3822-4656', '2014-06-03'),
	(15, 'Leonardo ', 'Arantes', 'M', 'Barretos;43;', 'Jd. São Paulo', 'Registro', '(13) 93882-3222', '2014-06-05'),
	(16, 'Guilherme', 'Pontes', 'M', 'Claudino Novaes;1007;casas', 'Inhuguvira', 'Cajati', '(13) 3854-3321', '2014-06-05');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Copiando dados para a tabela pizzaria.compra: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` (`codCompra`, `codCaixa`, `dataHoraCompra`, `valorTotal`) VALUES
	(2, 1, '2014-05-14 13:40:20', 15),
	(3, 1, '2014-05-14 13:40:36', 15.2);
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;

-- Copiando dados para a tabela pizzaria.conta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `conta` DISABLE KEYS */;
/*!40000 ALTER TABLE `conta` ENABLE KEYS */;

-- Copiando dados para a tabela pizzaria.empresa: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` (`nome`, `endereco`, `cidade`, `cep`, `email`, `telefone`, `logo`) VALUES
	('Pizzaria e Lanchonete Nobilis', 'Rua guará, Nº 262, Flor da Vila', 'Jacupiranga - SP', '11940-000', 'pizzarianobilis@gmail.com', '3864-2516', 'logo.png');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;

-- Copiando dados para a tabela pizzaria.estoque: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `estoque` DISABLE KEYS */;
/*!40000 ALTER TABLE `estoque` ENABLE KEYS */;

-- Copiando dados para a tabela pizzaria.fornecedor: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;

-- Copiando dados para a tabela pizzaria.funcionario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;

-- Copiando dados para a tabela pizzaria.historicomesa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `historicomesa` DISABLE KEYS */;
/*!40000 ALTER TABLE `historicomesa` ENABLE KEYS */;

-- Copiando dados para a tabela pizzaria.itemcompra: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `itemcompra` DISABLE KEYS */;
/*!40000 ALTER TABLE `itemcompra` ENABLE KEYS */;

-- Copiando dados para a tabela pizzaria.itemestoque: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `itemestoque` DISABLE KEYS */;
/*!40000 ALTER TABLE `itemestoque` ENABLE KEYS */;

-- Copiando dados para a tabela pizzaria.itemfornecido: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `itemfornecido` DISABLE KEYS */;
/*!40000 ALTER TABLE `itemfornecido` ENABLE KEYS */;

-- Copiando dados para a tabela pizzaria.itempedido: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `itempedido` DISABLE KEYS */;
INSERT INTO `itempedido` (`codPedido`, `codProduto`, `tamanho`, `quantidade`, `subtotal`, `observacao`, `bordaRecheada`) VALUES
	(3, 4, 'M', 2, 50.00, '', ''),
	(22, 7, 'P', 3, 60.00, '', 'Catupiry'),
	(22, 12, 'P', 1, 22.00, 'Sem queijo', 'Queijo'),
	(23, 4, 'M', 1, 28.00, '', 'Catupiry'),
	(24, 12, 'M', 3, 75.00, '', 'Queijo'),
	(25, 12, 'M', 3, 75.00, '', 'Queijo'),
	(26, 20, 'P', 3, 54.00, '', 'Queijo'),
	(27, 21, 'G', 2, 52.00, 'Com carinho', 'Catupiry');
/*!40000 ALTER TABLE `itempedido` ENABLE KEYS */;

-- Copiando dados para a tabela pizzaria.mesa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `mesa` DISABLE KEYS */;
/*!40000 ALTER TABLE `mesa` ENABLE KEYS */;

-- Copiando dados para a tabela pizzaria.pedido: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` (`codPedido`, `codFuncionario`, `codMesa`, `codCliente`, `dataHoraPedido`, `dataHoraEnvio`, `statusPedido`, `controlePedido`) VALUES
	(3, NULL, NULL, 13, '2014-04-17 16:43:26', '2014-04-22 13:04:21', 'Fechado', 3),
	(22, NULL, NULL, 13, '2014-06-02 14:37:51', NULL, 'Aberto', 1),
	(23, NULL, NULL, 13, '2014-06-04 12:48:48', NULL, 'Aberto', 1),
	(24, NULL, NULL, 15, '2014-06-05 14:19:02', NULL, 'Aberto', 1),
	(25, NULL, NULL, 15, '2014-06-05 14:23:01', NULL, 'Aberto', 1),
	(26, NULL, NULL, 15, '2014-06-05 14:30:09', NULL, 'Aberto', 1),
	(27, NULL, NULL, 16, '2014-06-05 16:55:26', NULL, 'Aberto', 1);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;

-- Copiando dados para a tabela pizzaria.produto: ~21 rows (aproximadamente)
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`codProduto`, `nomeProduto`, `descricaoProduto`, `marcaProduto`, `categoriaProduto`, `precoPequeno`, `precoNormal`, `precoGrande`, `estoque`, `cardapio`, `site`, `promocao`) VALUES
	(1, 'Pizza de Muzzarela', 'Muzzarela e Molho de Tomate', '', 'Pizza Tradicional', 17.50, 22.50, 27.00, 0, 1, 1, 0),
	(2, 'Refrigerante de Cola 600ml', 'Refrigerante que da para beber', '', 'Bebida', 0.00, 3.00, 0.00, 0, 1, 1, 0),
	(3, 'Pizza de Aliche', 'Muzzarela, Filés de anchovas, Rodelas de Tomate, Provolone', '', 'Pizza Tradicional', 18.00, 23.00, 30.00, 0, 1, 1, 0),
	(4, 'Pizza à Moda da Casa', 'Muzzarela, Presunto, Palmito, Catupiry e Parmesão', '', 'Pizza Especial', 20.00, 25.00, 30.00, 0, 1, 1, 1),
	(5, 'Pizza de Atum', 'Muzzarela, Atum e Molho de Tomate', '', 'Pizza Tradicional', 18.00, 23.00, 30.00, 0, 1, 1, 0),
	(6, 'Pizza de Bacon', 'Muzzarela e Bacon', '', 'Pizza Tradicional', 18.00, 23.00, 30.00, 0, 1, 1, 0),
	(7, 'Pizza Bela Itália', 'Muzzarela, Escarola, Palmito e Catupiry', '', 'Pizza Tradicional', 19.00, 24.00, 30.00, 0, 1, 1, 0),
	(8, 'Pizza de Brócolis com Catupiry', 'Muzzarela, Brócolis, Parmesão e Catupiry', '', 'Pizza Tradicional', 19.00, 24.00, 30.00, 0, 1, 1, 0),
	(9, 'Pizza de Calabresa', 'Muzzarela, Calabresa e Cebola', '', 'Pizza Tradicional', 19.00, 24.00, 30.00, 0, 1, 1, 0),
	(10, 'Pizza de Camarão', 'Muzzarela, Camarão e Catupiry', '', 'Pizza Tradicional', 19.00, 24.00, 30.00, 0, 1, 1, 0),
	(11, 'Pizza de Catupiry', 'Muzzarela e Catupiry', '', 'Pizza Tradicional', 17.50, 22.50, 27.00, 0, 1, 1, 0),
	(12, 'Pizza de 4 Queijos', 'Muzarela, Provolone, Parmesão e Catupiry', '', 'Pizza Tradicional', 19.00, 24.00, 30.00, 0, 1, 1, 0),
	(13, 'Pizza de 5 Queijos', 'Muzzarela, Provolone, Catupiry, Parmesão e Gorgonzola', '', 'Pizza Especial', 22.00, 27.00, 33.00, 0, 1, 1, 0),
	(14, 'Suco de Laranja', 'Com Água ou Leite', '', 'Bebida', 0.00, 4.00, 0.00, 0, 1, 1, 0),
	(15, 'Porção de Salame', 'Salame e Azeitona', '', 'Porção', 10.00, 12.50, 15.00, 0, 1, 1, 0),
	(16, 'Porção de Churrasquinho', 'Filé Mignon', '', 'Porção', 13.00, 15.50, 18.00, 0, 1, 1, 0),
	(17, 'Porção de Frios', 'Queijo, Presunto e Azeitona', '', 'Porção', 12.00, 14.50, 17.00, 0, 1, 1, 0),
	(18, 'Porção Mista', 'Salame, Azeitona, Ovo de Codorna, Queijo e Presunto', '', 'Porção', 14.00, 16.50, 18.50, 0, 1, 1, 0),
	(20, 'Pizza de Banana', 'Banana e Canela', '', 'Pizza Doce', 15.00, 17.00, 21.00, 0, 1, 1, 0),
	(21, 'Pizza de Banana com Chocolate', 'Banana, Chocolate e Canela', '', 'Pizza Doce', 17.00, 19.00, 23.00, 0, 1, 1, 0),
	(22, 'Pizza de Frango com Catupiry', 'Frango e Catupiry', '', 'Pizza Meio A Meio', 30.00, 45.00, 64.00, 0, 1, 1, 0);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;

-- Copiando dados para a tabela pizzaria.slider: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `slider` DISABLE KEYS */;
INSERT INTO `slider` (`codSlide`, `textoSlide`, `imagemSlide`) VALUES
	(1, '0', 'slide1.jpg'),
	(2, '0', 'slide1.png'),
	(3, '0', 'slide2.png');
/*!40000 ALTER TABLE `slider` ENABLE KEYS */;

-- Copiando dados para a tabela pizzaria.usuario: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`codCliente`, `emailUsuario`, `username`, `senhaUsuario`, `dataCadastro`, `token`, `url`, `confirmado`, `admin`) VALUES
	(16, 'almo.cocus@cocus.cocus', 'Almococus', 'b79417f42f786589eb990147b8f2e733b4eb27313e70b17173e4fa2aa3fcc6691b218fbab0bfd74825243300e9ee16a251f7115055713c5e3d96034c74d15fd5', '2014-06-05', '102695390cae6cba435.06555578', 'u=QWxtb2NvY3Vz&e=c73b45079885150ba1cd90dfc0dfb78e&t=102695390cae6cba435.06555578', 1, 0),
	(14, 'jbatista@gmail.com', 'jbatista', '273ddc3c0e7ca113f35ab5e4470866f5170c899222578691019fd3fe786b38f950f81c117381b8a16577c9916e954ed1bdbfd77d18237c9e19d726de7e7260e7', '2014-06-03', '31322538df9aad31925.19220140', 'u=amJhdGlzdGE=&e=e01238ebe2b5ac649c70402490349ff1&t=31322538df9aad31925.19220140', 1, 0),
	(15, 'leonardo.arantes28@hotmail.com', 'leonardo.arantes', 'afea3150063b86ddc373e72ad11490320c9c933ddfcbc56ede700ebf7c7a26302b763785d66cfbcd113c07667d79c8638d37c1d348dfb00c23251a782bacf4c8', '2014-06-05', '186025390a6137bd4e6.99433042', 'u=bGVvbmFyZG8uYXJhbnRlcw==&e=b691c4c4cdc6bd0f4e64337caef4b314&t=186025390a6137bd4e6.99433042', 1, 0),
	(13, 'pedrinluiz@gmail.com', 'pedroke', '273ddc3c0e7ca113f35ab5e4470866f5170c899222578691019fd3fe786b38f950f81c117381b8a16577c9916e954ed1bdbfd77d18237c9e19d726de7e7260e7', '2014-05-25', '274935382186e0a7970.59850800', 'u=cGVkcm9rZQ==&e=8358c00b63dff56f11235c1f6a084334&t=274935382186e0a7970.59850800', 1, 1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
