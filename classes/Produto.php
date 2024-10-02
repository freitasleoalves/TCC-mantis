<?php

require_once 'Conexao.php';

class Produto extends Conexao {

    public $codProduto, $nome, $descricao, $categoria, $precoP, $precoM, $precoG;

    public function MostrarNome() {
        $this->Executar("SELECT nomeProduto FROM produto WHERE codProduto =" . $this->codProduto);
        return mysql_result($this->result, 0, "nomeProduto");
    }

    public function MostrarDescricao() {
        $this->Executar("SELECT descricaoProduto FROM produto WHERE codProduto =" . $this->codProduto);
        return mysql_result($this->result, 0, "descricaoProduto");
    }

    public function MostrarPreco($tamanho) {
        $this->Executar("SELECT precoPequeno, precoNormal, precoGrande FROM produto WHERE codProduto =" . $this->codProduto);
        $produto = $this->dataSet;
        switch ($tamanho) {
            case "P": $preco = $produto[0]["precoPequeno"];
                break;
            case "M": $preco = $produto[0]["precoNormal"];
                break;
            case "G": $preco = $produto[0]["precoGrande"];
                break;
        }
        return $preco;
    }

    public function RetornarImagem($categoria) {
        switch ($categoria) {
            case "Pizza Tradicional":
                $img = "pizza_tradicional.png";
                break;
            case "Pizza Especial":
                $img = "pizza_especial.png";
                break;
            case "Pizza Doce":
                $img = "pizza_doce.png";
                break;
                case "Pizza Meio A Meio":
                $img = "pizza_meio_a_meio.png";
                break;
            case "Porção":
                $img = "porcao.png";
                break;
            case "Bebida":
                $img = "10.png";
                break;
            default :
                $img = "10.png";
                break;
        }
        return $img;
    }

    public function RetornarProdutosMaisVotados($quantidade) {
        try {
            $this->Executar("SELECT codProduto FROM classificacao GROUP BY codProduto ORDER BY AVG(nota) DESC LIMIT $quantidade;");
            for ($i = 0; $i < mysql_num_rows($this->result); $i++) {
                $produtos[$i] = mysql_result($this->result, $i, 0);
            }
            return $produtos;
        } catch (Exception $E) {
            print $E;
            return false;
        }
    }

    public function RetornarPizzaDoMes() {
        $sql = "SELECT codProduto FROM classificacao WHERE YEAR(dataVoto) = YEAR(SYSDATE()) AND MONTH(dataVoto) = MONTH(SYSDATE()) GROUP BY codProduto ORDER BY AVG(nota) DESC LIMIT 1;";
    }

    public function RetornarMedia() {
        $sql = "SELECT AVG(nota) as 'media' FROM classificacao WHERE codProduto =" . $this->codProduto;
    }

    public function ListarCategorias() {
        if ($this->Executar("SELECT DISTINCT categoriaProduto FROM produto WHERE site = TRUE ORDER BY categoriaProduto DESC")) {
            return $this->dataSetNum;
        } else {
            return;
        }
    }

    public function ListarProdutosSite() {
        if (!isset($this->categoria)) {
            $this->Executar("SELECT * FROM produto WHERE site = TRUE ORDER BY nomeProduto ASC");
        } else {
            $this->Executar("SELECT * FROM produto WHERE site = TRUE AND categoriaProduto = '$this->categoria' ORDER BY nomeProduto ASC");
        }
        return $this->dataSet;
    }

    public function ListarProdutosCardapio() {
        if (!isset($this->categoria)) {
            $this->Executar("SELECT * FROM produto WHERE cardapio = TRUE ORDER BY nomeProduto ASC");
        } else {
            $this->Executar("SELECT * FROM produto WHERE cardapio = TRUE AND categoriaProduto = '$this->categoria' ORDER BY nomeProduto ASC");
        }
        return $this->result;
    }

    public function DefinirProduto() {
        if ($this->Executar("SELECT * FROM produto WHERE codProduto = $this->codProduto")) {
            $produto = $this->dataSet;
            $this->nome = $produto[0]["nomeProduto"];
            $this->descricao = $produto[0]["descricaoProduto"];
            $this->categoria = $produto[0]["categoriaProduto"];
            $this->precoP = $produto[0]["precoPequeno"];
            $this->precoM = $produto[0]["precoNormal"];
            $this->precoG = $produto[0]["precoGrande"];
        }
    }

}
