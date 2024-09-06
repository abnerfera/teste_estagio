<?php

$faturamento = [
    'PE' => 67836.43,
    'RJ' => 36678.66,
    'MG' => 29229.88,
    'ES' => 27165.48,
    'Outros' => 19849.53
];

// Função para calcular o percentual de representação
function calcularPercentuais($faturamento) {
   
    $total = array_sum($faturamento);
    $percentuais = [];
    foreach ($faturamento as $estado => $valor) {
        $percentuais[$estado] = ($valor / $total) * 100;
    }
    
    return [$total, $percentuais];
}

// Calcular total e percentuais
list($totalFaturamento, $percentuais) = calcularPercentuais($faturamento);

// Exibir resultados
echo "Valor total de faturamento: R$ " . number_format($totalFaturamento, 2) . "\n";
foreach ($percentuais as $estado => $percentual) {
    echo "Percentual de representação de $estado: " . number_format($percentual, 2) . "%\n";
}
?>
