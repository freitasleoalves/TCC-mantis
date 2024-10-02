<?php

class Email {

    public function __construct($remetente,$destinatario,$titulo,$mensagem) {
    $headers = "MIME-Version: 1.1\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1\n";
        $headers .= "From: $remetente\n"; // remetente
        $headers .= "Return-Path: $remetente\n"; // return-path
               $envio = mail($destinatario, $titulo, $mensagem, $headers);
       var_dump($envio);
        if ($envio) {
           print $_SESSION["mensagens"] = "E-mail enviado com sucesso";
        } else {
          print  $_SESSION["mensagens"] = "Falha ao enviar o e-mail";
        }    
    }
   

}
