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
?>