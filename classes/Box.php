<?php

include_once 'conexao.php';

class Box extends Conexao {

    public $codBox, $titulo, $conteudo, $imagem;

    public function DefinirBox() {
        $this->Executar("SELECT titulo,conteudo,imagem FROM Box WHERE codBox = $this->codBox");
        $box = $this->dataSet;
        $this->titulo = html_entity_decode($box[0]["titulo"], ENT_QUOTES, "ISO-8859-1");
        $this->conteudo = html_entity_decode($box[0]["conteudo"], ENT_QUOTES, "ISO-8859-1");
        $this->imagem = $box[0]["imagem"];
    }

    public function ListarBox() {
        $this->Executar("SELECT * FROM Box");
        return $this->dataSet;
    }

    public function AlterarBox() {
        if ($this->Executar("UPDATE box SET titulo='$this->titulo', conteudo = '$this->conteudo' WHERE codBox = $this->codBox")) {
            return true;
        } else {
            return false;
        }
    }

}
