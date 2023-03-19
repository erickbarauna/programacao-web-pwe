<?php
//Ex22 - Direcionar o caminho a ser encaminhado

//Enviando arquivo aberto
ob_start();
include("dados.txt");
header("Location; http://www.google.com.br");
ob_end_flush();
?>