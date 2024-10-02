<?php
include_once 'header.php';
include_once 'classes/Produto.php';
include_once 'classes/box.php';
$Produto = new Produto();
$Box = new Box();
?>
<style>
    table.t3 th:first-child{
        max-width:150px;
    }
    div.table {background: #8FBA44;margin-bottom: 30px;}
    div.table img{position:absolute;float:left;background:#EF4A44;width:50px;height:50px;padding:5px;margin-left: -0px;}
    table.t3 td{vertical-align: middle;}
    table.t3{vertical-align: middle;width:auto;}
    table.t3 td span{vertical-align:central;}
</style>
<body>
    <div class="main">
        <div class="content"><div class="ic"></div>
            <div class="container_12">
                <?php
                $Box->codBox = 5;
                $Box->DefinirBox();
                ?>
                <div class="grid_12">
                    <h2><?php print $Box->titulo; ?></h2>
                    <?php print $Box->conteudo; ?>
                </div>

                <div id="wrap">
                    <?php
                    $categoria = $Produto->ListarCategorias();
                    for ($i = 0; $i < count($categoria); $i++) {
                        ?>
                    <div class="table">
                        <img src="images/produtos/<?php print $Produto->RetornarImagem($categoria[$i]); ?>">
                        <table class="listing t2 t3">
                            <tr>
                                <th><?php print $categoria[$i] ?></th>
                                <?php
                                if (preg_match("(Pizza|Porção)", $categoria[$i])) {
                                    print "<th>P</th><th>M</th><th>G</th>";
                                } else {
                                    print "<th>Preço</th>";
                                }
                                ?>
                            </tr>
                            <?php
                            $Produto->categoria = $categoria[$i];
                            $ds = $Produto->ListarProdutosSite();
                            for ($j = 0; $j < count($ds); $j++) {
                                ?>
                                <tr <?php
                                if ($j % 2) {
                                    print "class='bg'";
                                }
                                ?>>
                                    <td><?php print $ds[$j]["nomeProduto"]; ?></td>
                                    <?php
                                    if (preg_match("(Pizza|Porção)", $categoria[$i])) {
                                        print "<td>R$" . number_format($ds[$j]["precoPequeno"], 2, ',', '.') . "</td>";
                                        print "<td>R$" . number_format($ds[$j]["precoNormal"], 2, ',', '.') . "</td>";
                                        print "<td>R$" . number_format($ds[$j]["precoGrande"], 2, ',', '.') . "</td>";
                                    } else {
                                        print "<td>R$" . number_format($ds[$j]["precoNormal"], 2, ',', '.') . "</td>";
                                    }
                                    ?>
                                </tr>
                                <?php
                            }
                            print "</table></div>";
                        }
                        ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <?php include_once 'footer.php'; ?>
</body>
</html>