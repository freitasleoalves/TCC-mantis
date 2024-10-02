<?php

include_once '../classes/Usuario.php';
$Usuario = new Usuario();
if (isset($_POST['username'])) {
	$Usuario->username = $_POST['username'];
	print $Usuario->VerificarExistenciaUsuario();
} elseif ($_POST['emailUsuario']) {
	$Usuario->emailUsuario = $_POST['emailUsuario'];
	print $Usuario->VerificarExistenciaEmail();
} else {
header('location:index.php');
}
