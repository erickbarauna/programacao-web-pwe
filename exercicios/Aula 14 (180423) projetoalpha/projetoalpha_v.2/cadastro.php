<?php 
    if (isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado')) 
    {
        $nome = $_POST["nome"];
        $endereco = $_POST["end"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        include "conexao.php";

        try 
        {
            if ($senha = $_POST["senhaConfirm"])
            {
                $Comando = $conexao -> prepare("INSERT INTO tb_usuario (NOME_USUARIO, ENDERECO_USUARIO, EMAIL_USUARIO, SENHA_USUARIO) VALUES (?, ?, ?, ?)");

                $Comando -> bindParam(1, $nome);
                $Comando -> bindParam(2, $endereco);
                $Comando -> bindParam(3, $email);
                $Comando -> bindParam(4, $senha);

                if ($Comando -> execute())
                {
                    if ($Comando -> rowCount() > 0)
                    {
                        echo("<script>alert('Cadastro realizado com sucesso!')</script>");

                        session_start();
                        $_SESSION['nomeCadastrado'] = $nome;
                        $_SESSION['endCadastrado'] = $endereco;

                        header('Location: pagamento.php');
                    }
                    else
                    {
                        echo("Erro ao tentar efetivar o contato!");
                    }
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
            echo("Erro" . $erro -> getMessage());
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
    <link rel="stylesheet" href="perola.css">
</head>
<body>
    <header>
        <h1>Tela Cadastro</h1>
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
                <input type="submit" value="Confirmar Dados">
            </div>
        </form>
    </main>
</body>
</html>