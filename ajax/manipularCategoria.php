<?php

if (isset($_POST['categoria'])) {
    session_start();
    $_SESSION['categoria'] = $_POST['categoria'];
} else {
    header("location:../index.php");
}
?>
