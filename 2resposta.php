<?php
function pertenceFibonacci($numero) {
    if ($numero < 0) {
        return "$numero não pertence à sequência de Fibonacci.";
    }

    $a = 0;
    $b = 1;

    // Verificação se o número é 0 ou 1 
    if ($numero == $a || $numero == $b) {
        return "$numero pertence à sequência de Fibonacci.";
    }

    // Gerando a sequência de Fibonacci até encontrar o número ou ultrapassá-lo
    while ($b < $numero) {
        $temp = $b;
        $b = $a + $b;
        $a = $temp;
    }

    // Verificando se o número foi encontrado na sequência
    if ($b == $numero) {
        return "$numero pertence à sequência de Fibonacci.";
    } else {
        return "$numero não pertence à sequência de Fibonacci.";
    }
}

// Exemplo de uso
$numero = 21; 
echo pertenceFibonacci($numero);
?>
