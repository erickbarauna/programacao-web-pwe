<?php
$meuArray = array ('a', 'b', 'c', 'd', 'e');
unset($meuArray[3]);

print_r($meuArray);
//Resultado: a b c d e
?>