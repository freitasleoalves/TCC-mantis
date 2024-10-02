<?php

if (isset($_POST['codBox'])) {
    include_once '../classes/box.php';
    $Box = new Box();
    $Box->codBox = $_POST['codBox'];
    $Box->DefinirBox();
    $json = json_encode(array("codBox" => $Box->codBox, "titulo" => utf8_encode($Box->titulo), "conteudo" => utf8_encode($Box->conteudo), "imagem" => utf8_encode($Box->imagem)));
    if (isset($json)) {
        print $json;
    }
} else {
    header('location:index.php');
}
?>

