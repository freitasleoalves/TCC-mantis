<?php
include_once 'header.php';
include_once 'classes/box.php';
$Box = new Box();
?> 
<body>
    <div class="main">
        <!--==============================header=================================-->

        <div class="slider-relative">
            <div class="slider-block">
                <div class="slider">
                    <ul class="items">
                        <?php
                        include_once 'classes/slider.php';
                        $Slider = new Slider();
                        $slide = $Slider->ListarSlides();
                        for ($i = 0; $i < count($slide); $i++) {
                            ?>
                            <li><img src="images/<?php print $slide[$i]["imagemSlide"]; ?>" alt=""></li>
                        <?php } ?>
                    </ul>  
                </div>
            </div>
        </div>
        <!--=======content================================-->
        <div class="content page1" ><div class="ic"></div>
            <div class="container_12">
                <?php
                $Box->codBox = 1;
                $Box->DefinirBox();
                ?>
                <div class="grid_7">
                    <h2><?php print $Box->titulo; ?></h2>
                    <div class="page1_block col1">
                        <img src="images/<?php print $Box->imagem; ?>" alt="">
                        <div class="extra_wrapper">
                            <?php print $Box->conteudo; ?>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

                <?php
                $Box->codBox = 2;
                $Box->DefinirBox();
                ?>
                <div class="grid_5">
                    <h2><?php print $Box->titulo; ?></h2>
                    <?php print $Box->conteudo; ?>
                </div>

                <div class="clear"></div>

                <div class="grid_12">
                    <div class="hor_separator"></div>
                </div>
                <?php
                include_once 'classes/Produto.php';
                $Produto = new Produto();
                try {
                    ?>
                    <div class="grid_12">
                        <div class="car_wrap">
                            <h2>Melhores Pizzas</h2>
                            <a href="#" class="prev"></a><a href="#" class="next"></a>
                            <ul class="carousel1"  style="width:1200px;">
                                <?php
                                $produtos = $Produto->RetornarProdutosMaisVotados(8);
                                $index = 1;
                                foreach ($produtos as $prod) {
                                    ?>     
                                    <li>
                                        <p style="font-family: Times; font-size: 90px;padding:20px;margin-top:10px;margin-bottom:20px;">
                                            <?php
                                            if ($index == 1) {
                                                print "<text style='color:#DF5648'>#1</text>";
                                            } else {
                                                print "#$index";
                                            }
                                            $Produto->codProduto = $prod;
                                            $Produto->DefinirProduto();
                                            ?>
                                        </p>
                                        <div class="col1 upp"><?php print $Produto->nome; ?></div>
                                        <div class="desc"><?php print $Produto->descricao; ?></div>
                                        <div class="precos">
                                            <div class="price">R$ <?php print $Produto->precoP; ?></div>
                                            <div class="price">R$ <?php print $Produto->precoM; ?></div>
                                            <div class="price">R$ <?php print $Produto->precoG; ?></div>
                                        </div>
                                    </li>
                                    <?php
                                    $index++;
                                }
                            } catch (Exception $e) {
                                
                            }
                            ?>
                        </ul>
                    </div>

                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <br>
        </div>
    </div>
    <?php include_once 'footer.php'; ?>
</body>
</html>