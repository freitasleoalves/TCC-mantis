<?php
session_start();
if (isset($_POST['codProduto'])) {
    if (isset($_SESSION["codProduto"])) {
        unset($_SESSION["codProduto"]);
    }
    $_SESSION["codProduto"] = $_POST['codProduto'];
} elseif (isset($_POST['codPedido'])) {
    if (isset($_SESSION["codPedido"])) {
        unset($_SESSION["codPedido"]);
    }
    $_SESSION["codPedido"] = $_POST['codPedido'];
} else {
    header("location:../index.php");
}
?>
