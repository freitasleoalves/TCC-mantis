<?php

include("../classes/Carrinho.php");
session_start();
$Carrinho = new Carrinho();

if (isset($_POST['item'])) {
    print "ITEM REMOVIDO: ";
    $chunks = spliti(";", $_POST['item'][0], 2);
    print_r($chunks);
    $Carrinho->codProduto = $chunks[0];
    $Carrinho->tamanho = $chunks[1];
    $Carrinho->RemoverItem();
} elseif (isset($_POST['checkbox'])) {
    print "ITENS REMOVIDOS: ";
    for ($i = 0; $i < count($_POST['checkbox']); $i++) {
        $chunks = spliti(";", $_POST['checkbox'][$i], 2);
        print_r($chunks);
        $Carrinho->codProduto = $chunks[0];
        $Carrinho->tamanho = $chunks[1];
        $Carrinho->RemoverItem();
    }
}
if ($Carrinho->ContarItensCarrinho() == 0) {
    $_SESSION["mensagens"] = "Todos os itens foram removidos do carrinho.";
    header("location:index.php");
} else {
    $_SESSION["mensagens"] = "Item removido com sucesso!";
    header("location:../carrinho.php");
}
?>


