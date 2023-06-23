<?php 
    session_start();

    $nome = $_SESSION['nomeCadastrado'];
    $endereco = $_SESSION['endCadastrado'];
    
    // Faz a conexão com o banco de dados e retorna um objeto PDO
    include "conexao.php";

    // Seleciona todos os pedidos feito pelo usuario na tabela tb_pedido
    $tabela = $conexao -> prepare("SELECT * FROM tb_pedido WHERE NOME_USUARIO = ? AND ENDERECO_USUARIO = ?");

    // Utiliza o $nome e $endereco como parâmetros  
    $tabela -> bindParam(1, $nome);
    $tabela -> bindParam(2, $endereco);

    // Executa o comando
    $tabela -> execute();

    // Recebe os dados dos produtos buscados na tabela
    $pedidos = array();

    // Armazena todos os registros em um objeto $dados
    while ($dados = $tabela -> fetch(PDO::FETCH_OBJ))
    {
        $pedido = array(
            'nome' => $dados -> NOME_USUARIO,
            'endereco' => $dados -> ENDERECO_USUARIO,
            'condicaoPagamento' => $dados -> CONDICAO_PGTO,
            'formaPagamento' => $dados -> FORMA_PGTO.' vez(es)',
            'valorParcela' => $dados -> VALOR_PARCELA,
            'valorProduto' => $dados -> VALOR_PRODUTO,
        );
        
        array_push($pedidos, $pedido);
    }

    if (isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado'))
    {
        $nomeAlterar = $_POST["nome"]; 
        $enderecoAlterar = $_POST["endereco"]; 

        // Conecta o banco  de dados
        include "conexao.php";

        // Insere os parâmetros nas colunas da tabela 
        $Comando = $conexao -> prepare("UPDATE tb_pedido SET NOME_USUARIO = ?, ENDERECO_USUARIO = ? WHERE NOME_USUARIO = ? AND ENDERECO_USUARIO = ?");

        // Parâmetros resgatados durando todo o processo de compra
        $Comando -> bindParam(1, $nomeAlterar);
        $Comando -> bindParam(2, $enderecoAlterar);
        $Comando -> bindParam(3, $nome);
        $Comando -> bindParam(4, $endereco);

        $_SESSION['nomeCadastrado'] = $nomeAlterar;
        $_SESSION['endCadastrado'] = $enderecoAlterar;

        // Executa o comando
        $Comando -> execute();

        header('Location: gerenciarPedido.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Pedido</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <h1>Gerênciar Pedido</h1>
    </header>
    <main>
        <form action="gerenciarPedido.php?valor=enviado" method="POST">
            <p>A alteração é opcional*</p>
            <div>
                <label for="inome">Nome</label>
                <input type="text" name="nome" id="inome" required value="<?php echo($nome);?>">
            </div>
            <div>
                <label for="iendereco">Endereço</label>
                <input type="text" name="endereco" id="iendereco" required value="<?php echo($endereco);?>">
            </div>
            <div>
                <input type="submit" value="Alterar">
            </div>
        </form>
    </main>
    <section>
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Condição de Pagamento</th>
                        <th>Forma de Pagamento</th>
                        <th>Valor da Parcela</th>
                        <th>Valor do Produto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pedidos as $linha): ?>
                        <tr>
                            <?php foreach ($linha as $item): ?>
                                <td><?php echo $item;?></td>
                            <?php endforeach;?>
                        </tr>
                        <?php endforeach;?>
                </tbody>
            </table>
        </section>
</body>
</html>