<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Tela Cadastro</h1>
    </header>
    <section>
        <form action="cadastroAdm.php?valor=enviado" method="POST" name="form1">
            <div>
                <label for="inome_cadastro">Nome:</label>
                <input type="text" name="nome_cadastro" id="inome_cadastro" placeholder="Preencha seu Nome">
            </div>
            <div>
                <label for="iusuario_cadastro">Usuário: (Email)</label>
                <input type="email" name="usuario_cadastro" id="iusuario_cadastro" placeholder="Preencha seu E-mail">
            </div>
            <div>
                <label for="isenha_cadastro">Senha:</label>
                <input type="password" name="senha_cadastro" id="isenha_cadastro" placeholder="Preencha sua Senha" maxlength="8" required>
            </div>
            <div>
                <label for="isenha_confirma">Confirmar senha:</label>
                <input type="password" name="senha_confirma" id="isenha_confirma" placeholder="Preencha sua Senha" maxlength="8" required>
            </div>
            <br>
            <div>
                <input type="submit" value="Inserir" name="botao">
            </div>
            <div>
                <label id="aviso">Preencher os campos, para enviar!</label>
            </div>
        </form>
    </section>
    <?php 
        session_start();

        if (isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado'))
        {
            $Botao = $_POST['botao'];
            $Nome = $_POST['nome_cadastro'];
            $Email = $_POST['usuario_cadastro'];
            $SenhaAdm = $_POST['senha_cadastro'];

            include "conexao.php";

            if ($Botao == "Inserir")
            {
                try
                {
                    if ($_POST["senha_cadastro"] == $_POST["senha_confirma"])
                    {
                        $Comando = $conexao -> prepare("INSERT INTO TB_CADASTRO_ADM (NOME_ADM, EMAIL_ADM, SENHA_ADM) VALUES ( ?, ?, ?)");

                        $Comando -> bindParam(1, $Nome);
                        $Comando -> bindParam(2, $Email);
                        $Comando -> bindParam(3, $SenhaAdm);

                        if ($Comando -> execute())
                        {
                            if ($Comando -> rowCount() > 0)
                            {
                                echo "<script>alert('Cadastro Realizado com Sucesso!')</script>";

                                $Nome = null;
                                $Email = null;
                                $Senha = null;
                                $_SESSION["controleAdm"] == "cadastrado";

                                echo "<a href=\"LoginAdm.php\">Cadastrado</a>";
                            }
                            else 
                            {
                                echo "Erro ao tentar efetivar o contato.";
                            }
                        }
                        else
                        {
                            throw new PDOException("Erro: Não foi possível executar a declaração sql.");
                        }
                    }
                    else
                    {
                        echo("<p>Senha não confere</p>");
                        echo("<a href=\"CadastroAdm.php\">Cadastro</a>");
                    }
                }
                catch (PDOException $erro)
                {
                    echo"Erro" . $erro -> getMessage();
                }
            }
        }
    ?>
</body>
</html>