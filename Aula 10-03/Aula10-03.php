<?php

    date_default_timezone_set('America/Sao_Paulo');
    $data = date("d/m/Y H:i:s");
    echo "<p>Data: $data</p>";
    $valor = 1505.88888;
    $valor_arredondado =round($valor);
    echo "<p>Valor arredondado: $valor_arredondado</p>";
    $valor_formatado = number_format($valor, 2, ",", ".");
    echo "<p>Valor sem formatação: $valor </p>";
    echo "<p>Valor formatado: $valor_formatado</p>";
    //exponeciação
    $exp = pow(3,4);
    //raiz quadrada 
    $raiz = sqrt (16);
    // números aleatórios
    $aleatorio = rand(1,100);
    if (isset($nome)){
        echo "<p>Nome Informado!</p>"; 
    }   else {
        echo "<p>Nome Não Informado!</p>";
        die();
    }
    if (is_float($valor)){
        echo "<p> é um numero fluante!</p>";
    }