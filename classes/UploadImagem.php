<?php

class UploadImagem {

    public $mensagem;
    public $width;
    public $height;
    protected $tipos = array("jpeg", "png", "gif","pjpeg","x-png","jpg","gif");

    protected function redimensionar($caminho, $nomearquivo) {
        $width = $this->width;
        $height = $this->height;
        list($width_orig, $height_orig, $tipo, $atributo) = getimagesize($caminho . $nomearquivo);
        if ($width_orig > $height_orig) {
            $height = ($width / $width_orig) * $height_orig;
        } elseif ($width_orig < $height_orig) {
            $width = ($height / $height_orig) * $width_orig;
        }
        $novaimagem = imagecreatetruecolor($width, $height);
        switch ($tipo) {
            case 1:
                $origem = imagecreatefromgif($caminho . $nomearquivo);
                imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                imagegif($novaimagem, $caminho . $nomearquivo);
                break;
            case 2:
                $origem = imagecreatefromjpeg($caminho . $nomearquivo);
                imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                imagejpeg($novaimagem, $caminho . $nomearquivo);
                break;
            case 3:
                $origem = imagecreatefrompng($caminho . $nomearquivo);
                imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
                imagepng($novaimagem, $caminho . $nomearquivo);
                break;
        }
        imagedestroy($novaimagem);
        imagedestroy($origem);
    }

    protected function tirarAcento($texto) {
        $com_acento = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú', '?',);
        $sem_acento = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', '0', 'U', 'U', 'U', 'Y',);
        $com_pontuacao = array('´', '`', '¨', '^', '~', ' ', '-');
        $sem_pontuacao = array('', '', '', '', '', '_', '_');
        $final = str_replace($com_pontuacao, $sem_pontuacao, str_replace($com_acento, $sem_acento, $texto));
        return $final;
    }

    public function salvar($caminho, $file) {
        $file['name'] = $this->tirarAcento(($file['name']));
        $uploadfile = $caminho . $file['name'];
        $tipo = strtolower(end(explode('/', $file['type'])));
        if (array_search($tipo, $this->tipos) === false) {
            $this->mensagem = "Envie apenas imagens no formato jpeg, png ou gif!";
        } else if (!move_uploaded_file($file['tmp_name'], $uploadfile)) {
            switch ($file['error']) {
                case 1:
                    $this->mensagem = "O tamanho do arquivo é maior que o tamanho permitido.";
                    break;
                case 2:
                    $this->mensagem = "O tamanho do arquivo é maior que o tamanho permitido.";
                    break;
                case 3:
                    $this->mensagem = "O upload do arquivo foi feito parcialmente.";
                    break;
                case 4:
                    $this->mensagem = "Não foi feito o upload de arquivo.";
                    break;
            }
        } else {
            if (isset($this->width) and isset($this->height)) {
                list($width_orig, $height_orig) = getimagesize($uploadfile);
                if ($width_orig > $this->width || $height_orig > $this->height) {
                    $this->redimensionar($caminho, $file['name']);
                }
            }
        }
        return $uploadfile;
    }

}

?>
