<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        session_start();

        $nome = $_SESSION['nome_usuario'];
        $endereco = $_SESSION['endereco_usuario'];
        $formPagamento = $_SESSION['forma_pagamento'];
        $valorParcela = $_SESSION['valor_parcela'];
        $valorTotal = $_SESSION['valor_total'];

        $calcParcela = $valorTotal / $valorParcela;

        $padraoBr = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
        $valorPadraoParcela = numfmt_format_currency($padraoBr, $calcParcela, "BRL");
        $valorPadraoTotal = numfmt_format_currency($padraoBr, $valorTotal, "BRL");
    ?>
    <header>
        <h1>Recibo do Pedido</h1>
    </header>
    <section>
        <div class="valoresRecibo">
            <p class="labelValor">Nome:</p>
            <p><?php echo $nome;?></p>
        </div>
        <div class="valoresRecibo">
            <p class="labelValor">Endereço:</p>
            <p><?php echo $endereco;?></p>
        </div>
        <div class="valoresRecibo">
            <p class="labelValor">Forma de Pagamento:</p>
            <p><?php echo $formPagamento;?></p>
        </div>
        <div class="valoresRecibo">
            <p class="labelValor">Valor da Parcela:</p>
            <p><?php echo $valorParcela . " vez(es) de " . $valorPadraoParcela;?></p>
        </div>
        <div class="valoresRecibo">
            <p class="labelValor">Valor Total:</p>
            <p><?php echo $valorPadraoTotal;?></p>
        </div>
        <div class="refazer">
            <button><a href="cadastro.php">Refazer</a></button>
        </div>
    </section>
</body>
</html>