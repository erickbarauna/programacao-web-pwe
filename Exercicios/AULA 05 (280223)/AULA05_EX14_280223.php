<?php
//Ex14 Usando mascara em numeros

$Numero = $_POST["Numero"];

$var1 = number_format($Numero, 1);
$var2 = number_format($Numero, 2,',','.');

echo ($Numero. '<br>');
//resultado : 12345.678

echo ($var1. "<br>");
//resultado: 12345.7

echo ($var2. "<br>");
//Resultado: 12.345,68

?>