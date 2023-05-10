<?php 
    include "conexao.php";

    // Seleciona todos os registros da tabela tb_produto
    $tabela = $conexao -> prepare("SELECT * FROM tb_produto");
    $tabela -> execute();

    // Armazena em um objeto chamado $dados
    while ($dados = $tabela -> fetch(PDO::FETCH_OBJ))
    {
        // Cada registro é armazenado em variáveis separadas
        $foto = $dados -> FOTO_PRODUTO;
        $valor = $dados -> VALOR_PRODUTO;
        $fabricante = $dados -> FABRICANTE_PRODUTO;
        $modelo = $dados -> MODELO_PRODUTO;
        $fichaTec = $dados -> FICHATEC_PRODUTO;
        $ano = $dados -> ANO_PRODUTO;
        $combustivel = $dados -> COMBUSTIVEL_PRODUTO;
        $velMax = $dados -> VELMAX_PRODUTO;
        $lugares = $dados -> LUGARES_PRODUTO;
        $portas = $dados -> PORTAS_PRODUTO;
        $cambio = $dados -> CAMBIO_PRODUTO;
        $precedencia = $dados -> PRECEDENCIA_PRODUTO;
        $marchas = $dados -> MARCHAS_PRODUTO;
        $aceleracao = $dados -> ACELERACAO_PRODUTO;
        $cilindros = $dados -> CILINDRO_PRODUTO;
        $potencia = $dados -> POTENCIA_PRODUTO;
        $torque = $dados -> TORQUE_PRODUTO;
        $tracao = $dados -> TRACAO_PRODUTO;
    }

    // Formatando o $valor para o padrão monetário brasileiro
    $padraoBr = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
    $valor = numfmt_format_currency($padraoBr, $valor, "BRL");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Produto</title>
    <link rel="stylesheet" href="perola.css">
</head>
<body>
    <header>
        <h1>Tela Produto</h1>
    </header>
    <main>
        <div class="produto">
            <div class="imagem">
                <img src="<?php echo($foto);?>" alt="Dodge Viper SRT V10">
            </div>
            <div class="desc">
                <div class="titulo">
                    <h1><?php echo($fabricante);?></h1><strong><?php echo($modelo);?></strong>
                </div>
                <p class="sub-titulo"><?php echo($fichaTec);?></p>
                <div class="info">
                    <div>
                        <p><strong>Ano:</strong> <?php echo($ano); ?></p>
                        <p><strong>Combustível:</strong> <?php echo($combustivel); ?></p>
                        <p><strong>Vel.Máx:</strong> <?php echo($velMax); ?></p>
                        <p><strong>Lugares:</strong> <?php echo($lugares); ?></p>
                        <p><strong>Portas:</strong> <?php echo($portas); ?></p>
                        <p><strong>Cambio:</strong> <?php echo($cambio); ?></p>
                        <p><strong>Precedência:</strong> <?php echo($precedencia); ?></p>
                        <p><strong>Marchas:</strong> <?php echo($marchas); ?></p>
                        <p><strong>0-100km/h:</strong> <?php echo($aceleracao); ?></p>
                        <p><strong>Cilindros:</strong> <?php echo($cilindros); ?></p>
                        <p><strong>Potência:</strong> <?php echo($potencia); ?></p>
                        <p><strong>Torque:</strong> <?php echo($torque); ?></p>
                        <p><strong>Tração:</strong> <?php echo($tracao); ?></p>
                    </div>
                </div>
                <div class="valor">
                    <h2><?php echo($valor); ?></h2>
                    <button onclick="Comprar()">COMPRAR</button>
                </div>
            </div>
        </div>
    </main>
    <script>
        // Direciona o usuário para a página de login ao clicar no botão "COMPRAR"
        function Comprar()
        {
            window.location.href = 'login.php';
        }
    </script>
</body>
</html>