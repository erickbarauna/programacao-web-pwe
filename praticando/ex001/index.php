<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercícios da Internet</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h1>Exercício 001</h1>
    <form action="index.php?valor=enviar" method="post">
        <div>
            <label for="inumero">Digite um número:</label>
            <input type="number" name="numero" id="inumero">
        </div>
        <div>
            <input type="submit" value="Enviar">
        </div>
    </form>
    <?php 
        if (isset($_REQUEST['numero']) and ($_REQUEST['valor'] == 'enviar'))
        {
            $Numero = $_POST['numero'];

            if ($Numero > 0)
            {
                echo "<p class='green'>Valor POSITIVO!</p>";
            }
            elseif ($Numero < 0)
            {
                echo "<p class='red'>Valor NEGATIVO!</p>";
            }
            else
            {
                echo "<p class='orange'>Valor IGUAL A 0</p>";
            }
        }
    ?>
</body>
</html>