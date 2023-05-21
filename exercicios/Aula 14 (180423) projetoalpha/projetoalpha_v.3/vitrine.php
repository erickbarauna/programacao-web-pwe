<?php 
    // Conecta o banco de dados
    include "conexao.php";

    // Seleciona todos os registros da tabela tb_produto
    $tabela = $conexao -> prepare("SELECT * FROM tb_produto");

    // Executa o comando
    $tabela -> execute();

    // Recebe os dados dos produtos buscados na tabela
    $produtos = array();

    // Armazena todos os registros em um objeto $dados
    while ($dados = $tabela -> fetch(PDO::FETCH_OBJ))
    {
        $produto = array(
            // Cada registro é armazenado em variáveis separadas
            'foto' => $dados -> FOTO_PRODUTO,
            'fabricante' => $dados -> FABRICANTE_PRODUTO,
            'modelo' => $dados -> MODELO_PRODUTO
        );
        
        array_push($produtos, $produto);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Vitrine</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <h1>Tela Vitrine</h1>
    </header>
    <main>
        <div class="vitrine">
            <div class="produto-vitrine">
                 <div class="titulo">
                    <h1>
                        <?php echo($produtos[0]['fabricante']);?>
                    </h1>
                    <strong>
                        <?php echo($produtos[0]['modelo']);?>
                    </strong>
                </div>
                <img src="<?php echo($produtos[0]['foto']);?>" alt="">
            </div>
            <div class="produto-vitrine">
                <div class="titulo">
                    <h1>
                        <?php echo($produtos[1]['fabricante']);?>
                    </h1>
                    <strong>
                        <?php echo($produtos[1]['modelo']);?>
                    </strong>
                </div>
                <img src="<?php echo($produtos[1]['foto']);?>" alt="">
            </div>
        </div>
        <p class="msg"><i>*Clique no Produto</i></p>
    </main>
</body>