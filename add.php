<?php
session_start();
if (!isset($_SESSION["codProduto"])) {
    //header("location:index.php");
} else {
    include_once "classes/Produto.php";
    $Produto = new Produto();
    $Produto->codProduto = $_SESSION["codProduto"];
    unset($_SESSION["codProduto"]);
    $Produto->DefinirProduto();
    ?>
    <form action="action/addItem.php" id="addItem" method="post" >
        <?php
        if (isset($Produto->precoP)) {
            print "<script>precoP = $Produto->precoP;</script>";
        }
        if (isset($Produto->precoM)) {
            print "<script>precoM = $Produto->precoM;</script>";
        }
        if (isset($Produto->precoG)) {
            print "<script>precoG = $Produto->precoG;</script>";
        }
        print "<script>bordaRecheada = 3;</script>";
        ?>
        <div class="div-form">
            <fieldset>
                <input type='hidden' name='codigo' value='<?php echo $Produto->codProduto; ?>'>
                <h1>Adicionar <?php echo $Produto->nome ?></h1>
                <div class="conteiner">
                    <label>Descrição</label>
                    <div id="descricao" class="descricao">
                        <?php
                        if (isset($Produto->descricao)) {
                            echo $Produto->descricao;
                        } else {
                            echo "Produto sem descrição";
                        }
                        ?>
                    </div> 
                </div>
                <?php if (preg_match("(Pizza)", $Produto->categoria)) { ?>
                    <div class="conteiner">
                        <label for="bordaRecheada">Borda Recheada</label> 
                        <select id="bordaRecheada" name="bordaRecheada">
                            <option selected="selected" value="">Nenhuma</option>
                            <option value="Catupiry">Catupiry R$3,00</option>
                            <option value="Queijo">Queijo R$3,00</option>
                            <option value="Chocolate">Chocolate R$3,00</option>
                            <option value="Goiabada">Goiabada R$3,00</option>
                        </select>
                    </div>
                <?php } ?>
                <div class="conteiner">
                    <label for="observacao">Observação</label> 
                    <textarea id="observacao" name='observacao'></textarea>
                </div>
                <div class="conteiner">
                    <div class="preco">
                        <?php
                        if (preg_match("(Pizza|Porção)", $Produto->categoria)) {
                            ?>               
                            <input type="radio" class="tamanho" name="tamanho" value="P">P: <?php echo 'R$ ' . number_format($Produto->precoP, 2, ',', '.'); ?><hr style="margin:1px;border:none;">
                            <input type="radio" class="tamanho" checked="checked" name="tamanho" value="M">M: <?php echo 'R$ ' . number_format($Produto->precoM, 2, ',', '.'); ?><hr style="margin:1px;border:none;"> 
                            <input type="radio" class="tamanho" name="tamanho" value="G">G: <?php echo 'R$ ' . number_format($Produto->precoG, 2, ',', '.'); ?><hr style="margin:1px;border:none;">
                        <?php } ?>
                    </div>
                </div>
                <div class="conteiner" id="right" <?php if(!preg_match("(Pizza|Porção)", $Produto->categoria)) print "style='margin-left:30px;'"?>>
                    <script>
                        $("#spinner").spinner();
                    </script>
                    <input id="spinner" class="spinner" name='quantidade' min="1" max="6" value="1" readonly>
                    <input type='submit' class="cbp-vm-icon cbp-vm-add" onclick="document.forms['addItem'].submit();" value='+'> 
                </div>
                <div class="conteiner total">
                    TOTAL R$:<div id="total"><?php echo number_format($Produto->precoM, 2, ',', '.'); ?></div>
                </div>
            </fieldset>
        </div>
    </form>

<?php } ?>
<script src="js/priceFormat.js" type="text/javascript"></script>
<script>
                    function calcularTotal() {
                        var total = 0;
                        if ($('input:radio.tamanho').length) {
                            $('input:radio.tamanho').each(function() {
                                if ($(this).is(':checked')) {
                                    switch ($(this).val()) {
                                        case "P":
                                            total = precoP;
                                            break;
                                        case "M":
                                            total = precoM;
                                            break;
                                        case "G":
                                            total = precoG;
                                            break;
                                        default:
                                            total = precoM;
                                            break;
                                    }
                                }
                            });
                        } else {
                            total = precoM;
                        }

                        $('#bordaRecheada').each(function() {
                            if ($(this).find('option:selected').val() !== '') {
                                total += bordaRecheada;
                            }
                        });

                        total *= $('#spinner').val();

                        if ((parseFloat(total) === parseInt(total)) && !isNaN(total)) {
                            $('#total').html(total + '00');
                        }
                        else {
                            $('#total').html(total + '0');
                        }
                        $('#total').priceFormat({
                            prefix: '',
                            centsSeparator: ',',
                            thousandsSeparator: ''
                        });

                    }

                    $('input:radio.tamanho').change(function() {
                        calcularTotal();
                    });
                    $('#bordaRecheada').change(function() {
                        calcularTotal();
                    });
                    $('.ui-spinner-button').click(function() {
                        setInterval(function() {
                            calcularTotal();
                        }, 10);
                    });
</script>     