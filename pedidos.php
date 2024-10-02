<?php
session_start();
include_once ("classes/Pedido.php");
$Pedido = new Pedido();
$Pedido->SalvarPedidosEmAberto();
if (!$Pedido->numPedidos) {
    $_SESSION["mensagens"] = "Você não efetuou nenhum pedido!";
    header("location:index.php");
} else {
    include_once("header.php");
    ?>
<style>
   .t2 tr:last-child td{
        border-radius: 0px;        
    }
    </style>
    <body>
        <div class="main">
            <div class="content page1">
                <div class="container_12">
                    <div style="display:block;float:none;margin-left:60px;margin-bottom:50px;">
                        <h2>Seus pedidos atuais</h2>
                        <form action='action/cancelarPedidos.php' method='post' >
                            <table class="listing t2">
                                <tr>
                                    <th>Código</th>
                                    <th>Itens</th>
                                    <th>Horario do Pedido</th>
                                    <th>Horario de Envio</th>
                                    <th>Status</th>
                                    <th><input type='checkbox' id='checkAll' onclick='check(this);'></th>
                                    <th>Cancelar</th>
                                </tr>
                                <?php
                                $status = array("<text class='nrec'>Não recebido</text>", "<text class='rec'>Recebido</text>", "<text class='env'>Enviado</text>");
                                for ($i = 0; $i < count($Pedido->pedidosAbertos); $i++) {
                                    if ($i % 2) {
                                        print "<tr>";
                                    } else {
                                        print "<tr class='bg'>";
                                    }
                                    print "<td>" . $Pedido->pedidosAbertos[$i]["codPedido"] . "</td>";
                                    print "<td><a href='itens.php' class='simple-ajax-popup' onclick='setCodigo(" . $Pedido->pedidosAbertos[$i]["codPedido"] . ",2);'>Abrir</a></td>";
                                    print "<td>" . $Pedido->pedidosAbertos[$i]["dataHoraPedido"] . "</td>";
                                    print "<td>";
                                    if (isset($Pedido->pedidosAbertos[$i]["dataHoraEnvio"])) {
                                        print $Pedido->pedidosAbertos[$i]["dataHoraEnvio"];
                                    }
                                    print "</td>";
                                    print "<td>" . $status[$Pedido->pedidosAbertos[$i]["controlePedido"] - 1] . "</td>";

                                    if ($Pedido->pedidosAbertos[$i]["controlePedido"] == 1 or $Pedido->pedidosAbertos[$i]["controlePedido"] == 2) {
                                        print "<td><input type='checkbox' name='checkbox[]' value='" . $Pedido->pedidosAbertos[$i]["codPedido"] . "'></td>" .
                                                "<td><button class='btnX' name='pedido[]' value='" . $Pedido->pedidosAbertos[$i]["codPedido"] . "'></button></td>";
                                    } else {
                                        print "<td></td><td></td>";
                                    }
                                    print "</tr>";
                                }
                                ?>
                            </table>
                            <div class="mfp-hide popup-modal"></div>
                            <br>
                            <input type="submit" class="btnProceder" style="width:250px;" value="Cancelar Pedidos Selecionados">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php
    include_once 'footer.php';
}
?>

