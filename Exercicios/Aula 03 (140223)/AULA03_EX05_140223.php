<?php
// Ex05 Condeicional SE

if( 3 > 5 )
{
	echo ('Não entra no primeiro if.');
	echo('<br>');
}

if( 1 < 10 )
{
	echo('Entra no segundo if');
	echo('<br>');
}


$N = 5;
if( $N == 3 )
{
	echo('O valor de N é 3.');
	echo('<br>');
}

else if( $N == 4 )
{
	echo('O valor de N é 4.');
	echo('<br>');
}

else
{
	echo ('O valor de N não é 3. e nem 4');
	echo('<br>');
}
?>