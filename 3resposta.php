<?php

// Função para ler e processar dados de um arquivo JSON
function processarDadosJSON($caminhoArquivo) {

    $json = file_get_contents($caminhoArquivo);
    $dados = json_decode($json, true);

    //Filtrar os valores de faturamento, ignorando dias sem faturamento
    $faturamento = array_filter(array_column($dados, 'faturamento'), function($valor) {
        return $valor > 0;
    });

    return $faturamento;
}

//Função para calcular o menor valor de faturamento
function calcularMenorValor($faturamento) {
    return min($faturamento);
}

//Função para calcular o maior valor de faturamento
function calcularMaiorValor($faturamento) {
    return max($faturamento);
}

//Função para calcular a média mensal de faturamento
function calcularMediaMensal($faturamento) {
    $total = array_sum($faturamento);
    $dias = count($faturamento);
    return $dias > 0 ? $total / $dias : 0;
}

//Função para contar o número de dias com faturamento superior à média
function contarDiasAcimaDaMedia($faturamento, $media) {
    $contagem = 0;
    foreach ($faturamento as $valor) {
        if ($valor > $media) {
            $contagem++;
        }
    }
    return $contagem;
}


$caminhoArquivo = 'faturamento.json';

//Processar os dados do JSON
$faturamento = processarDadosJSON($caminhoArquivo);

//Calcular o menor valor de faturamento
$menorValor = calcularMenorValor($faturamento);
echo "Menor valor de faturamento: R$ $menorValor\n";

//Calcular o maior valor de faturamento
$maiorValor = calcularMaiorValor($faturamento);
echo "Maior valor de faturamento: R$ $maiorValor\n";

//Calcular a média mensal de faturamento
$mediaMensal = calcularMediaMensal($faturamento);
echo "Média mensal de faturamento: R$ " . number_format($mediaMensal, 2) . "\n";

//Contar o número de dias com faturamento superior à média
$diasAcimaDaMedia = contarDiasAcimaDaMedia($faturamento, $mediaMensal);
echo "Número de dias com faturamento acima da média: $diasAcimaDaMedia\n";
?>
