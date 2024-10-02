<?php
include_once 'header.php';
include_once 'classes/Produto.php';
$Produto = new Produto();
?>
<script>
    function setCategoria() {
        $.post('../pizzamantis/ajax/manipularCategoria.php', {categoria: $('#categoria').val()}, function() {
            location.reload();
        });
    }
</script>
<body>
    <div class="main">
        <div class="content page1">
            <div class="container_12" style="width:1100px;">
                <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
                    <div class="cbp-vm-options">
                        <select id="categoria" onchange="setCategoria();">
                            <?php
                            $categoria = $Produto->ListarCategorias();
                            print "<option value='*'>Todos os Produtos</option>";
                            if (!isset($_SESSION['categoria'])) {
                                for ($i = 0; $i < count($categoria); $i++) {
                                    print "<option value='$categoria[$i]'>$categoria[$i]</option>";
                                }
                            } else {
                                for ($i = 0; $i < count($categoria); $i++) {
                                    if ($_SESSION['categoria'] == $categoria[$i]) {
                                        print "<option selected='selected' value='$categoria[$i]'>$categoria[$i]</option>";
                                    } else {
                                        print "<option value='$categoria[$i]'>$categoria[$i]</option>";
                                    }
                                }
                            }
                            ?>
                        </select>  
                    </div>
                    <ul>

                        <?php
                        if (!isset($_SESSION['categoria']) or $_SESSION['categoria'] == '*') {
                            $Produto->categoria = null;
                        } else {
                            $Produto->categoria = $_SESSION['categoria'];
                        }
                        $arProduto = $Produto->ListarProdutosSite();
                        for ($i = 0; $i < count($arProduto); $i++) {
                            ?>
                            <li style="padding-bottom:10px;">
                                <div class="div-form" style="padding-top:0;padding-bottom:10px;">
                                    <h1 style="font-size:13pt;"><?php echo $arProduto[$i]["nomeProduto"]; ?></h1>
                                    <a class="cbp-vm-image" href="#" style="margin-top:5px;margin-bottom:5px;">
                                        <img style="width:160px;height:160px;border-radius:100%;background:#FFF;border:5px solid #FFBAA4;" src="images/produtos/<?php echo $Produto->RetornarImagem($arProduto[$i]["categoriaProduto"]); ?>">
                                    </a>
                                    <div class="cbp-vm-details">
                                        <h4  style="padding:20px"><?php echo $arProduto[$i]["descricaoProduto"]; ?></h4>
                                    </div>
                                    <div class="cbp-vm-price" style="margin-top:-5px;">                              
                                        <?php
                                        if (!preg_match("(Pizza|Porção)", $arProduto[$i]["categoriaProduto"])) {
                                            echo 'R$ ' . number_format($arProduto[$i]["precoNormal"], 2, ',', '.') . "<hr style='margin:.5em;border:none;'>";
                                        } else {
                                            echo 'P: R$ ' . number_format($arProduto[$i]["precoPequeno"], 2, ',', '.') . "<hr style='margin:.5em;border:none;'>";
                                            echo 'M: R$ ' . number_format($arProduto[$i]["precoNormal"], 2, ',', '.') . "<hr style='margin:.5em;border:none;'>";
                                            echo 'G: R$ ' . number_format($arProduto[$i]["precoGrande"], 2, ',', '.') . "<hr style='margin:.5em;border:none;'>";
                                        }
                                        ?>
                                    </div>  	
                                    <div class="cbp-vm-price" style="margin-top:-5px;">     
                                        <a class="simple-ajax-popup btnAdd" style="margin-bottom:20px; " onclick="setCodigo(<?php print $arProduto[$i]["codProduto"]; ?>, 1)
                                                            ;" href="add.php">Adicionar ao carrinho</a>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="js/classie.js"></script>
    <script src="js/cbpViewModeSwitch.js"></script>

</body>
<?php include_once 'footer.php'; ?>

