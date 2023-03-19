<?php
//Ex023 - Permite a leitura do Tamanho 
$Frase = $_POST["Frase"];
$Tamanho = strlen($Frase);

echo ($Tamanho ."<br>");
// Resultado: exibe o número de caracteres

echo (strlen ("abc") ."<br>");
// Resultado: 3
?>