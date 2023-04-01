 <!DOCTYPE html>
 <html lang="pt-br">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade01</title>
 </head>
 <body>
    <h1>Atividade Converção</h1>
    <form action="atividade01_PWE_31032023.php?valor=verificar" method="post">
        <div>
            <label for="iseg">Digite o valor em segundos para a conversão:</label>
            <input type="text" name="seg" id="iseg">
        </div>
        <br>
        <div>
            <input type="submit">
        </div>
        <br>
    </form>
    <?php
    if(isset($_REQUEST['seg']) and ($_REQUEST['valor'] == 'verificar'))
    {
        $seg = $_POST['seg'];

        $mes = 2419200;
        $contadorMes = 0;

        $semana = 604800;
        $contadorSemana = 0;

        $dia = 86400;
        $contadorDia= 0;

        $hora = 3600;
        $contadorHora = 0;

        $minuto = 60;
        $contadorMinuto = 0;

        while ($seg - $mes >= 0)
        {
            $seg -= $mes;
            $contadorMes += 1;
        }
        
        while ($seg - $semana >= 0)
        {
            $seg -= $semana;
            $contadorSemana += 1;
        }

        while ($seg - $dia >= 0)
        {
            $seg -= $dia;
            $contadorDia += 1;
        }

        while ($seg - $hora >= 0)
        {
            $seg -= $hora;
            $contadorHora += 1;
        }

        while ($seg - $minuto >= 0)
        {
            $seg -= $minuto;
            $contadorMinuto += 1;
        }

        echo $contadorMes ;
        echo '<br>';
        echo $contadorSemana ;
        echo '<br>';
        echo $contadorDia ;
        echo '<br>';
        echo $contadorHora ;
        echo '<br>';
        echo $contadorMinuto ; 
        echo '<br>'; 
        echo $seg;
    }
    ?>
 </body>
 </html>