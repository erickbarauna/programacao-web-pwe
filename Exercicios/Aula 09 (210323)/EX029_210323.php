<?php
function CalcularDobro ($numero)
{
    return $numero * 2;
}
$meuArray = array (1,2,3);
$arrayAlternado = array_map('CalcularDobro', $meuArray);

print_r($arrayAlternado); //Resultado: 2, 4, 6
?>