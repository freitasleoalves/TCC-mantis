<?php

session_start();
include_once 'classes/Produto.php';
$Produto = new Produto();
$categoria = $Produto->ListarCategorias();
print_r($categoria);
