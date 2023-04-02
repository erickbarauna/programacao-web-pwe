<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada</title>
</head>
<body>
    <h1>Tabuada em PHP</h1>
    <form action="index.php?valor=verificar" method="post">
        <div>
            <label for="ivalor">Digite um número:</label>
            <input type="text" name="valorNum" id="ivalor">
        </div>
        <br>
        <div>
            <input type="submit">
        </div>
        <br>
    </form>
    <?php 
        if(isset($_REQUEST['valorNum']) and ($_REQUEST['valor'] == 'verificar'))
        {
            $num = $_POST['valorNum'];
            
            echo("RESULTADO<br><br>");

            for ($i = "1";$i <= "10";$i++)
            {
                echo("$num x $i = " .$num * $i ."<br>");
            }
        }
    ?>
</body>
</html>