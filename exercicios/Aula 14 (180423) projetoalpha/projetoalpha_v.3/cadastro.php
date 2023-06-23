<?php 
    // Verifica se o usuário enviou o formulário
    if (isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado')) 
    {
        // Resgata os valores enviados pelo formulário
        $nome = $_POST["nome"];
        $endereco = $_POST["end"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        // Conecta o banco de dados
        include "conexao.php";

        // Envolve o código de inserção dos dados para tratar possíveis exceções
        try 
        {
            // Verifica se as senhas são iguais
            if ($senha == $_POST["senhaConfirm"])
            {
                // Chama os campos tabela tb_usuario e insere os dados com os parâmetros correspondentes
                $Comando = $conexao -> prepare("INSERT INTO tb_usuario (NOME_USUARIO, ENDERECO_USUARIO, EMAIL_USUARIO, SENHA_USUARIO) VALUES (?, ?, ?, ?)");

                // Utiliza as variavéis do formulário como parâmetros 
                $Comando -> bindParam(1, $nome);
                $Comando -> bindParam(2, $endereco);
                $Comando -> bindParam(3, $email);
                $Comando -> bindParam(4, $senha);

                // Verifica se os dados foram inseridos  com sucesso
                if ($Comando -> execute())
                {
                    // Usuário direcionado à página login.php
                    header('Location: login.php');
                }
                else
                {
                    throw new PDOException("Erro: Não foi possível executar a declaração sql.");
                }
            }
            else
            {
                echo("<script>alert('As senhas não são iguais!')</script>");
            }
        }
        catch (PDOException $erro) 
        {
            // Captura o código de erro retornado pela exceção e exibi uma mensagem de erro personalizada com base no código
            switch ($erro -> getCode()) {
                case "23000":
                $mensagem = "Este e-mail já está em uso. Por favor, tente novamente com um e-mail diferente.";
                break;
                default:
                $mensagem = "Ocorreu um erro ao cadastar os dados. Por favor, tente novamente.";
                break;
            }
            echo "<script>alert('$mensagem')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Cadastro</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <h1>Cadastro</h1>
    </header>
    <main>
        <form action="cadastro.php?valor=enviado" method="POST">
            <div>
                <label for="inome">Nome</label>
                <input type="text" name="nome" id="inome" required>
            </div>
            <div>
                <label for="iend">Endereço</label>
                <input type="text" name="end" id="iend" required>
            </div>
            <div>
                <label for="iemail">Email</label>
                <input type="email" name="email" id="iemail" required>
            </div>
            <div>
                <label for="isenha">Senha</label>
                <input type="password" name="senha" id="isenha" required>
            </div>
            <div>
                <label for="isenhaConfirm">Confirmar Senha</label>
                <input type="password" name="senhaConfirm" id="isenhaConfirm" required>
            </div>
            <div>
                <input type="submit" value="Cadastrar Dados">
            </div>
        </form>
    </main>
</body>
</html>