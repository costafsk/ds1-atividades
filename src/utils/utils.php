<?php
    function mount ($row) {
        $arr = explode(";", $row);

        return array(
            'codigo'=> intval($arr[0]),
            'nome'=> $arr[1],
            'quantidade'=> intval($arr[2]),
            'preco'=> floatval($arr[3])
        );
    }

    function gen_codigo () {
        $archive = fopen('./files/produto.txt', 'r');

        return count(explode("\n", file_get_contents('./files/produto.txt')));
    }

    function maior_total ($rows) {
        $total = 0;
        foreach($rows as $row) {
            $valor = ($row['preco'] * $row['quantidade']);
            $total = $valor > $total ? $valor : $total;   
        }
        return $total;
    }

?>