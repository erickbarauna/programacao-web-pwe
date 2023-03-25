<?php
$arrayAlpha = array ('a', 'b', 'c');
$arrayBeta = array ('d', 'e', 'f');

$arrayMulti = array ($arrayAlpha, $arrayBeta);

echo ($arrayMulti [0][2] .'<br>'); //Resultado: c
echo ($arrayMulti [1][2] .'<br>'); //Resultado: f

print_r($arrayMulti);
?>