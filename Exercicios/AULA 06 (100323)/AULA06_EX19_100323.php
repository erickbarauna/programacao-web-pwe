<?php
//Ex19 - Exibir variaveis do Servidor
echo ($_SERVER['SERVER_ADDR']. "<BR>");
//Resultadp? ip do servidor

echo ($_SERVER ['SERVER_NAME']. '<BR>');
//Resultado: dominio do servidor

echo($_SERVER ['HTTP_ACCEPT_ENCODING'].'<BR>');
//Resultado: dados do servidor
?>