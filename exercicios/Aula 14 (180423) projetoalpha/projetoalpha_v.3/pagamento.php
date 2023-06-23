<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Pagamento</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php 
        // Conecta o banco de dados
        include "conexao.php";

        session_start();

        // Resgata o 'modelo' do produto selecionado na página vitrine.php
        $modelo = $_SESSION['modeloReferencia'];

        // Busca todos os campos do produto na tabela tb_produto
        $tabela = $conexao -> prepare("SELECT * FROM tb_produto WHERE MODELO_PRODUTO = ?");

         // Utiliza o 'modelo' recebido da página vitrine.php como parâmetro
        $tabela -> bindParam(1, $modelo);

        // Executa o comando
        $tabela -> execute();

        // Percorre os resultados com o método "fetch" do objeto armzenando o valor do produto em uma variável $valor
        while ($dados = $tabela -> fetch(PDO::FETCH_OBJ)) $valor = $dados -> VALOR_PRODUTO;

        // Formata a variável $valor para o padrão monetário brasileiro
        $padraoBr = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
        $valorPadrao = numfmt_format_currency($padraoBr, $valor, "BRL");

        // Verifica se o usuário enviou o formulário
        if (isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado'))
        {
            session_start();

            // Seções usadas na página pedido.php
            $_SESSION['forma_pagamento'] = $_POST['formaPagamento'];
            $_SESSION['valor_parcela'] = $_POST['condicaoPagamento'];

            // Usuário direcionado à página pedido.php
            header("Location: pedido.php");
        } 
    ?>
    <header>
        <h1>Pagamento</h1>
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
                // Percorre as opções da parcela de trás para frente para determinar o número de opções disponíveis, o loop continua até que o índice alcance o valor zero 
                for (var i = condicaoPagamento.options.length - 1; i >= 0; i--) {

                    // Cria uma nova variável chamada option e a define como a opção atual do loop for a cada iteração, usando a propriedade options do elemento condicaoPagamento.
                    var option = condicaoPagamento.options[i];

                    // Verifica se o valor da opção atual é diferente de "1", se for diferente, a propriedade disabled da opção é definida como true, desabilitando a opção no formulário
                    if (option.value !== "1") {option.disabled = true;}

                    // Caso contrário, a propriedade disabled é definida como false, habilitando a opção no formulário.
                    else { option.disabled = false;}
                }

                // Atualiza o valor da parcela na página HTML
                valorParcela.innerHTML = "<?php echo $valorPadrao;?>";
            } 
            else if (formaPagamento === "Cartao") 
            {
                // Este bloco for percorre todas as opções do elemento HTML condicaoPagamento, começando da última opção e indo até a primeira, a variável i é o índice da opção atual no loop
                for (var i = condicaoPagamento.options.length - 1; i >= 0; i--) {
                    var option = condicaoPagamento.options[i];

                    // Verifica se o valor da opção atual é diferente de "0", se for, a propriedade disabled da opção é definida como false, habilitando a opção no formulário.
                    if (option.value !== "0") {option.disabled = false;}

                    // Caso contrário, a propriedade disabled é definida como true, desabilitando a opção no formulário.
                    else { option.disabled = true;}
                }
            }
            // Se nenhuma opção for selecionada na forma de pagamento, a opção das parcelas é desabilitada
            else if (formaPagamento === "")
            {
                condicaoPagamento.value = "0";
                condicaoPagamento.disabled = true;
                valorParcela.innerHTML = "<?php echo $valorPadrao;?>";
            }
        }

        var select = document.getElementById("icondPagamento");

        select.onchange = function() {
            // Esta linha de código obtém o valor da opção selecionada no elemento HTML
            var valorSelecionado = parseInt(select.value);

            // Esta linha de código obtém o valor da variável PHP            
            var valorTotal = parseInt("<?php echo $valor;?>");

            // Esta linha de código calcula o valor da parcela, dividindo o valor total da compra pelo número de parcelas selecionado, o resultado é armazenado na variável resultado.
            resultado = valorTotal / valorSelecionado;

            // Esta linha de código formata o valor da parcela como uma string no formato de moeda brasileira (BRL)
            resultadoFormatado = resultado.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });

            // Esta linha de código atualiza o conteúdo de um elemento HTML
            valorParcela.innerHTML = resultadoFormatado;
        }
    </script>
</body>
</html>