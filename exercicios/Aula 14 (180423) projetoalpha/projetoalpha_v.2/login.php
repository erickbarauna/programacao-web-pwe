<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Login</title>
    <link rel="stylesheet" href="perola.css">
</head>
<body>
    <header>
        <h1>Tela Login</h1>
    </header>
    <main>
        <form action="login.php?valor=enviado" method="POST">
            <div>
                <label for="iemail">Email</label>
                <input type="email" name="email" id="iemail" placeholder="Digite seu email">
            </div>
            <div>
                <label for="isenha">Senha</label>
                <input type="password" name="senha" id="isenha" placeholder="Digite sua senha">
            </div>
            <div>
                <input type="submit" value="Cadastre-se" name="botao">
                <input type="submit" value="Login" name="botao">
            </div>
        </form>
    </main>
    <?php 
        session_start();
        
        // Verifica se o usuário enviou o formulário
        if (isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado'))
        {
            // Resgata o valor do botão que o usuário clicou
            $botao = $_POST ["botao"]; 
            
            if ($botao == "Login")
            {
                // Resgata os valores enviados pelo formulário
                $email = $_POST['email'];
                $senha = $_POST['senha'];

                // Faz a conexão com o banco de dados e retorna um objeto PDO
                include "conexao.php";

                // Faz uma consulta na tabelan tb_usuario onde o EMAIL_USUARIO e SENHA_USUARIO correspondem aos parâmetros fornecidos
                $comando = $conexao -> prepare("SELECT * FROM tb_usuario WHERE EMAIL_USUARIO = ? AND SENHA_USUARIO = ?");

                // Utiliza o $email e $senha como parâmetros   
                $comando -> bindParam(1, $email);
                $comando -> bindParam(2, $senha);

                // Executa a consulta
                if ($comando -> execute())
                {
                    // Verifica se a consulta retornou um registro (linha) na tabela
                    if ($comando -> rowCount() > 0)
                    {
                        // Seção usada no arquivo alterarUsuario.php
                        $_SESSION['emailUsuario'] = $email;
                        $_SESSION['senhaUsuario'] = $senha;

                        // Obtem os resultados da consulta 
                        while ($dados = $comando -> fetch(PDO::FETCH_OBJ))
                        {
                            $nomeUsuario = $dados -> NOME_USUARIO;
                            $enderecoUsuario = $dados -> ENDERECO_USUARIO;
                        }

                        // Seção usada no arquivo pedido.php
                        $_SESSION['nomeCadastrado'] = $nomeUsuario;
                        $_SESSION['endCadastrado'] = $enderecoUsuario;

                        // Usuário direcionado à página alterarusuario.php
                        header('location:alterarUsuario.php');
                    }
                    else
                    {
                        echo("<script>alert('Usuário não encontrado!')</script>");
                    }
                }
            }

            if ($botao == "Cadastre-se")
            {
                // Usuário direcionado à página cadastro.php
                header('location:cadastro.php');
            }
        }
    ?>
</body>
</html>