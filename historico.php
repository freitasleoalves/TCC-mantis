<?php
session_start();
include_once ("classes/Pedido.php");
$Pedido = new Pedido();
$Pedido->SalvarPedidosEfetuados();
if (!$Pedido->numPedidos) {
    $_SESSION["mensagens"] = "Você não recebeu nenhum pedido!";
    header("location:index.php");
} else {
    include_once("header.php");
    ?>

    <body>
        <div class="main">
            <div class="content page1">
                <div class="container_12">
                    <div style="display:block;float:none;margin-left:60px;min-height: 300px;">
                        <h2>Seu histórico</h2>
                        <table class="listing t2">
                            <tr>
                                <th>Código</th>
                                <th>Itens</th>
                                <th>Data do Pedido</th>
                                <th>Total</th>
                            </tr>
                            <?php
                            $status = array("<text class='nrec'>Não recebido</text>", "<text class='rec'>Recebido</text>", "<text class='env'>Enviado</text>");
                            for ($i = 0; $i < count($Pedido->pedidosEfetuados); $i++) {
                                if ($i % 2) {
                                    print "<tr>";
                                } else {
                                    print "<tr class='bg'>";
                                }
                                print "<td>" . $Pedido->pedidosEfetuados[$i]["codPedido"] . "</td>";
                                print "<td><a href='itens.php' class='simple-ajax-popup' onclick='setCodigo(" . $Pedido->pedidosEfetuados[$i]["codPedido"] . ",2);'>Abrir</a></td>";
                                print "<td>" . $Pedido->pedidosEfetuados[$i]["dataHoraPedido"] . "</td>";
                                print "<td>R$ " . number_format($Pedido->pedidosEfetuados[$i]["total"], 2, ',', '.') . "</td>";
                                print "</tr>";
                            }
                            ?>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php
    include_once 'footer.php';
}
?>
