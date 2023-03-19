<?php
//Ex18 - Retorna de outro arquivo
$meuValor = "Brasil";
echo($meuValor . "<br>"); //Resultado: Brasil

include_once "AULA06_EX17_100323.php";
echo ($meuValor. "<br>"); //Resultado: Itália

?>