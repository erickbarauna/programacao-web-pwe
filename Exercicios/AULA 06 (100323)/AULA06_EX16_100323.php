<?php

//Ex16 - Crinado Funções
function calcularDobro ($valor)
{
    $dobro = $valor * 2;
    return $dobro;
}

$i = $_POST["Numero"];
echo ("O dorbro de $i é ".calcularDobro($i)."<br>");
//Reseultado 4 

echo("O valor original de \$i é ".$i);
    
?>