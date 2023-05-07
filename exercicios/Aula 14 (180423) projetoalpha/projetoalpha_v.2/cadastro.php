<?php 
    session_start();

    if ($_SESSION['usuario'] == 'novoUsuario')
    {
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
    }
    else
    {
        $_SESSION['emailUsuario'];
        $_SESSION['senhaUsuario'];

        include "conexao.php";
        $comando = $conexao -> prepare("SELECT * FROM tb_usuario WHERE EMAIL_USUARIO = ? AND SENHA_USUARIO = ?");
        
        $comando -> bindParam(1, $email);
        $comando -> bindParam(2, $senha);

        if ($comando -> execute())
        {
            if ($comando -> rowCount() > 0)
            {
                while ($dados = $tabela -> fetch(PDO::FETCH_OBJ))
                {
                    $nomeUsuario = $dados -> NOME_USUARIO;
                    $enderecoUsuario = $dados -> ENDERECO_USUARIO;
                    $emailUsuario = $dados -> EMAIL_USUARIO;
                    $senhaUsuario = $dados -> SENHA_USUARIO;
                }
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
                <input type="text" name="nome" id="inome" required value="opinha">
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
    <script>
        alert("oi");
        var nomeInput = document.getElementById("inome");
        var endInput = document.getElementById("iend");
        var emailInput = document.getElementById("iemail");
        var senhaInput = document.getElementById("isenha");
        var senhaConfirmInput = document.getElementById("isenhaConfirm");

        nomeInput.value = "<?php echo($nomeUsuario);?>";
        endInput.value = "<?php echo($enderecoUsuario);?>";
        emailInput.value = "<?php echo($emailUsuario);?>";
        senhaInput.value = "<?php echo($senhaUsuario);?>";
        senhaConfirmInput.value = "<?php echo($senhaUsuario);?>";
    </script>
</body>
</html>