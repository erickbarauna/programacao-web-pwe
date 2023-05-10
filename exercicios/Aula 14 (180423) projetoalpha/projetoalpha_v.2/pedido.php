<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Pedido</title>
    <link rel="stylesheet" href="perola.css">
</head>
<body>
    <?php 
        session_start();

        $nome = $_SESSION['nomeCadastrado'];
        $endereco = $_SESSION['endCadastrado'];

        include 'conexao.php';
        
        $tabela = $conexao -> prepare("SELECT * FROM tb_produto");
        $tabela -> execute();

        while ($dados = $tabela -> fetch(PDO::FETCH_OBJ)) $valor = $dados -> VALOR_PRODUTO;

        $condicaoPagamento = $_SESSION['forma_pagamento'];
        $formaPagamento = $_SESSION['valor_parcela'];

        $calcParcela = $valor / $formaPagamento;

        $padraoBr = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
        $valorPadraoParcela = numfmt_format_currency($padraoBr, $calcParcela, "BRL");
        $valorPadraoTotal = numfmt_format_currency($padraoBr, $valor, "BRL");

        if (isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado'))
        {
            include "conexao.php";

            try 
            {
                $Comando = $conexao -> prepare("INSERT INTO tb_pedido (NOME_USUARIO, ENDERECO_USUARIO, FORMA_PGTO, CONDICAO_PGTO, VALOR_PARCELA, VALOR_PRODUTO) VALUES (?, ?, ?, ?, ?, ?)");

                $Comando -> bindParam(1, $nome);
                $Comando -> bindParam(2, $endereco);
                $Comando -> bindParam(3, $formaPagamento);
                $Comando -> bindParam(4, $condicaoPagamento);
                $Comando -> bindParam(5, $calcParcela);
                $Comando -> bindParam(6, $valor);

                if ($Comando -> execute())
                {
                    if ($Comando -> rowCount() > 0)
                    {
                        echo("<script>alert('Registro realizado com sucesso!')</script>");
                    }
                    else
                    {
                        echo("<script>alert('Erro ao efetivar o registro!')</script>");
                    }
                }
                else
                {
                    throw new PDOException("Erro: Não foi possível executar a declaração sql.");
                }
            }
            catch (PDOException $erro) 
            {
                echo("Erro" . $erro -> getMessage());
            }
        }
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
            <p><?php echo $condicaoPagamento;?></p>
        </div>
        <div class="valoresRecibo">
            <p class="labelValor">Valor da Parcela:</p>
            <p><?php echo $formaPagamento . " vez(es) de " . $valorPadraoParcela;?></p>
        </div>
        <div class="valoresRecibo">
            <p class="labelValor">Valor Total:</p>
            <p><?php echo $valorPadraoTotal;?></p>
        </div>
        <form class="form-sem-estilo" action="pedido.php?valor=enviado" method="post">
            <input type="submit" class="submit-sem-estilo" value="Registrar Pedido">
            <input class="button-tela-pedido" type="button" value="Refazer" onclick="window.location.href='produto.php'">
        </form>
    </section>
</body>
</html>