<?php
// Comand of continue control

for ($x = 0; $x < 10; $x++)
{
    if ($x == 4)
    {
        $c = $x * 5;
        echo ($x. ' ');
        continue;
    } 
    echo ($x. ' ');

    // Result: 0 1 2 3 4 5 6 7 8 9 
}

?>