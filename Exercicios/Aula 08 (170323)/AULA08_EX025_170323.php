<?php
$Frase = $_POST["Frase"];
echo (substr($Frase, 2). '<br>');
// Lê apartir do texto html, apartir da posição 2

echo (substr('A vida é boa', 2, 3) .'<br>');
// retorna: vid

echo (substr('A vida é boa', -2, 2) .'<br>');
// retorna: oa
?>