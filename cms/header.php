<?php include_once '../classes/Pagina.php'; ?>
<head>
        <link rel="icon" href="../images/favicon.ico">
        <link rel="shortcut icon" href="../images/favicon.ico" />
    <link href="../css/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" >
    <link href="../css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="../css/froala_editor.css" rel="stylesheet" type="text/css">
    <link href="../css/cms.css" rel="stylesheet" type="text/css">
    <link href="../css/superfish.css" rel="stylesheet" type="text/css">
    <link href="../css/mensagem.css" rel="stylesheet" type="text/css">
    <link href="../css/grid.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/magnific-popup.css" />
    <link rel="stylesheet" href="../css/tablelisting.css">
    <link rel="stylesheet" href="../css/form.css">
    <script src="../js/jquery.js"></script>
    <script src="../js/jquery-migrate-1.1.1.js"></script>
    <script src="../js/jquery.easing.1.3.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/jquery.magnific-popup.js"></script>
    <script src="../js/formulario.js"></script>
    <script src="../js/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="../js/froala_editor.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/jquery.magnific-popup.js"></script>
    <script>  function callMensagem(mensagem, titulo) {
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
    <style>

        header {
            display: block;
            padding-top: 10px;
            position: relative;
            z-index: 999;
            background: #f2f0f0 ;
            padding-bottom: 5px;
            border-bottom: 1px solid #dddbdb;
            box-shadow: 0 1px 5px #ccc;
        }

        header h1 {
            float: none;
            position: relative;
            z-index: 999;
        }
        a {
            text-decoration: none;
            color: inherit;
            outline: none;
            transition: 0.5s ease;
            -o-transition: 0.5s ease;
            -webkit-transition: 0.5s ease;
        }

        header h1 a {
            display: block;
            overflow: hidden;
            margin: 0 auto;
            float: left;
            width:320px;
            height:100px;
            text-indent: -999px;
            transition: 0s ease;
            -o-transition: 0s ease;
            -webkit-transition: 0s ease;
            padding-bottom: 10px;
        }

        header h1 a img {
            display: block;	
            padding-bottom: 10px;
        }
        header img{
            width:320px;
            height:100px;
        }
    </style>     
    <title><?php echo $Pagina->titulo; ?></title>
    <meta charset="ISO-8859-1">
    <style>
         .sf-menu li a:hover,.sf-menu li a.current{
        background:#5FA022;
        color:#FFF;
        }
        
    </style>
</head>
<header class="admin">
    <div class="container_12" >
        <div class="grid_12">
            <h1><a href="index.php"><img src="../images/logoCMS.png" alt="Content Management System" ></a></h1>
            <div class="menu_block">
                <nav  class="" >
                    <ul class="sf-menu">					
                        <li><a href="box.php" class='current'>Box</a></li>
                        <li><a href="../index.php">Voltar</a></li>
                    </ul>
                </nav>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
 
</header>

