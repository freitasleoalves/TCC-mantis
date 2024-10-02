<?php

class Data {

	public $data, $ano, $mes, $dia, $hora;

	public function __construct() {
		$this->data = date("Y-m-d");
		$this->ano = date("Y");
		$this->mes = date("m");
		$this->dia = date("d");
		$this->hora = date("H:i:s");
	}

}

?>