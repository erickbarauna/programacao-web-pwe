<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vetor (Array Unidimensional)</title>
</head>
<body>
    <form action="EX028_210323.php?valor=enviar" method="post">
        <div>
            <h1>Aula 09</h1>
            <h2>Vamos criar um array unidimensional de 5 índices:</h2>
        </div>
        <div>
            <label for="valor1">Digite o valor do 1° Índice 0: </label>
            <input type="text" name="valor1" width="30" maxlength="3">
        </div>
        <div>
            <label for="valor2">Digite o valor do 2° Índice 1: </label>
            <input type="text" name="valor2" width="30" maxlength="3">
        </div>
        <div>
            <label for="valor3">Digite o valor do 3° Índice 2: </label>
            <input type="text" name="valor3" width="30" maxlength="3">
        </div>
        <div>
            <label for="valor4">Digite o valor do 4° Índice 3: </label>
            <input type="text" name="valor4" width="30" maxlength="3">
        </div>
        <div>
            <label for="valor5">Digite o valor do 5° Índice 4: </label>
            <input type="text" name="valor5" width="30" maxlength="3">
        </div>
        <br>
        <div>
            <input type="submit" value="Enviar">
        </div>
        <br>
    </form>
    <?php
    if (isset($_REQUEST['valor1']) and ($_POST ['valor2']) and ($_POST['valor3']) and ($_POST ['valor4']) and ($_REQUEST['valor'] == 'enviar'))
    {
        $Valor1 = $_POST['valor1'];
        $Valor2 = $_POST['valor2'];
        $Valor3 = $_POST['valor3'];
        $Valor4 = $_POST['valor4'];
        $Valor5 = $_POST['valor5'];

        $meuArray = array ($Valor1, $Valor2, $Valor3, $Valor4, $Valor5);

        echo (sizeof($meuArray) .'<br>'); // Mostra o tamanho atual do Array
        echo (Count($meuArray) .'<br>'); // Retorna o tamanho do indice
        print_r($meuArray); // Exibe o Array
    }
    ?>
</body>
</html>