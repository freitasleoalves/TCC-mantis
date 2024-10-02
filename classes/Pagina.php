<?php

header("charset=ISO-8859-1");

class Pagina {

    public $paginaAtual;
    public $paginaPassada;
    public $titulo;

    public function __construct($paginaAtual, $paginaPassada) {
        preg_match('(\/.*\.php?)', $paginaAtual, $this->paginaAtual);
        $this->paginaPassada = $paginaPassada;
        $_SESSION['paginaAtual'] = $paginaAtual;
        $this->controle();
    }

    public function controle() {
        switch ($this->paginaAtual[0]) {
            case '/pizzamantis/index.php':
                $this->titulo = 'Início';
                break;
            case '/pizzamantis/sobre.php':
                $this->titulo = 'Sobre';
                break;
            case '/pizzamantis/cardapio.php':
                $this->titulo = 'Cardápio';
                break;
            case '/pizzamantis/delivery.php':
                $this->titulo = 'Delivery';
                break;
            case '/pizzamantis/contato.php':
                $this->titulo = 'Contato';
                break;
            case '/pizzamantis/carrinho.php':
                $this->titulo = 'Carrinho';
                break;
            case '/pizzamantis/pedidos.php':
                $this->titulo = 'Pedidos';
                break;
            case '/pizzamantis/cms/index.php' or '/pizzamantis/cms/box.php':
                $this->titulo = 'CMS';
                break;
            default:
                header('location:index.php');
                break;
        }
    }

}

if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['paginaAtual'])) {
    $Pagina = new Pagina($_SERVER['REQUEST_URI'], $_SESSION['paginaAtual']);
} else {
    $Pagina = new Pagina($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_URI']);
}
?>
