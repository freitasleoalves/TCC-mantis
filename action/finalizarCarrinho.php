<script>
    function confirma() {
        var esco = window.confirm('Deseja proceder com a compra?');
        location.href = "finalizarCarrinho.php?p=" + esco;
    }
</script>
<?php
session_start();
if (isset($_SESSION[$_SESSION["token"]])) {
    if ($_SESSION['usuarioLogado']) {
        if (isset($_GET['p'])) {
            if ($_GET['p']) {
                include_once '../classes/Pedido.php';
                $Pedido = new Pedido();
                $Pedido->DefinirItens($_SESSION[$_SESSION["token"]]);
                $Pedido->EfetuarPedido();
                header("location:../delivery.php");
            } else {
                header("location:../carrinho.php");
            }
        } else {
            print "<script>confirma();</script>";
        }
    } else {
        $_SESSION["mensagens"] = "Voc� n�o est� logado. Fa�a login ou cadastre-se antes de prosseguir";
        header("location:../carrinho.php");
    }
} else {
    $_SESSION["mensagens"] = "Voc� n�o possui nenhum item para poder realizar o pedido";
    header("location:../carrinho.php");
}
?>

