<?php

include_once 'conexao.php';

class Cliente extends Conexao {

    public $codCliente, $nome, $sobrenome, $sexo, $endereco, $bairro, $cidade, $telefone;

    public function CadastrarCliente() {
        if ($this->Executar("INSERT INTO Cliente(nomeCliente,sobrenomeCliente,sexoCliente,enderecoCliente,bairroCliente,cidadeCliente,telefoneCliente,dataCadastro) VALUES('$this->nome','$this->sobrenome','$this->sexo','$this->endereco','$this->bairro','$this->cidade','$this->telefone',date(SYSDATE()));")) {
            $this->codCliente = $this->ultimoId;
            $_SESSION["mensagens"] = "Você foi cadastrado com sucesso!";
            return true;
        } else {
            $_SESSION["mensagens"] = "Falha ao cadastrar :(";
            return false;
        }
    }

    public function DefinirNomeCliente() {
        if ($this->Executar("SELECT nomeCliente FROM cliente WHERE codCliente = $this->codCliente")) {
            $this->nome = mysql_result($this->result, 0, "nomeCliente");
            if (isset($this->nome) and !is_null($this->nome)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
