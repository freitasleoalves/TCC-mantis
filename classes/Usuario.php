<?php

require_once 'Conexao.php';
require_once 'Email.php';

class Usuario extends Conexao {

    public $codCliente, $user, $nomeCliente, $username, $emailUsuario, $senha, $senhaCodificada;

    public function ValidarUsuario($tipoLogin) {
        switch ($tipoLogin) {
            case "username":
                $query = "SELECT codCliente,username,senhaUsuario FROM Usuario WHERE username = '$this->user' AND confirmado = true";
                break;
            case "email":
                $query = "SELECT codCliente,username,senhaUsuario FROM Usuario WHERE emailUsuario = '$this->user' AND confirmado = true";
                break;
        }
        $this->CodificarSenha();
        $this->Executar($query);
        $usuario = $this->dataSet;
        if ($usuario) {
            if ($usuario[0]['senhaUsuario'] == $this->senhaCodificada) {
                $this->codCliente = $usuario[0]['codCliente'];
                $this->username = $usuario[0]['username'];
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function CadastrarUsuario() {
        $this->CodificarSenha($this->senha);
        $token = uniqid(rand(), true);
        $url = sprintf('u=%s&e=%s&t=%s', base64_encode($this->username), md5($this->emailUsuario), $token);
        if ($this->Executar("INSERT INTO Usuario(emailUsuario,username,senhaUsuario,dataCadastro,token,url) VALUES('$this->emailUsuario','$this->username','$this->senhaCodificada',date(SYSDATE()),'$token','$url')")) {
            // $mensagem = 'Para confirmar seu cadastro acesse o link:' . "\n" . sprintf('http://localhost/pizzaria/action/confirmarUsuario.php?%s', $url);
            // include_once 'Email.php';
            //  new Email("pedrinluiz@gmail.com", $this->emailUsuario, "Confirmação de cadastro", $mensagem);
            $_SESSION["usuarioLogado"] = $this->username;
            $_SESSION["mensagens"] = "Você foi registrado com sucesso!"; // Verifique seu email para acessar o link de confirmação.";
            return true;
        } else {
            $_SESSION["mensagens"] = "Falha ao cadastrar :(";
            return false;
        }
    }

    public function CodificarSenha() {
        $salt = md5("%$27aa283");
        $codifica = hash('sha512', crypt($this->senha, $salt));
        $this->senhaCodificada = $codifica;
    }

    public function Logar() {
        if (preg_match("([a-z0-9_-]+(?:\.[a-z0-9_-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?)", $this->user)) {
            $tipo = "email";
        } else {
            $tipo = "username";
        }
        if ($this->ValidarUsuario($tipo)) {
            if ($this->codCliente) {
                $_SESSION["usuarioLogado"] = $this->username;
            } else {
                $_SESSION["mensagens"] = "Você ainda não concluiu seu cadastro, deseja reenviar o e-mail de confirmação? TROCAR POR CONFIRM";
            }
        } else {
            $_SESSION["mensagens"] = "Falha no login :(";
        }
    }

    public function DefinirCliente() {
        if ($this->Executar("SELECT codCliente FROM Usuario WHERE username = '$this->username'")) {
            $codCliente = mysql_result($this->result, 0, "codCliente");
            if (!is_null($codCliente)) {
                include_once 'cliente.php';
                $Cliente = new Cliente();
                $this->codCliente = $Cliente->codCliente = $codCliente;
                if ($Cliente->DefinirNomeCliente()) {
                    $this->nomeCliente = $Cliente->nome;
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function VerificarExistenciaUsuario() {
        $this->Executar("SELECT username FROM usuario WHERE username = '$this->username'");
        $usuario = $this->dataSet;
        if (isset($usuario[0]["username"]) and !is_null($usuario[0]["username"])) {
            return true;
        } else {
            return false;
        }
    }

    public function VerificarExistenciaEmail() {
        $this->Executar("SELECT emailUsuario FROM usuario WHERE emailUsuario = '$this->emailUsuario'");
        $email = $this->dataSet;
        if (isset($email[0]["email"]) and !is_null($email[0]["email"])) {
            return true;
        } else {
            return false;
        }
    }

    public function ConfirmarUsuario($emailMd5, $token) {
        $this->Executar("SELECT emailUsuario,token FROM usuario WHERE username = '$this->username'");
        $usuario = mysql_fetch_array($this->result);
        $valido = true;
        if ($emailMd5 !== md5($usuario['email'])) {
            $valido = false;
        }
        if ($token !== $usuario['token']) {
            $valido = false;
        }
        if ($valido === true) {
            mysql_query("UPDATE usuario SET confirmado = TRUE WHERE username = '$this->username'");
            echo "Cadastro ativado com sucesso!";
        } else {
            echo "Informações inválidas";
        }
    }

    public function ConfirmarUsuario2() {
        $this->Executar("UPDATE usuario SET codCliente = $this->codCliente, confirmado = TRUE  WHERE username = '$this->username'");
    }

    public function VerificarAdmin() {
        if ($this->Executar("SELECT admin FROM usuario WHERE username ='$this->username'")) {
            if (mysql_result($this->result, 0, "admin")) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}
