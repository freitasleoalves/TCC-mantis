<?php

require_once 'Conexao.php';
require_once 'Usuario.php';

class Pedido extends Conexao {

    public $itens = array();
    public $pedidosAbertos = array();
    public $pedidosEfetuados = array();
    public $codPedido, $numPedidos, $codCliente;

    public function DefinirItens($itens) {
        $this->itens = array($itens);
    }

    public function EfetuarPedido() {
        if ($this->SalvarPedidosEmAberto()) {
            if ($this->numPedidos >= 3) {
                $_SESSION["mensagens"] = "Você já possui 3 pedidos em aberto, não pode fazer mais que isso por enquanto :(";
            } else {
                if ($this->CriarPedido()) {
                    if ($this->InserirItensPedido()) {
                        $_SESSION["mensagens"] = "Seu pedido foi registrado com sucesso!";
                        unset($_SESSION[$_SESSION["token"]]);
                    } else {
                        $_SESSION["mensagens"] = "Falha ao registrar os itens no pedido, tente novamente! :(";
                    }
                } else {
                    $_SESSION["mensagens"] = "Falha ao registrar seu pedido, tente novamente! :(";
                }
            }
        } else {
            $_SESSION["mensagens"] = "Você ainda não terminou seu cadastro :(";
        }
    }

    public function SalvarPedidosEmAberto() {
        if ($this->DefinirCliente()) {
            if ($this->Executar("SELECT codPedido,dataHoraPedido,controlePedido,dataHoraEnvio FROM Pedido WHERE codCliente =  $this->codCliente  AND statusPedido = 'Aberto';")) {
                $this->pedidosAbertos = $this->dataSet;
                $this->numPedidos = count($this->dataSet);
                return true;
            } else {
                $_SESSION["mensagens"] = "Você ainda não realizou nenhum pedido hoje";
                return false;
            }
        } else {
            $_SESSION["mensagens"] = "Você ainda não terminou seu cadastro";
            return false;
        }
    }

    public function SalvarPedidosEfetuados() {
        if ($this->DefinirCliente()) {
            if ($this->Executar("SELECT ped.codPedido, ped.dataHoraPedido,(SELECT SUM(subtotal) FROM itemPedido as ip WHERE ip.codPedido = ped.codPedido) as total FROM Pedido as ped WHERE ped.statusPedido = 'Fechado' AND ped.codCliente = $this->codCliente")) {
                $this->pedidosEfetuados = $this->dataSet;
                $this->numPedidos = count($this->dataSet);
                return true;
            } else {
                $_SESSION["mensagens"] = "Você ainda não efetuou nenhum pedido";
                return false;
            }
        } else {
            $_SESSION["mensagens"] = "Você ainda não terminou seu cadastro";
            return false;
        }
    }

    public function CancelarPedido() {
        if ($this->Executar("DELETE FROM Pedido WHERE codPedido = $this->codPedido")) {
            return true;
        } else {
            return false;
        }
    }

    public function CriarPedido() {
        if ($this->Executar("INSERT INTO Pedido (codCliente,dataHoraPedido) VALUES($this->codCliente ,SYSDATE());")) {
            $this->codPedido = $this->ultimoId;
            return true;
        } else {
            return false;
        }
    }

    public function InserirItensPedido() {
        if ($this->Executar($this->GerarSqlItensPedido())) {
            return true;
        } else {
            return false;
        }
    }

    public function GerarSqlItensPedido() {
        include_once 'carrinho.php';
        $Carrinho = new Carrinho();
        $sqlItens = "INSERT INTO ItemPedido VALUES";
        $Carrinho->ContarItensCarrinho();
        for ($i = 0; $i <= $Carrinho->qtdItens - 1; $i++) {
            $Carrinho->codProduto = $_SESSION[$_SESSION["token"]][$i][0];
            $Carrinho->tamanho = $_SESSION[$_SESSION["token"]][$i][1];
            if ($i == $Carrinho->qtdItens - 1) {
                $sqlItens .= "($this->codPedido," . $Carrinho->codProduto . ",'" . $Carrinho->tamanho . "'," . $Carrinho->MostrarQuantidade() . "," . $Carrinho->MostrarSubtotal() . ",'" . $Carrinho->MostrarObservacao() . "','" . $Carrinho->MostrarBordaRecheada() . "');";
            } else {
                $sqlItens .= "($this->codPedido," . $Carrinho->codProduto . ",'" . $Carrinho->tamanho . "'," . $Carrinho->MostrarQuantidade() . "," . $Carrinho->MostrarSubtotal() . ",'" . $Carrinho->MostrarObservacao() . "','" . $Carrinho->MostrarBordaRecheada() . "'),";
            }
        }
        return $sqlItens;
    }

    public function DefinirCliente() {
        include_once 'usuario.php';
        $Usuario = new Usuario();
        $Usuario->username = $_SESSION['usuarioLogado'];
        if ($Usuario->DefinirCliente()) {
            $this->codCliente = $Usuario->codCliente;
            return true;
        } else {
            return false;
        }
    }

    public function ListarItensPedido() {
        if ($this->Executar("SELECT pro.nomeProduto,ip.tamanho, ip.quantidade,ip.bordaRecheada,ip.observacao,ip.subtotal, SUM(subtotal) as total FROM Pedido as ped,itemPedido as ip, produto as pro WHERE ip.codPedido = ped.codPedido AND pro.codProduto = ip.codProduto AND ped.codPedido = $this->codPedido")) {
            $this->itens = $this->dataSet;
            return true;
        } else {
            return false;
        }
    }

}

?>