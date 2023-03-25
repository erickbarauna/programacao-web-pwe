<?php
$meuArray = array ('a', 'b', 'c', 'd', 'e', 'f', 'g');

foreach($meuArray as $valor)
{
    echo($valor ."");
}
//Resultado: a b c d e f g 
end ($meuArray); // g
prev ($meuArray); // f
prev ($meuArray); // e
prev ($meuArray); // d
next ($meuArray); // e

echo (key ($meuArray)); //Resultado: 4
echo (current($meuArray)); //Resultado: e
?>