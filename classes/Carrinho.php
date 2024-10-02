<?php

require_once 'Produto.php';

Class Carrinho extends Produto {

    public $quantidade, $subtotal, $tamanho, $observacao, $bordaRecheada;
    public $posicao = 0, $quantidadeItens = 0, $total = 0;

    public function ProcurarPosicao() {
        if (isset($_SESSION[$_SESSION["token"]])) {
            for ($i = 0; $i < count($_SESSION[$_SESSION["token"]]); $i++) {
                if ($_SESSION[$_SESSION["token"]][$i][0] == $this->codProduto and $_SESSION[$_SESSION["token"]][$i][1] == $this->tamanho) {
                    $this->posicao = $i;
                    return TRUE;
                }
            }
        } else {
            return FALSE;
        }
    }

    public function MostrarQuantidade() {
        $this->ProcurarPosicao();
        if (isset($_SESSION[$_SESSION["token"]][$this->posicao][2])) {
            return $_SESSION[$_SESSION["token"]][$this->posicao][2];
        } else {
            return 1;
        }
    }

    public function MostrarSubtotal() {
        $this->ProcurarPosicao();
        return $_SESSION[$_SESSION["token"]][$this->posicao][3];
    }

    public function MostrarObservacao() {
        $this->ProcurarPosicao();
        return $_SESSION[$_SESSION["token"]][$this->posicao][4];
    }

    public function MostrarBordaRecheada() {
        $this->ProcurarPosicao();
        return $_SESSION[$_SESSION["token"]][$this->posicao][5];
    }

    public function ContarItensCarrinho() {
        if (isset($_SESSION[$_SESSION["token"]])) {
            $quantidade = 0;
            for ($i = 0; $i < count($_SESSION[$_SESSION["token"]]); $i++) {
                $quantidade += $_SESSION[$_SESSION["token"]][$i][2];
            }
            $this->quantidadeItens = $quantidade;
            $this->qtdItens = count($_SESSION[$_SESSION["token"]]);
            return $quantidade;
        } else {
            return 0;
        }
    }

    public function CalcularSubtotal() {
        if (isset($this->bordaRecheada) and $this->bordaRecheada !== "") {
            $despesa = 3 * $this->quantidade;
        } else {
            $despesa = 0;
        }
        print $this->subtotal = ($this->quantidade * $this->MostrarPreco($this->tamanho)) + $despesa;
    }

    public function AdicionarItem() {
        $this->CalcularSubtotal();
        if (!isset($this->observacao) and !isset($this->bordaRecheada)) {
            $this->observacao = "";
            $this->bordaRecheada = "";
        } elseif (!isset($this->bordaRecheada) and isset($this->observacao)) {
            $this->bordaRecheada = "";
        } elseif (!isset($this->observacao) and isset($this->bordaRecheada)) {
            $this->observacao = "";
        }
        $item = array($this->codProduto, $this->tamanho, $this->quantidade, $this->subtotal, $this->observacao, $this->bordaRecheada);
        if (!$this->ProcurarPosicao() or !count($_SESSION[$_SESSION["token"]])) {
            $_SESSION[$_SESSION["token"]][] = $item;
        } else {
            $_SESSION["mensagens"] = "Você já possui " . $this->MostrarQuantidade() . " desse item ($this->codProduto) no tamanho $this->tamanho <br>";
        }
    }

    public function RemoverItem() {
        $this->ProcurarPosicao();
        unset($_SESSION[$_SESSION["token"]][$this->posicao]);
        $_SESSION[$_SESSION["token"]] = array_values($_SESSION[$_SESSION["token"]]);
    }

    function CalcularTotal() {
        $total = 0;
        if (isset($_SESSION[$_SESSION["token"]])) {
            for ($i = 0; $i < count($_SESSION[$_SESSION["token"]]); $i++) {
                $total += $_SESSION[$_SESSION["token"]][$i][3];
            }
        }
        $this->total = $total;
    }

}

?>
