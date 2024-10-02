<?php

session_start();
if (isset($_POST['user']) and isset($_POST['senha'])) {
    include_once '../classes/usuario.php';
    $Usuario = new Usuario();
    $Usuario->user = $_POST['user'];
    $Usuario->senha = $_POST['senha'];
    $Usuario->Logar();
}
header("location:index.php"); //trocar por redirecionamento pra ultima pagina
