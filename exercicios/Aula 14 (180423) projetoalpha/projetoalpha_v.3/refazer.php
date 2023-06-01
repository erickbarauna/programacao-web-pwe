<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Refazer</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<?php

    session_start();

    $mensagem = $_SESSION['mensagem'];

    if ($mensagem == 'pedido realizado')
    {
        ?>
        <body>
            <header>
                <div class="refazer">
                    <h1>Pedido registrado com Sucesso!</h1>
                    <div class="button-refazer" onclick="window.location.href = 'vitrine.php'">
                        <p>Refazer</p>
                    </div>
                </div>
            </header>
        </body>
        <?php
    }
    else
    {
        ?>
        <body>
            <header>
            <div class="refazer">
                    <h1>Erro ao registrar o pedido!</h1>
                    <div class="button-refazer" onclick="window.location.href = 'vitrine.php'">
                        <p>Refazer</p>
                    </div>
                </div>
            </header>
        </body>
        <?php
    }
    ?>
</html>