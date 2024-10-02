<?php

include_once('../classes/usuario.php');
$Usuario = new Usuario();
$Usuario->username = base64_decode($_GET['u']);
$emailMd5 = $_GET['e'];
$token = $_GET['t'];
$Usuario->ConfirmarUsuario($emailMd5, $token);



//Buscar os dados no banco
