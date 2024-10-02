<?php
session_start();
if (!isset($_SESSION["codPedido"])) {
    header("location:index.php");
} else {
    include_once "classes/Pedido.php";
    $Pedido = new Pedido();
    $Pedido->codPedido = $_SESSION["codPedido"];
    unset($_SESSION["codPedido"]);
}
$Pedido->ListarItensPedido();
$item = $Pedido->itens;
?>
<div class="div-form" style='width:750px;margin-left:-425px;'>
    <h2>Detalhes do pedido <b><?php print $Pedido->codPedido; ?></b></h2>
    <table class="listing popup">
        <tr>
            <th>Nome</th>
            <th>Tamanho</th>
            <th>Quantidade</th>
            <th>Observação</th>
            <th>Borda Recheada</th>
            <th>Subtotal</th>
        </tr>
        <?php
        for ($i = 0; $i < count($item); $i++) {
            ?>
            <tr <?php
            if ($i % 2 == 0) {
                print "class='bg'";
            }
            ?>>
                <td><?php print $item[$i]["nomeProduto"]; ?></td>
                <td><?php print $item[$i]["tamanho"]; ?></td>
                <td><?php print $item[$i]["quantidade"]; ?></td>
                <td><?php print $item[$i]["observacao"]; ?></td>
				<td><?php print $item[$i]["bordaRecheada"]; ?></td>
                <td>R$<?php print number_format($item[$i]["subtotal"], 2, ',', '.'); ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>R$<?php print number_format($item[$i]["total"], 2, ',', '.'); ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
