<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Pedido</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php 
        session_start();

        // Resgata os valores enviados pelo formulário
        $nome = $_SESSION['nomeCadastrado'];
        $endereco = $_SESSION['endCadastrado'];

        // Conecta o banco de dados
        include 'conexao.php';
        
        // Seleciona todas as colunas da tabela tb_produto
        $tabela = $conexao -> prepare("SELECT * FROM tb_produto");

        // Executa o comando
        $tabela -> execute();

        // Percorre todos os resultados da consulta, e armazena o valor da coluna 'VALOR_PRODUTO' na variável $valor
        while ($dados = $tabela -> fetch(PDO::FETCH_OBJ)) $valor = $dados -> VALOR_PRODUTO;

        // Seções criadas na página pagamento.php
        $condicaoPagamento = $_SESSION['forma_pagamento'];
        $formaPagamento = $_SESSION['valor_parcela'];

        // Calcula o valor da parcela
        $calcParcela = $valor / $formaPagamento;

        // Formata o valor da parcela para o padrão monetário brasileiro 
        $padraoBr = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
        $valorPadraoParcela = numfmt_format_currency($padraoBr, $calcParcela, "BRL");
        $valorPadraoTotal = numfmt_format_currency($padraoBr, $valor, "BRL");

        // Verifica se o usuário enviou o formulário
        if (isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado'))
        {
            // Conecta o banco  de dados
            include "conexao.php";

            // Envolve o código de inserção dos dados para tratar possíveis exceções
            try 
            {
                // Insere os parâmetros nas colunas da tabela 
                $Comando = $conexao -> prepare("INSERT INTO tb_pedido (NOME_USUARIO, ENDERECO_USUARIO, FORMA_PGTO, CONDICAO_PGTO, VALOR_PARCELA, VALOR_PRODUTO) VALUES (?, ?, ?, ?, ?, ?)");

                // Parâmetros resgatados durando todo o processo de compra
                $Comando -> bindParam(1, $nome);
                $Comando -> bindParam(2, $endereco);
                $Comando -> bindParam(3, $formaPagamento);
                $Comando -> bindParam(4, $condicaoPagamento);
                $Comando -> bindParam(5, $calcParcela);
                $Comando -> bindParam(6, $valor);

                // Verifica se o comando foi executado
                if ($Comando -> execute())
                {
                    // Verifica se uma linha foi afetada
                    if ($Comando -> rowCount() > 0)
                    {
                        $_SESSION['mensagem'] = 'pedido realizado';
                        header('location:refazer.php');
                    }
                    else
                    {
                        $_SESSION['mensagem'] = 'erro';
                        header('location:refazer.php');
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
            <input class="button-tela-pedido" type="button" value="Refazer">
        </form>
    </section>
</body>
</html>