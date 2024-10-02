<?php

class Conexao {

    private $servidor, $usuario, $senha, $banco, $conexao;
    public $result, $ultimoId, $dataSet, $dataSetNum;

    public function __construct() {
        $this->servidor = "localhost";
        $this->usuario = "root";
        $this->senha = "";
        $this->banco = "Pizzaria";
    }

    public function Conectar() {
        $this->conexao = mysql_connect($this->servidor, $this->usuario, $this->senha) or die($_SESSION['mensagens'] = "Sem conexão com o servidor, o site deve estar passando por upgrades.");
        mysql_select_db($this->banco) or die($_SESSION['mensagens'] = "Sem acesso ao banco selecionado. Entre em contato com o Administrador");
        mysql_query("SET character_set_client = latin1", $this->conexao);
    }

    public function Executar($query) {
        try {
            $this->Conectar();
            $this->result = mysql_query($query);
            $this->ultimoId = mysql_insert_id();
            mysql_close($this->conexao);
            if ($this->result) {
                if (preg_match("(^SELECT)", $query)) {
                    $this->RetornarDataSet();
                    $this->RetornarDataSetNum();
                }
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            $_SESSION["mensagens"] = $ex;
        }
    }

    private function RetornarDataSet() {
        $dataSet = array();
        $i = 0;
        while ($result = mysql_fetch_array($this->result, MYSQL_ASSOC)) {
            $colunas = array_keys($result);
            foreach ($colunas as $coluna) {
                $dataSet[$i][$coluna] = $result[$coluna];
            }
            $i++;
        }
        $this->dataSet = $dataSet;
        return true;
    }

    private function RetornarDataSetNum() {
        $dataSet = array();
        $colunas = mysql_num_fields($this->result);
        for ($i = 0; $i < mysql_num_rows($this->result); $i++) {
            for ($j = 0; $j < mysql_num_fields($this->result); $j++) {
                if (count($colunas) == 1) {
                    $dataSet[$i] = mysql_result($this->result, $i, 0);
                } else {
                    $dataSet[$i][$j] = mysql_result($this->result, $i, $j);
                }
            }
        }
        $this->dataSetNum = $dataSet;
    }

}

?>
