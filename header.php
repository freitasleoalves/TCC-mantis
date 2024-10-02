<?php include_once 'classes/Pagina.php'; ?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <title><?php echo $Pagina->titulo; ?></title>
        <meta charset="ISO-8859-1">
        <link rel="icon" href="images/favicon.ico">
        <link rel="shortcut icon" href="images/favicon.ico" />
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/tablelisting.css">
        <link rel="stylesheet" href="css/slider.css">
        <link rel="stylesheet" href="css/form.css">
        <link rel="stylesheet" href="css/mensagem.css">
        <link rel="stylesheet" type="text/css" href="css/component.css" />
        <link rel="stylesheet" href="css/slide.css" type="text/css" media="screen" />
        <link rel="stylesheet" type="text/css" href="css/magnific-popup.css" />
        <link rel="stylesheet" href="css/ui-lightness/jquery-ui-1.10.4.custom.min.css">
        <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
        <link href="css/froala_editor.css" rel="stylesheet" type="text/css">
        <script src="js/jquery.js"></script>
        <script src="js/jquery-migrate-1.1.1.js"></script>
        <script src="js/superfish.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/sForm.js"></script>
        <script src="js/jquery.carouFredSel-6.1.0-packed.js"></script>
        <script src="js/jquery.maskedinput.js"></script>
        <script src="js/tms-0.4.1.js"></script>
        <script src="js/modernizr.custom.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery.magnific-popup.js"></script>
        <script src="js/formulario.js"></script>
        <script src="js/jquery-ui-1.10.4.custom.min.js"></script>
        <script src="js/ajaxCod.js"></script>
        <script src="js/formularioCadastro.js"></script>
        <script src="js/slide.js" type="text/javascript"></script>
        <script src="js/froala_editor.min.js"></script>
        <script>
            $(window).load(function() {
                $('.slider')._TMS({
                    show: 0,
                    pauseOnHover: false,
                    prevBu: '.prev',
                    nextBu: '.next',
                    playBu: false,
                    duration: 800,
                    preset: 'fade',
                    pagination: true, //'.pagination',true,'<ul></ul>'
                    pagNums: false,
                    slideshow: 8000,
                    numStatus: false,
                    banners: false,
                    waitBannerAnimation: false,
                    progressBar: false
                });
                $('.carousel1').carouFredSel({auto: false, prev: '.prev', next: '.next', width: 960, items: {
                        visible: {min: 1,
                            max: 4
                        },
                        height: 'auto',
                        width: 240
                    }, responsive: false,
                    scroll: 1,
                    mousewheel: false,
                    swipe: {onMouse: false, onTouch: false}});
            });
            $(document).ready(function() {
                $('.popup-with-form').magnificPopup({
                    type: 'inline',
                    preloader: false,
                    focus: '#username',
                    showCloseBtn: false,
                    callbacks: {
                        beforeOpen: function() {
                            if ($(window).width() < 700) {
                                this.st.focus = false;
                            } else {
                                this.st.focus = '#username';
                            }
                        }
                    }
                });
                setTimeout(function() {
                    $('.simple-ajax-popup').magnificPopup({
                        type: 'ajax',
                        showCloseBtn: false
                    });
                }, 400);
            });

            function exibirMensagem() {
                $('#fechado').show();
            }

            function callMensagem(mensagem, titulo) {
                $.magnificPopup.open({items: {
                        src: "<div class='white-popup msg-box'>" +
                                "<div class='msg-titulo'>" + titulo + "</div>" +
                                "<div class='msg-mensagem'>" + mensagem + "</div>" +
                                "</div>",
                        type: 'inline',
                        closeOnBgClick: true
                    }
                });
            }

        </script>

    </head>
    <header> 
        <div class="container_12" >
            <div class="grid_12" style="width:1050px;">
                <h1><a href="index.php"><img src="images/logo.png" alt="PIZZAMANTIS"></a></h1>
                <div class="menu_block">
                    <nav  class="" >
                        <ul class="sf-menu">					
                            <li <?php if ($Pagina->titulo == 'Início') print "class='current'"; ?>><a href="index.php">Início</a></li>
                            <li <?php if ($Pagina->titulo == 'Sobre') print "class='current'"; ?>><a href="sobre.php">Sobre Nós</a></li>
                            <li <?php if ($Pagina->titulo == 'Cardápio') print "class='current'"; ?>><a href="cardapio.php">Cardápio</a></li>
                            <li <?php if ($Pagina->titulo == 'Delivery') print "class='current'"; ?>><a href="delivery.php">Delivery</a></li>
                            <li <?php if ($Pagina->titulo == 'Contato') print "class='current'"; ?>><a href="contato.php">Contato</a></li>
                            <?php
                            include_once 'classes/usuario.php';
                            $Usuario = new Usuario();
                            if (isset($_SESSION['usuarioLogado'])) {
                                $Usuario->username = $_SESSION['usuarioLogado'];
                                if ($Usuario->VerificarAdmin()) {
                                    print "<li><a href='cms/box.php'>CMS</a></li>";
                                }
                            }
                            ?>
                        </ul>
                    </nav>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </header>
    <div id="toppanel">
        <?php
        if (!isset($_SESSION["token"])) {
            $_SESSION["token"] = md5(uniqid(rand(), true));
            $_SESSION[$_SESSION["token"]] = array();
        } else {
            include_once 'classes/Carrinho.php';
            $Carrinho = new Carrinho();
            $Carrinho->CalcularTotal();
        }
        if (isset($Carrinho->total)) {
            $total = $Carrinho->total;
        } else {
            $total = 0;
        }
        ?>

        <div id="panel">
            <div class="content clearfix">
                <?php
                if (isset($_SESSION['usuarioLogado'])) {
                    if ($Usuario->DefinirCliente()) {
                        ?>
                        <div class='center cent'>
                            <h1><?php print $Usuario->nomeCliente; ?></h1>  aqui você pode ter acesso à:
                            <div class="clear"></div>
                            <a href="usuario.php" class="btnMenu">Suas Informações</a>
                            <a href="pedidos.php" class="btnMenu">Pedidos Atuais</a>
                            <a href="carrinho.php" class="btnMenu">Carrinho</a>
                            <a href="historico.php" class="btnMenu">Historico de Pedidos</a>
                        </div>
                    <?php } else { ?>
                        <div class='center cent'>
                            <h1><?php print $_SESSION['usuarioLogado']; ?></h1>
                            Você ainda não terminou seu cadastro, deseja re-enviar o e-mail de confirmação?
                            <a href="reenvio.php" class="btnMenu" style="padding-left:-50px;">Reenviar e-mail</a>
                        </div>
                    <?php } ?>

                <?php } else { ?>
                    <div class="left">
                        <h1>Bem vindo a pizzaria Nóbilis!</h1>
                        <h2>Delivey Online</h2>		
                        <p class="grey">Não é bom receber uma pizza quentinha sem sair do conforto de sua casa? Agora isso também é possivel através do nosso sistema de compras online!</p>
                        <p class="grey">Basta preencher uma vez seu cadastro e você pode fazer seus pedidos tranquilamente!</p>
                    </div>
                    <div class="left">
                        <form class="clearfix" action="action/login.php" method="post">
                            <h1>Já é cadastrado?</h1>
                            <div class="cent">
                                <label class="grey" for="log">Username ou Email:</label>
                                <input class="field" type="text" name="user" id="log" value="" size="23" />
                                <label class="grey" for="pwd">Senha:</label>
                                <input class="field" type="password" name="senha" id="pwd" size="23" />
                                <label><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> &nbsp;Remember me</label>
                                <div class="clear"></div>
                                <input type="submit" name="submit" value="Login" class="cbp-vm-icon cbp-vm-add bt_login" />
                                <a class="lost-pwd" href="#">Não consegue?</a>

                            </div>
                        </form>
                    </div>
                    <div class="left ">			
                        <h1>Ainda não é cadastrado?</h1>
                        <a href="#frmCadastroUsuario" class="popup-with-form btnMenu">Cadastre-se aqui!</a>
                        <a href="carrinho.php" class="btnMenu">Seu Carrinho</a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="tab" id="tab">
            <div id="fechado" style="display:none;">
                <p>O estabelecimento se encontra fechado, ou não está realizando delivery no momento</p>
            </div>
            <ul class="login">
                <li class="left">&nbsp;</li>
                <?php
                if (isset($_SESSION['usuarioLogado'])) {
                    if ($Usuario->DefinirCliente()) {
                        print "<li class='user'>Olá " . $Usuario->nomeCliente . "!</li>";
                    } else {
                        print "<li class='user'>Olá " . $_SESSION['usuarioLogado'] . "!</li>";
                    }
                    ?>
                    <li class="sep">|</li>
                    <li class="open"><a href="action/logoff.php">Logoff</a></li>
                    <li class="sep">|</li>
                    <li id="toggle">
                        <a id="open" class="open" href="#" >Total R$ <?php print number_format($total, 2, ',', '.'); ?></a>
                        <a id="close" style="display: none;" class="close" href="#">Fechar Painel</a>			
                    </li>
                <?php } else { ?>
                    <li class="user">Olá Visitante!</li>
                    <li class="sep">|</li>
                    <li><a href="carrinho.php" title="Clique para ir ao seu carrinho">Total R$ <?php print number_format($total, 2, ',', '.'); ?></a></li>
                    <li class="sep">|</li>
                    <li id="toggle">
                        <a id="open" class="open nao" href="#" >Login | Cadastrar</a>
                        <a id="close" style="display: none;" class="close" href="#">Fechar Painel</a>
                    </li>
                <?php } ?>
                <li class="right">&nbsp;</li>
            </ul> 
        </div> 
    </div>
    <?php
    include_once 'cadastroUsuario.php';
    include_once 'cadastroCliente.php';
    ?>

    <?php
    include_once 'classes/empresa.php';
    $Empresa = new Empresa();
    if (!$Empresa->VerificarDelivery()) {
        print "<script>	exibirMensagem(); </script>";
    }
    ?>

