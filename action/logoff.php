<?php

session_start();
if (isset($_SESSION['usuarioLogado'])) {
    unset($_SESSION['usuarioLogado']);
    unset($_SESSION[$_SESSION['token']]);
    $_SESSION["mensagens"] = "Volte sempre! :)";
}
header("location:index.php"); //trocar por redirecionamento pra ultima pagina
