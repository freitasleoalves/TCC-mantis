<?php

if (isset($_POST['usuario']) && isset($_POST['cliente'])) {
    session_start();
    include_once '../classes/usuario.php';
    $Usuario = new Usuario();
    $Usuario->username = $_POST['usuario']['username'];
    $Usuario->senha = $_POST['usuario']['senha'];
    $Usuario->emailUsuario = $_POST['usuario']['email'];
    if ($Usuario->CadastrarUsuario()) {
        include_once '../classes/cliente.php';
        function uc($str) {
           return ucwords(strtolower(iconv( 'UTF-8', 'ISO-8859-1//TRANSLIT', $str)));
        }
        $Cliente = new Cliente();
        $Cliente->nome = uc($_POST['cliente']['nome']);
        $Cliente->sobrenome = uc($_POST['cliente']['sobrenome']);
        $Cliente->sexo = uc($_POST['cliente']['sexo']);
        $Cliente->endereco = uc($_POST['cliente']['rua'] . ";" . $_POST['cliente']['numero'] . ";" . $_POST['cliente']['complemento']);
        $Cliente->bairro = uc($_POST['cliente']['bairro']);
        $Cliente->cidade = uc($_POST['cliente']['cidade']);
        $Cliente->telefone = $_POST['cliente']['telefone'];
        if ($Cliente->CadastrarCliente()) {
            $Usuario->codCliente = $Cliente->codCliente;
            $Usuario->ConfirmarUsuario2();
            print true;
        } else {
            print false;
        }
    } else {
        print false;
    }
} else {
    header('location:index.php');
}
?>
