<?php
// Função para inverter uma string
function inverterString($string) {
    $tamanho = strlen($string); 
    $inversa = ''; 
    
    for ($i = $tamanho - 1; $i >= 0; $i--) {
        $inversa .= $string[$i]; 
    }

      return $inversa; 
}

// Exemplo de uso com string definida no código
$string = "Olá, Mundo!"; 

// Inverte a string e exibe o resultado
$stringInvertida = inverterString($string);
echo "String original: $string\n";
echo "String invertida: $stringInvertida\n";
?>
