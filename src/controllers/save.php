<?php

require_once("./../utils/utils.php");


if ( 
    isset($_POST['nome']) && 
    isset($_POST['quantidade']) &&
    isset($_POST['preco'])) 
    {
        $content = gen_codigo()
            .';'
            .$_POST['nome']
            .';'
            .$_POST['quantidade']
            .';'
            .$_POST['preco']
            ."\n";
        
        $path =  './../files/produto.txt';

        $mode = 'a+';

        $archive = fopen($path, $mode);

        if ($archive) {
            if (fwrite($archive, $content)) {
                echo 'Escrita realizada com sucesso!';
                fclose($archive);
            }
        }
    }
header('Location: ./../main.php');

?>