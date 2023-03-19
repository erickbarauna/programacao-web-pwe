<?php
// Busca dentro do string

$Frase = $_POST["Frase"];
echo (strpos ($Frase, 'a') .'<br>');
// Lê a posição do "a"

echo (strpos ('Brasil é bom!', 'a') .'<br>');
// Retorna: 2

echo (strpos ('Brasil é bom e grande!', 'a', 4) .'<br>');
// Retorna: 18

$offset = 0;

while (($offset = strpos('banana é bom', 'a', $offset+1)) !=0)
{
    echo ($offset. ',');
}
// Resultado: 1, 3, 5, 
?>