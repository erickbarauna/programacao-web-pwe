<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title>
    <link rel="stylesheet" href="camadas.css">
</head>
<body>
    <?php 
        session_start();

        $valor = $_SESSION['valor_total'];
        $padraoBr = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
        $valorPadrao = numfmt_format_currency($padraoBr, $valor, "BRL");
    ?>
    <header>
        <h1>Tela de Pagamento</h1>
    </header>
    <section>
        <form action="pagamento.php?valor=enviado" method="$_POST">
            <div>
                <label for="iforma_pagamento">Forma de Pagamento</label>
                <select name="forma_pagamento" id="iforma_pagamento" onchange="CondicaoPagamento()" required>
                    <option value="Selecione">Selecione a forma de Pagamento</option>
                    <option value="Boleto">Boleto</option>
                    <option value="Cartao">Cartão</option>
                </select>
            </div>
            <div>
                <label for="icond_pagamento">Condição de Pagamento</label>
                <select name="condicao_pagamento" id="icond_pagamento" disabled required>
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
                <p id="valorParcela"><?php echo $valorPadrao;?></p>
            </div>
            <div class="valores">
                <p>Valor Total:</p>
                <p><?php echo $valorPadrao;?></p>
            </div>
            <div>
                <input type="submit" value="Confirmar" onclick="Corfirmar()">
            </div>
        </form>
    </section>
    <script>
        var valorParcela = document.getElementById("valorParcela");

        function CondicaoPagamento()
        {
            var formaPagamento = document.getElementById("iforma_pagamento").value;
            var condicaoPagamento = document.getElementById("icond_pagamento");

            if (formaPagamento === "Boleto") 
            {
                condicaoPagamento.value = "1";
                condicaoPagamento.disabled = true;
                valorParcela.innerHTML = "<?php echo $valorPadrao;?>";
            } 
            else if (formaPagamento === "Cartao") 
            {
                condicaoPagamento.disabled = false;
            }
            else if (formaPagamento === "Selecione")
            {
                condicaoPagamento.value = "0";
                condicaoPagamento.disabled = true;
                valorParcela.innerHTML = "<?php echo $valorPadrao;?>";
            }
        }

        var select = document.getElementById("icond_pagamento");

        select.onchange = function() {
            var valorSelecionado = parseInt(select.value);
            var valorTotal = parseInt("<?php echo $valor;?>");
            resultado = valorTotal / valorSelecionado;
            resultadoFormatado = resultado.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });

            valorParcela.innerHTML = resultadoFormatado;
        }

        function Confirmar() {
            var formaPagamento = document.getElementById("forma_pagamento").value;

            if (formaPagamento == 'Selecione')
            {
                alert("Selecione uma Forma de Pagamento!");
            }
        }
    </script>
    <?php 



        // $formaPagamento = $_POST["formapagamento"];
        
        // echo($formaPagamento);
        // {
        //     echo "<script>alert('Selecione a Forma de Pagamento!')</script>";
        // }
    ?>
</body>
</html>