<?php
//Ex21 - Escrevendo e lendo em linhas

$Frase1 = $_POST ["Frase1"];//Recebendo a entrada do HTML
$Frase2 = $_POST ["Frase2"];//Recebendo a entrada do HTML

//Escrevendo

$file = fopen('dados2.txt', "w");//Abrir o arquivo
fwrite ($file,$Frase1.chr(10));
fwrite ($file,$Frase2);
fclose ($file);

//Lendo o arquivo em linhas

$arquivo = file ('dados2.txt');
for($i = 0; $i<count ($arquivo); $i++)
{
    //exibe cada linha com quebra html
    echo $arquivo[$i]."<br>";
}

?>