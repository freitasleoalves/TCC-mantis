<div id="footer" class="container">
    <footer>    
        <div class="container_12">
            <div class="grid_12">
                <?php
                include_once '../classes/pagina.php';
                include_once '../classes/data.php';
                $Data = new Data();
                if (isset($_SESSION["mensagens"])) {
                    $mensagens = array($_SESSION["mensagens"]);
                    foreach ($mensagens as $mensagem) {
                        echo "<script>window.setTimeout(function(){	callMensagem('$mensagem','Mensagem')},800);</script>";
                    }
                    unset($_SESSION["mensagens"]);
                }
                ?>
                Pizza Mantis © <?php echo $Data->ano; ?>  &nbsp;&nbsp; |&nbsp;&nbsp;   <a href="#">Termos de Privacidade</a>    &nbsp;&nbsp;|&nbsp;&nbsp;  Desenvolvido por <a href="http://www.mantis.com/" rel="nofollow">Mantis.com</a><br>
            </div>
            <div class="clear"></div>
        </div>
    </footer>

</div>