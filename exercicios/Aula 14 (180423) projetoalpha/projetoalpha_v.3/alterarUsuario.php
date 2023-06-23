<?php 
    session_start();

    // Seções criadas no arquivo login.php
    $email = $_SESSION['emailUsuario'];
    $senha = $_SESSION['senhaUsuario'];

    // Conecta o banco de dados
    include "conexao.php";
   
    // Faz a mesma consulta na tabela tb_usuario que é feita na página login.php
    $comando = $conexao -> prepare("SELECT * FROM tb_usuario WHERE EMAIL_USUARIO = ? AND SENHA_USUARIO = ?");
    
    // Utiliza os mesmos parâmetros $email e $senha
    $comando -> bindParam(1, $email);
    $comando -> bindParam(2, $senha);

    // Executa a consulta
    if ($comando -> execute())
    {
        // Verifica se a consulta retornou um registro (linha) na tabela
        if ($comando -> rowCount() > 0)
        {
            // Armazena todos os registros em um objeto $dados
            while ($dados = $comando -> fetch(PDO::FETCH_OBJ))
            {
                // Cada registro é armazenado em variáveis separadas
                $nomeUsuario = $dados -> NOME_USUARIO;
                $enderecoUsuario = $dados -> ENDERECO_USUARIO;
                $emailUsuario = $dados -> EMAIL_USUARIO;
                $senhaUsuario = $dados -> SENHA_USUARIO;
            }
        }
    }
    
    // Verifica se o usuário enviou o formulário
    if (isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado'))
    {
        // Resgata os valores enviados pelo formulário
        $nomeNovo = $_POST['nome'];
        $endNovo = $_POST['end'];
        $emailNovo = $_POST['email'];
        $senhaNovo = $_POST['senha'];

        // Verifica se as senhas são iguais
        if ($senhaNovo == $_POST['senhaConfirm'])
        {
            // Conecta o banco de dados
            include "conexao.php";

            // Faz uma consulta na tabelan tb_usuario onde o EMAIL_USUARIO e SENHA_USUARIO correspondem aos parâmetros fornecidos e atualiza os todos os valores do usuário
            $comando = $conexao->prepare("UPDATE tb_usuario SET NOME_USUARIO = ?, ENDERECO_USUARIO = ?, EMAIL_USUARIO = ?, SENHA_USUARIO = ? WHERE EMAIL_USUARIO = ? AND SENHA_USUARIO = ?");

            // Atualiza todos os dados do usuário seguindo os parâmetros abaixo
            $comando -> bindParam(1, $nomeNovo);
            $comando -> bindParam(2, $endNovo);
            $comando -> bindParam(3, $emailNovo);
            $comando -> bindParam(4, $senhaNovo);
            $comando -> bindParam(5, $email);
            $comando -> bindParam(6, $senha);

            // Verifica se os dados foram atualizados com sucesso
            if ($comando -> execute()) {

                // Seções usadas na página pedido.php
                $_SESSION['nomeCadastrado'] = $nomeNovo;
                $_SESSION['endCadastrado'] = $endNovo;

                // Usuário direcionado à página pagamento.php
                header('Location: pagamento.php');
            } else {
                echo "<script>alert('Erro ao atualizar os dados!')</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Alterar Usuário</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <h1>Alterar Usuário</h1>
    </header>
    <main>
        <form action="alterarUsuario.php?valor=enviado" method="POST" id="iform">
            <label>O preenchimento do formulário é opcional</label>
            <br>
            <div>
                <label for="inome">Nome</label>
                <input type="text" name="nome" id="inome" required value="<?php echo($nomeUsuario);?>">
            </div>
            <div>
                <label for="iend">Endereço</label>
                <input type="text" name="end" id="iend" required value="<?php echo($enderecoUsuario);?>">
            </div>
            <div>
                <label for="iemail">Email</label>
                <input type="email" name="email" id="iemail" required value="<?php echo($emailUsuario);?>">
            </div>
            <div>
                <label for="isenha">Senha</label>
                <input type="password" name="senha" id="isenha" required value="<?php echo($senhaUsuario);?>">
            </div>
            <div>
                <label for="isenhaConfirm">Confirmar Senha</label>
                <input type="password" name="senhaConfirm" id="isenhaConfirm" required value="<?php echo($senhaUsuario);?>">
            </div>
            <div>
                <input type="submit" value="Confirmar Dados">
            </div>
        </form>
    </main>
</body>
</html>