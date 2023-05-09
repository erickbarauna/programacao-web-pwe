<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Pagamento</title>
    <link rel="stylesheet" href="perola.css">
</head>
<body>
    <?php 
        include "conexao.php";
        $tabela = $conexao -> prepare("SELECT * FROM tb_produto");
        $tabela -> execute();

        while ($dados = $tabela -> fetch(PDO::FETCH_OBJ)) $valor = $dados -> VALOR_PRODUTO;

        $padraoBr = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
        $valorPadrao = numfmt_format_currency($padraoBr, $valor, "BRL");

        if (isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado'))
        {
            session_start();

            $_SESSION['forma_pagamento'] = $_POST['formaPagamento'];
            $_SESSION['valor_parcela'] = $_POST['condicaoPagamento'];

            header("Location: pedido.php");
        } 
    ?>
    <header>
        <h1>Tela Pagamento</h1>
    </header>
    <section>
        <form action="pagamento.php?valor=enviado" method="POST">
            <div>
                <label for="iformaPagamento">Forma de Pagamento</label>
                <select name="formaPagamento" id="iformaPagamento" onchange="CondicaoPagamento()" required>
                    <option value="">Selecione a forma de Pagamento</option>
                    <option value="Boleto">Boleto</option>
                    <option value="Cartao">Cartão</option>
                </select>
            </div>
            <div>
                <label for="icondPagamento">Condição de Pagamento</label>
                <select name="condicaoPagamento" id="icondPagamento" disabled>
                    <option value="0"></option>
                    <option value="1">Preço à vista</option>
                    <option value="2">Em 2x sem juros</option>
                    <option value="3">Em 3x sem juros</option>
                    <option value="4">Em 4x sem juros</option>
                    <option value="5">Em 5x sem juros</option>
                    <option value="6">Em 6x sem juros</option>
                    <option value="7">Em 7x sem juros</option>
                    <option value="8">Em 8x sem juros</option>
                    <option value="9">Em 9x sem juros</option>
                    <option value="10">Em 10x sem juros</option>
                    <option value="11">Em 11x sem juros</option>
                    <option value="12">Em 12x sem juros</option>
                </select>
            </div>
            <div class="valores">
                <p>Valor da Parcela:</p>
                <p id="Parcela" name="valorParcela"><?php echo $valorPadrao;?></p>
            </div>
            <div class="valores">
                <p>Valor Total:</p>
                <p><?php echo $valorPadrao;?></p>
            </div>
            <div>
                <input type="submit" value="Confirmar">
            </div>
        </form>
    </section>
    <script>
        var valorParcela = document.getElementById("Parcela");

        function CondicaoPagamento()
        {
            var formaPagamento = document.getElementById("iformaPagamento").value;
            var condicaoPagamento = document.getElementById("icondPagamento");

            condicaoPagamento.value = "1";
            condicaoPagamento.disabled = false;

            if (formaPagamento === "Boleto") 
            {
                for (var i = condicaoPagamento.options.length - 1; i >= 0; i--) {
                    var option = condicaoPagamento.options[i];
                    if (option.value !== "1") {option.disabled = true;}
                    else { option.disabled = false;}
                }
                valorParcela.innerHTML = "<?php echo $valorPadrao;?>";
            } 
            else if (formaPagamento === "Cartao") 
            {
                for (var i = condicaoPagamento.options.length - 1; i >= 0; i--) {
                    var option = condicaoPagamento.options[i];
                    if (option.value !== "0") {option.disabled = false;}
                    else { option.disabled = true;}
                }
            }
            else if (formaPagamento === "")
            {
                condicaoPagamento.value = "0";
                condicaoPagamento.disabled = true;
                valorParcela.innerHTML = "<?php echo $valorPadrao;?>";
            }
        }

        var select = document.getElementById("icondPagamento");

        select.onchange = function() {
            var valorSelecionado = parseInt(select.value);
            var valorTotal = parseInt("<?php echo $valor;?>");
            resultado = valorTotal / valorSelecionado;
            resultadoFormatado = resultado.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });

            valorParcela.innerHTML = resultadoFormatado;
        }
    </script>
</body>
</html>