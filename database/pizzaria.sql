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

-- Copiando estrutura do banco de dados para pizzaria
DROP DATABASE IF EXISTS `pizzaria`;
CREATE DATABASE IF NOT EXISTS `pizzaria` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pizzaria`;


-- Copiando estrutura para tabela pizzaria.caixa
CREATE TABLE IF NOT EXISTS `caixa` (
  `codCaixa` int(10) NOT NULL AUTO_INCREMENT,
  `codFuncionario` int(10) DEFAULT NULL,
  `dataAtual` date DEFAULT NULL,
  `dinheiro` double DEFAULT NULL,
  PRIMARY KEY (`codCaixa`),
  KEY `codFuncionario` (`codFuncionario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela pizzaria.caixa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `caixa` DISABLE KEYS */;
/*!40000 ALTER TABLE `caixa` ENABLE KEYS */;


-- Copiando estrutura para tabela pizzaria.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `codCategoria` int(10) NOT NULL,
  `nomeCategoria` varchar(60) DEFAULT NULL,
  `imagemCategoria` varchar(60) DEFAULT NULL,
  `estoque` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`codCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela pizzaria.categoria: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`codCategoria`, `nomeCategoria`, `imagemCategoria`, `estoque`) VALUES
	(1, 'Pizza Especial', NULL, NULL),
	(2, 'Pizza Tradicional', NULL, NULL);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;


-- Copiando estrutura para tabela pizzaria.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `codCliente` int(10) NOT NULL AUTO_INCREMENT,
  `nomeCliente` varchar(50) DEFAULT NULL,
  `sobrenomeCliente` varchar(50) DEFAULT NULL,
  `sexoCliente` char(50) DEFAULT NULL,
  `enderecoCliente` varchar(50) DEFAULT NULL,
  `bairroCliente` varchar(50) DEFAULT NULL,
  `cidadeCliente` varchar(50) DEFAULT NULL,
  `telefoneCliente` varchar(50) DEFAULT NULL,
  `dataCadastro` date DEFAULT NULL,
  PRIMARY KEY (`codCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela pizzaria.cliente: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`codCliente`, `nomeCliente`, `sobrenomeCliente`, `sexoCliente`, `enderecoCliente`, `bairroCliente`, `cidadeCliente`, `telefoneCliente`, `dataCadastro`) VALUES
	(1, 'Pedro Luiz', 'de Souza Moreira', 'M', 'Rua Bacuri; 210;', 'Jardim Botujuru', 'Jacupiranga', '997442247', '2014-04-14');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


-- Copiando estrutura para tabela pizzaria.compra
CREATE TABLE IF NOT EXISTS `compra` (
  `codCompra` int(10) NOT NULL AUTO_INCREMENT,
  `codFuncionario` int(10) DEFAULT NULL,
  `codCaixa` int(10) DEFAULT NULL,
  `dataHoraCompra` datetime DEFAULT NULL,
  `valorTotal` double DEFAULT NULL,
  PRIMARY KEY (`codCompra`),
  KEY `codCaixa` (`codCaixa`),
  KEY `codFuncionario` (`codFuncionario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela pizzaria.compra: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;


-- Copiando estrutura para tabela pizzaria.conta
CREATE TABLE IF NOT EXISTS `conta` (
  `codConta` int(10) NOT NULL AUTO_INCREMENT,
  `codMesa` int(10) DEFAULT NULL,
  `codCliente` int(10) unsigned DEFAULT NULL,
  `codCaixa` int(10) DEFAULT NULL,
  `dataHoraConta` datetime DEFAULT NULL,
  `formaPagamento` varchar(50) DEFAULT NULL,
  `valorTotal` double DEFAULT NULL,
  `valorPago` double DEFAULT NULL,
  `statusPagamento` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codConta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela pizzaria.conta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `conta` DISABLE KEYS */;
/*!40000 ALTER TABLE `conta` ENABLE KEYS */;


-- Copiando estrutura para tabela pizzaria.estoque
CREATE TABLE IF NOT EXISTS `estoque` (
  `codEstoque` int(10) NOT NULL AUTO_INCREMENT,
  `descricaoEstoque` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codEstoque`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela pizzaria.estoque: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `estoque` DISABLE KEYS */;
/*!40000 ALTER TABLE `estoque` ENABLE KEYS */;


-- Copiando estrutura para tabela pizzaria.fornecedor
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `codFornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `cnpj` int(10) NOT NULL DEFAULT '0',
  `razaoSocial` varchar(255) DEFAULT NULL,
  `nomeFantasia` varchar(255) DEFAULT NULL,
  `ramoAtividade` varchar(400) DEFAULT NULL,
  `dadosBancarios` varchar(400) DEFAULT NULL,
  `enderecoFonecedor` varchar(255) DEFAULT NULL,
  `bairroFornecedor` varchar(255) DEFAULT NULL,
  `cidadeFornecedor` varchar(70) DEFAULT NULL,
  `ufFornecedor` varchar(50) DEFAULT NULL,
  `paisFornecedor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`codFornecedor`,`cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela pizzaria.fornecedor: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;


-- Copiando estrutura para tabela pizzaria.funcionario
CREATE TABLE IF NOT EXISTS `funcionario` (
  `codFuncionario` int(10) NOT NULL AUTO_INCREMENT,
  `rgFuncionario` int(10) DEFAULT NULL,
  `cpfFuncionario` varchar(50) DEFAULT NULL,
  `loginFuncionario` varchar(50) DEFAULT NULL,
  `senhaFuncionario` varchar(50) DEFAULT NULL,
  `nomeFuncionario` varchar(70) DEFAULT NULL,
  `sobrenomeFuncionario` varchar(70) DEFAULT NULL,
  `enderecoFuncionario` varchar(50) DEFAULT NULL,
  `bairroFuncionario` varchar(50) DEFAULT NULL,
  `cidadeFuncionario` varchar(50) DEFAULT NULL,
  `salarioFuncionario` double DEFAULT NULL,
  `cargoFuncionario` varchar(50) DEFAULT NULL,
  `telefoneFuncionario` varchar(50) DEFAULT NULL,
  `emailFuncionario` varchar(50) DEFAULT NULL,
  `celularFuncionario` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codFuncionario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela pizzaria.funcionario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;


-- Copiando estrutura para tabela pizzaria.historicomesa
CREATE TABLE IF NOT EXISTS `historicomesa` (
  `codHistorico` int(10) NOT NULL AUTO_INCREMENT,
  `codMesa` int(10) NOT NULL,
  `dataHoraAbertura` datetime NOT NULL,
  `dataHoraFechamento` datetime NOT NULL,
  PRIMARY KEY (`codHistorico`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela pizzaria.historicomesa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `historicomesa` DISABLE KEYS */;
/*!40000 ALTER TABLE `historicomesa` ENABLE KEYS */;


-- Copiando estrutura para tabela pizzaria.itemcompra
CREATE TABLE IF NOT EXISTS `itemcompra` (
  `codCompra` int(10) NOT NULL,
  `codProduto` int(10) NOT NULL,
  `tipoItem` varchar(50) DEFAULT NULL,
  `nomeItem` varchar(50) DEFAULT NULL,
  `valorItem` double DEFAULT NULL,
  `quantidade` int(10) DEFAULT NULL,
  KEY `codCompra` (`codCompra`),
  KEY `codProduto` (`codProduto`),
  CONSTRAINT `codCompra` FOREIGN KEY (`codCompra`) REFERENCES `compra` (`codCompra`) ON DELETE CASCADE,
  CONSTRAINT `codProduto` FOREIGN KEY (`codProduto`) REFERENCES `produto` (`codProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela pizzaria.itemcompra: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `itemcompra` DISABLE KEYS */;
/*!40000 ALTER TABLE `itemcompra` ENABLE KEYS */;


-- Copiando estrutura para tabela pizzaria.itemestoque
CREATE TABLE IF NOT EXISTS `itemestoque` (
  `codProduto` int(10) NOT NULL,
  `codEstoque` int(10) NOT NULL,
  `lote` varchar(50) DEFAULT NULL,
  `quantidade` int(10) DEFAULT NULL,
  `quantidadeMin` int(10) DEFAULT NULL,
  `dataValidade` date DEFAULT NULL,
  KEY `codProduto` (`codProduto`),
  KEY `codEstoque` (`codEstoque`),
  CONSTRAINT `Estoque` FOREIGN KEY (`codEstoque`) REFERENCES `estoque` (`codEstoque`) ON DELETE CASCADE,
  CONSTRAINT `Produto` FOREIGN KEY (`codProduto`) REFERENCES `produto` (`codProduto`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela pizzaria.itemestoque: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `itemestoque` DISABLE KEYS */;
/*!40000 ALTER TABLE `itemestoque` ENABLE KEYS */;


-- Copiando estrutura para tabela pizzaria.itemfornecido
CREATE TABLE IF NOT EXISTS `itemfornecido` (
  `codFornecimento` int(11) NOT NULL,
  `codFornecedor` int(11) DEFAULT NULL,
  `codProduto` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `lote` varchar(50) DEFAULT NULL,
  `dataHoraFornecimento` datetime DEFAULT NULL,
  PRIMARY KEY (`codFornecimento`),
  KEY `codFornecedor` (`codFornecedor`),
  KEY `codProduto` (`codProduto`),
  CONSTRAINT `Fornecedor` FOREIGN KEY (`codFornecedor`) REFERENCES `fornecedor` (`codFornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela pizzaria.itemfornecido: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `itemfornecido` DISABLE KEYS */;
/*!40000 ALTER TABLE `itemfornecido` ENABLE KEYS */;


-- Copiando estrutura para tabela pizzaria.itempedido
CREATE TABLE IF NOT EXISTS `itempedido` (
  `codPedido` int(10) NOT NULL,
  `codProduto` int(10) NOT NULL,
  `tamanho` char(1) NOT NULL DEFAULT 'M',
  `quantidade` int(2) DEFAULT NULL,
  `subtotal` decimal(4,2) DEFAULT NULL,
  `observacao` varchar(500) DEFAULT NULL,
  `bordaRecheada` varchar(50) DEFAULT NULL,
  KEY `codPedido` (`codPedido`),
  KEY `codProduto` (`codProduto`),
  KEY `tamanho` (`tamanho`),
  CONSTRAINT `FK_itempedido_pedido` FOREIGN KEY (`codPedido`) REFERENCES `pedido` (`codPedido`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela pizzaria.itempedido: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `itempedido` DISABLE KEYS */;
INSERT INTO `itempedido` (`codPedido`, `codProduto`, `tamanho`, `quantidade`, `subtotal`, `observacao`, `bordaRecheada`) VALUES
	(2, 12, 'M', 2, 48.00, '', ''),
	(3, 4, 'M', 2, 50.00, '', '');
/*!40000 ALTER TABLE `itempedido` ENABLE KEYS */;


-- Copiando estrutura para tabela pizzaria.mesa
CREATE TABLE IF NOT EXISTS `mesa` (
  `codMesa` int(10) NOT NULL,
  `statusMesa` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codMesa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela pizzaria.mesa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `mesa` DISABLE KEYS */;
/*!40000 ALTER TABLE `mesa` ENABLE KEYS */;


-- Copiando estrutura para tabela pizzaria.pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `codPedido` int(10) NOT NULL AUTO_INCREMENT,
  `codFuncionario` int(10) DEFAULT NULL,
  `codMesa` int(10) DEFAULT NULL,
  `codCliente` int(10) DEFAULT NULL,
  `dataHoraPedido` datetime DEFAULT NULL,
  `dataHoraEnvio` datetime DEFAULT NULL,
  `statusPedido` varchar(50) DEFAULT 'Aberto',
  `controlePedido` int(11) DEFAULT '1' COMMENT '1 = Não Recebido; 2 = Recebido; 3 = Enviado;',
  PRIMARY KEY (`codPedido`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela pizzaria.pedido: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` (`codPedido`, `codFuncionario`, `codMesa`, `codCliente`, `dataHoraPedido`, `dataHoraEnvio`, `statusPedido`, `controlePedido`) VALUES
	(2, NULL, NULL, 1, '2014-04-17 16:43:19', NULL, 'Aberto', 2),
	(3, NULL, NULL, 1, '2014-04-17 16:43:26', '2014-04-22 13:04:21', 'Aberto', 3);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;


-- Copiando estrutura para tabela pizzaria.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `codProduto` int(10) NOT NULL AUTO_INCREMENT,
  `nomeProduto` varchar(50) DEFAULT NULL,
  `descricaoProduto` varchar(400) DEFAULT NULL,
  `marcaProduto` varchar(50) DEFAULT NULL,
  `categoriaProduto` varchar(50) DEFAULT NULL,
  `precoPequeno` decimal(4,2) DEFAULT '0.00',
  `precoNormal` decimal(4,2) DEFAULT '0.00',
  `precoGrande` decimal(4,2) DEFAULT '0.00',
  `estoque` tinyint(4) DEFAULT '0',
  `cardapio` tinyint(4) DEFAULT '1',
  `site` tinyint(4) DEFAULT '1',
  `promocao` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`codProduto`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela pizzaria.produto: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`codProduto`, `nomeProduto`, `descricaoProduto`, `marcaProduto`, `categoriaProduto`, `precoPequeno`, `precoNormal`, `precoGrande`, `estoque`, `cardapio`, `site`, `promocao`) VALUES
	(1, 'Pizza de Muzzarela', 'Muzzarela e Molho de Tomate', '0.00', 'Pizza Tradicional', 17.50, 22.50, 27.00, 0, 1, 1, 0),
	(2, 'Refrigerante de Cola 600ml', 'Refrigerante que da para beber', '0.00', 'Bebida', 0.00, 3.00, 0.00, 0, 1, 1, 0),
	(3, 'Pizza de Aliche', 'Muzzarela, Filés de anchovas, Rodelas de Tomate, Provolone', '0.00', 'Pizza Tradicional', 18.00, 23.00, 30.00, 0, 1, 1, 0),
	(4, 'Pizza à Moda da Casa', 'Muzzarela, Presunto, Palmito, Catupiry e Parmesão', '0.00', 'Pizza Especial', 20.00, 25.00, 30.00, 0, 1, 1, 1),
	(5, 'Pizza de Atum', 'Muzzarela, Atum e Molho de Tomate', '0.00', 'Pizza Tradicional', 18.00, 23.00, 30.00, 0, 1, 1, 0),
	(6, 'Pizza de Bacon', 'Muzzarela e Bacon', '0.00', 'Pizza Tradicional', 18.00, 23.00, 30.00, 0, 1, 1, 0),
	(7, 'Pizza Bela Itália', 'Muzzarela, Escarola, Palmito e Catupiry', '0.00', 'Pizza Tradicional', 19.00, 24.00, 30.00, 0, 1, 1, 0),
	(8, 'Pizza de Brócolis com Catupiry', 'Muzzarela, Brócolis, Parmesão e Catupiry', '0.00', 'Pizza Tradicional', 19.00, 24.00, 30.00, 0, 1, 1, 0),
	(9, 'Pizza de Calabresa', 'Muzzarela, Calabresa e Cebola', '0.00', 'Pizza Tradicional', 19.00, 24.00, 30.00, 0, 1, 1, 0),
	(10, 'Pizza de Camarão', 'Muzzarela, Camarão e Catupiry', '0.00', 'Pizza Tradicional', 19.00, 24.00, 30.00, 0, 1, 1, 0),
	(11, 'Pizza de Catupiry', 'Muzzarela e Catupiry', '0.00', 'Pizza Tradicional', 17.50, 22.50, 27.00, 0, 1, 1, 0),
	(12, 'Pizza de 4 Queijos', 'Muzarela, Provolone, Parmesão e Catupiry', '0.00', 'Pizza Tradicional', 19.00, 24.00, 30.00, 0, 1, 1, 0),
	(13, 'Pizza de 5 Queijos', 'Muzzarela, Provolone, Catupiry, Parmesão e Gorgonzola', '0.00', 'Pizza Especial', 22.00, 27.00, 33.00, 0, 1, 1, 0),
	(14, 'Suco de Laranja', 'Com Aguá ou Leite', '0.00', 'Bebida', 0.00, 4.00, 0.00, 0, 1, 1, 0);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;


-- Copiando estrutura para tabela pizzaria.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `nomeUsuario` varchar(50) NOT NULL,
  `senhaUsuario` varchar(767) NOT NULL,
  `emailUsuario` varchar(50) NOT NULL,
  `codCliente` int(10) DEFAULT NULL,
  `dataCadastro` date DEFAULT NULL,
  `confirmado` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`nomeUsuario`,`senhaUsuario`,`emailUsuario`),
  KEY `codCliente` (`codCliente`),
  CONSTRAINT `FK_usuario_cliente` FOREIGN KEY (`codCliente`) REFERENCES `cliente` (`codCliente`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela pizzaria.usuario: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`nomeUsuario`, `senhaUsuario`, `emailUsuario`, `codCliente`, `dataCadastro`, `confirmado`) VALUES
	('pedroke', 'ab40834ad5c97d8bfb3b9a47a72b414a52324142852cdb988019820ff8a1bbed003fee14eca81caf6b71508fce4935f3b25698c4e35f4f748fff82c17e4f9b83 ', 'pedrinluiz@gmail.com', 1, '2014-04-17', 1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
