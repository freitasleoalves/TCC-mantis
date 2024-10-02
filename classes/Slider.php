<?php

include_once 'conexao.php';

class Slider extends Conexao {

    public $codSlide, $texto, $imagem;

    public function ListarSlides() {
        $this->Executar("SELECT * FROM slider ORDER BY codSlide DESC");
        return $this->dataSet;
    }

}
