<?php
session_start();
if (!count($_SESSION[$_SESSION["token"]])) {
    $_SESSION["mensagens"] = "Você ainda não possui nenhum item em seu carrinho!";
    header("location:index.php");
} else {
	include_once("header.php");
    include_once("classes/Carrinho.php");
    include_once("classes/Produto.php");
    $Carrinho = new Carrinho();
    $Produto = new Produto();
    ?>
    <body>
        <div class="main">
            <div class="content page1">
                <div class="container_12">
                    <h2>Seu Carrinho</h2>
                    <form action='action/removerItemCarrinho.php' method='post'>
                        <div>
                            <table class="listing" cellpadding="0" cellspacing="0">
                                <tr>
                                    <th>Nome</th>
                                    <th>Tamanho</th>
                                    <th>Quantidade</th>
                                    <th>Observação</th>
                                    <th>Borda Recheada</th>
                                    <th>Preco</th>
                                    <th>Subtotal</th>
                                    <th><input type="checkbox" id="checkAll" onclick="check(this);"></th>
                                    <th>Remover</th>
                                </tr>
                                <?php
                                for ($i = 0; $i < count($_SESSION[$_SESSION["token"]]); $i++) {
                                    $Carrinho->codProduto = $_SESSION[$_SESSION["token"]][$i][0];
                                    $Carrinho->tamanho = $_SESSION[$_SESSION["token"]][$i][1];
                                    if ($i % 2) {
                                        print "<tr>";
                                    } else {
                                        print "<tr class='bg'>";
                                    }
                                    ?>
                                    <td><?php print $Carrinho->MostrarNome(); ?></td> 
                                    <td><?php print $Carrinho->tamanho; ?></td> 
                                    <td><?php print $Carrinho->MostrarQuantidade(); ?></td>
                                    <td><?php  print $Carrinho->MostrarObservacao(); ?></td>
                                    <td><?php  print $Carrinho->MostrarBordaRecheada(); ?></td>
                                    <td>R$ <?php print number_format($Carrinho->MostrarPreco($Carrinho->tamanho), 2, ',', '.'); ?></td>
                                    <td>R$ <?php print number_format($Carrinho->MostrarSubtotal(), 2, ',', '.'); ?></td>
                                    <td><input type='checkbox' name='checkbox[]' value='<?php print  $Carrinho->codProduto . ";" . $Carrinho->tamanho; ?>'></td>
                                    <td><button class="btnX" name="item[]" value='<?php print  $Carrinho->codProduto . ";" . $Carrinho->tamanho; ?>'></button></td>
                                    </tr>           
                                    <?php
                                }
                                $Carrinho->CalcularTotal();
                                ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td><td></td>
                                    <td></td>
                                    <td><strong>Total</strong></td>
                                    <td>R$<?php print number_format($Carrinho->total, 2, ',', '.'); ?></td>
                                    <td></td><td></td>
                                </tr>
                            </table>
                            <input type='submit' name='Remover Selecionados' value='Remover Selecionados' class="btnRemover">
                        </div>
                        <a class="btnProceder" href='action/finalizarCarrinho.php'>Proceder Com a Compra</a>
                    </form>

                </div> 
            </div> 
        </div> 

    </body>
    <?php include_once 'footer.php';
} ?>
