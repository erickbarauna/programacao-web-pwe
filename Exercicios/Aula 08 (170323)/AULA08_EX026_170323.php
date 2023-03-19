<?php
$Nome = $_POST["Frase"];

echo (strtoupper($Nome) .'<br>');
// Tudo em maiúsculo

echo (strtolower($Nome) .'<br>');
// Tudo em minúsculo

echo (ucfirst($Nome) .'<br>');
// 1° Letra em Maiúsculo

echo (chr($Nome) .'<br>');
// 'A' da tabela ASCII
?>