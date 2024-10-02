<?php

include_once 'conexao.php';

class Empresa extends Conexao {

    public $nome, $endereco, $cidade, $cep, $email, $telefone;
    public $dia, $abertura, $fechamento;

    public function VerificarDelivery() {
        $this->Executar("SELECT * FROM atendimento 
WHERE ((dia = WEEKDAY(DATE(SYSDATE())) AND NOT diaSeguinte) OR (dia = (WEEKDAY(DATE(SYSDATE()))) AND diaSeguinte))
AND delivery AND TIME(SYSDATE()) BETWEEN horarioAbertura AND horarioFechamento;");
        if (mysql_numrows($this->result)) {
            return true;
        } else {
            return false;
        }
    }

    public function DefinirInformacoes() {
        $this->Executar("SELECT * FROM empresa");
        $info = $this->dataSet;
        $this->nome = $info[0]["nome"];
        $this->endereco = $info[0]["endereco"];
        $this->cidade = $info[0]["cidade"];
        $this->cep = $info[0]["cep"];
        $this->email = $info[0]["email"];
        $this->telefone = $info[0]["telefone"];
    }

}

?>
