<?php
//Ex15 - Manipulando data e hora
$data1 = date_default_timezone_set('America/Sao_Paulo');
$data2 = date_default_timezone_set('America/Sao_Paulo');

$data1 = date('l jS \of F h:i:s A', time());
echo $data1. '<br>';
//Resultadp: data e hora do sistema

$data2 = date ('H:i:s');
//Resultado: Hora no formato padrão
?>