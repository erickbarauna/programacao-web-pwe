<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validando CPF</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>
        Validando CPF
    </h1>
    <form action="Ex034_280323.php?valor=verificar" method="post">
        <div>
            <label for="icpf">Digite o CPF: </label>
            <input type="text" name="cpf" id="icpf" placeholder="000.000.000-00">
        </div>
        <br>
        <div>
            <input type="submit" value="Verificar">
        </div>
        <br>
    </form>
    <?php
    if (isset($_REQUEST['cpf']) and ($_REQUEST['valor'] == 'verificar'))
    {
        if (isset($_POST['cpf']))
        {
            $CPF = $_POST["cpf"];

            $D11 = substr ($CPF, 0, 1) * 11;
            $D10 = substr ($CPF, 1, 1) * 10;
            $D9 = substr ($CPF, 2, 1) * 9;

            $D8 = substr ($CPF, 4, 1) * 8;
            $D7 = substr ($CPF, 5, 1) * 7;
            $D6 = substr ($CPF, 6, 1) * 6;

            $D5 = substr ($CPF, 8, 1) * 5;
            $D4 = substr ($CPF, 9, 1) * 4;
            $D3 = substr ($CPF, 10, 1) * 3;

            $D2 = substr ($CPF, 12, 1) * 2;
            $C1 = substr ($CPF, 13, 1);

            $SOMA = ($D11 + $D10 + $D9 + $D8 + $D7 + $D6 + $D5 + $D4 + $D3 + $D2); 

            $RESTO = $SOMA % 11;

            $VER = 11 - $RESTO; // Verificador

            $X = 0;

            if ($CPF == '..-')
            {
                $X = 1;

                echo ('No CPF: ' .$CPF .' Os números digitados não são válidos!');
            }

            if ($CPF == '000.000.000-00')
            {
                $X = 1;

                echo ('No CPF: ' .$CPF .' Os números digitados não são válidos!');
            }

            if ($CPF == '111.111.111-11')
            {
                $X = 1;

                echo ('No CPF: ' .$CPF .' Os números digitados não são válidos!');
            }

            if ($CPF == '222.222.222-22')
            {
                $X = 1;

                echo ('No CPF: ' .$CPF .' Os números digitados não são válidos!');
            }

            if ($CPF == '333.333.333-33')
            {
                $X = 1;

                echo ('No CPF: ' .$CPF .' Os números digitados não são válidos!');
            }

            if ($CPF == '444.444.444-44')
            {
                $X = 1;

                echo ('No CPF: ' .$CPF .' Os números digitados não são válidos!');
            }

            if ($CPF == '555.555.555-55')
            {
                $X = 1;

                echo ('No CPF: ' .$CPF .' Os números digitados não são válidos!');
            }

            if ($CPF == '666.666.666-66')
            {
                $X = 1;

                echo ('No CPF: ' .$CPF .' Os números digitados não são válidos!');
            }
            
            if ($CPF == '777.777.777-77')
            {
                $X = 1;

                echo ('No CPF: ' .$CPF .' Os números digitados não são válidos!');
            }

            if ($CPF == '888.888.888-88')
            {
                $X = 1;

                echo ('No CPF: ' .$CPF .' Os números digitados não são válidos!');
            }

            if ($CPF == '999.999.999-99')
            {
                $X = 1;

                echo ("<p class='orange'>No CPF: ' .$CPF .' Os números digitados não são válidos!<p class='green'>");
            }

            if ($VER >= 10)
            {
                $VER = 0;
            }

            if ($C1 == $VER && $X != 1)
            {
                echo ("<p class='green'>CPF verdadeiro!</p>");
            }
            else if ($X != 1)
            {
                echo ("<p class='red'>CPF falso!</p>");
            }
        }
    }
    ?>
</body>
</html>