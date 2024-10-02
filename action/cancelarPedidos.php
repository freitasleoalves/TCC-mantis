<?php

session_start();
include_once("../classes/Pedido.php");
$Pedido = new Pedido();
if (isset($_POST['pedido'])) {
    $Pedido->codPedido = $_POST['pedido'][0];
    if ($Pedido->CancelarPedido()) {
        $_SESSION["mensagens"] = "Pedido cancelado com exito";
    } else {
        $_SESSION["mensagens"] = "Falha ao cancelar";
    }
} elseif (isset($_POST['checkbox'])) {
    $cont = 0;
    for ($i = 0; $i < count($_POST['checkbox']); $i++) {
        $Pedido->codPedido = $_POST['checkbox'][$i];
        if (!$Pedido->CancelarPedido()) {
            $cont++;
            $_SESSION["mensagens"] = "Falha ao cancelar o pedido $Pedido->codPedido";
        }
    }
    if ($cont) {
        $_SESSION["mensagens"] = "Nem todos os pedidos requisitados foram cancelados";
    }
    else{
        $_SESSION["mensagens"] = "Pedidos cancelados com exito";
    }
}
header("location:../pedidos.php");
?>
