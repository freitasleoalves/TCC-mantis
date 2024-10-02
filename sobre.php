<?php
include_once 'header.php';
include_once 'classes/box.php';
$Box = new Box();
?>
<body>
    <div class="main">
        <div class="content"><div class="ic"></div>
            <div class="container_12">

                <div class="grid_5">
                    <?php
                    $Box->codBox = 3;
                    $Box->DefinirBox();
                    ?>
                    <h2><?php print $Box->titulo; ?></h2>
                    <img src="images/<?php print $Box->imagem; ?>" alt="" class="img_inner">
                    <?php print $Box->conteudo; ?>
                </div>

                <div class="grid_5 prefix_2">
                    <?php
                    $Box->codBox = 4;
                    $Box->DefinirBox();
                    ?>
                    <h2><?php print $Box->titulo; ?></h2>
                    <ul class="carousel2">
                        <li>
                            <blockquote>
                                <img src="images/<?php print $Box->imagem; ?>" alt="">
                                <?php print $Box->conteudo; ?>
                            </blockquote>
                        </li>
                    </ul>

                </div>
                <div class="clear"></div>
                <!--
                <div class="grid_12">
                    <div class="hor_separator hor1"></div>
                    <h2 class="head1">Our Best Chefs</h2>
                </div>
                <div class="clear"></div>
                <div class="chefs">
                    <div class="grid_3">
                        <img src="images/page2_img3.jpg" alt="" class="img_inner">
                        <p class="col1"><a href="#">Ann Franklin</a></p>Nulla pellentesque tempus quam nec porta. Donec nec lorem enim. Aenean velit velit, faucibus sed porta quis, gt er semper ac elit. Aliquam hendrerit mo lestie turpis condimentum tristique. Fty aliquam malesuada orci a massa yht. semper sed interdum arcu 
                    </div>
                    <div class="grid_3">
                        <img src="images/page2_img4.jpg" alt="" class="img_inner">
                        <p class="col1"><a href="#">Milisa Dayemond</a></p>Lorem ipsum pellentesque tempus quam nec porta. Donec nec lorem enim. Aenean velit velit, faucibus sed porta quis, gt er semper ac elit. Aliquam hendrerit mo lestie turpis condimentum tristique. Fty aliquam malesuada orci a massa iaculis. Integer a diam a odio. 
                    </div>
                    <div class="grid_3">
                        <img src="images/page2_img5.jpg" alt="" class="img_inner">
                        <p class="col1"><a href="#">Liza Croft</a></p>Aenean velittempus quam nec porta. Donec nec lorem enim. Aenean velit velit, faucibus sed porta quis, gt er semper ac elit. Aliquam hendrerit mo lestie turpis condimentum tristique. Fty aliquam malesuada orci a massa yht. semper sed interdum.   
                    </div>
                    <div class="grid_3">
                        <img src="images/page2_img6.jpg" alt="" class="img_inner">
                        <p class="col1"><a href="#">Alan Soares</a></p>
                       
                    </div>
                </div>
            </div>-->
                <div class="clear"></div>

            </div>
        </div>
    </div>
    <?php include_once 'footer.php'; ?>
</body>
</html>