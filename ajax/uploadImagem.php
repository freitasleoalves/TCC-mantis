<?php

if (!empty($_FILES)) {
    include '../classes/uploadimagem.php';
    $upload = new UploadImagem();
    $response = array("link" => $upload->salvar("../upload/", $_FILES['img'], false));
    echo stripslashes(json_encode($response));
} else {
    header('location:index.php');
}