<?php

header("charset=ISO-8859-1\n");
if (isset($_POST["codigo"]) and isset($_POST["quantidade"])) {
    session_start();
    include("../classes/Carrinho.php");
    $Carrinho = new Carrinho();
    $Carrinho->codProduto = $_POST["codigo"];
    $Carrinho->quantidade = $_POST["quantidade"];
    if (isset($_POST["observacao"])) {
        $Carrinho->observacao = $_POST["observacao"];
    }

    if (isset($_POST["bordaRecheada"])) {
        $Carrinho->bordaRecheada = $_POST["bordaRecheada"];
    }

    if (isset($_POST["tamanho"])) {
        $Carrinho->tamanho = $_POST["tamanho"];
    } else {
        $Carrinho->tamanho = "M";
    }

    $qtdAtual = $Carrinho->MostrarQuantidade();
    $Carrinho->ContarItensCarrinho();

    if ($Carrinho->quantidade > 7) {
        $_SESSION["mensagens"] = "Você não pode adicionar mais de 7 itens por produto.";
    } else {
        if ($qtdAtual == 7) {
            $_SESSION["mensagens"] = "Você já possui 7 itens no carrinho.";
        } elseif (( $qtdAtual + $Carrinho->quantidade) > 7) {
            $_SESSION["mensagens"] = "Você irá ultrapassar o permitido adicionando essa quantidade.";
        } elseif (($qtdAtual + $Carrinho->quantidadeItens) > 10) {
            $_SESSION["mensagens"] = "Você não pode adicionar mais de 10 itens no carrinho.";
        } else {
            $Carrinho->AdicionarItem();
            switch ($Carrinho->tamanho) {
                case "P": $tamanho = "pequeno";
                    break;
                case "M": $tamanho = "";
                    break;
                case "G": $tamanho = "grande";
                    break;
            }
            include_once '../classes/produto.php';
            $Produto = new Produto();
            $Produto->codProduto = $Carrinho->codProduto;
            $_SESSION["mensagens"] = "Você adicionou $Carrinho->quantidade do item: " . $Produto->MostrarNome() . " " . $tamanho;
        }
    }
}
header("location:../delivery.php");
?>
