<?php
$meuArray = array ('alpha'=>'valor1', 2, 'três');
$meuArray[5] = 'Novo Valor';

echo ($meuArray[0] .'<br>'); //Resultado: 2
echo ($meuArray['alpha'] .'<br>'); //Resultado: valor1
echo ($meuArray[5] .'<br>'); //Resultado: Novo valor
?>