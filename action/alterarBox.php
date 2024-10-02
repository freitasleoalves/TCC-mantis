<?php

session_start();
if (isset($_POST['codBox']) and isset($_POST['titulo']) and isset($_POST['conteudo'])) {
    include_once '../classes/box.php';
    $Box = new Box();
    $Box->codBox = $_POST['codBox'];
    $Box->titulo = htmlentities($_POST['titulo'], ENT_QUOTES, "ISO-8859-1");
    $Box->conteudo = htmlentities($_POST['conteudo'], ENT_QUOTES, "ISO-8859-1");
    if ($Box->AlterarBox()) {
        $_SESSION["mensagens"] = "Box alterada com sucesso";
    } else {
        $_SESSION["mensagens"] = "Erro ao alterar a box";
    }
}
header("location:../cms/box.php");
