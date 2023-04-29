<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        session_start();

        echo "<p>Dados do Usuário Administrativo:</p>";
        echo "<p>Nome: " .$_SESSION['nomeAdm'] ."</p>";
        echo "<p>Usuário: " .$_SESSION['emailAdm'] ."</p>";

        if ($_SESSION['controleAdm'] == 'alterado')
        {
            echo "<p> Cadastro atualizado com sucesso:</p>";
        }
        else
        {
            echo "<p>Preencha o campo desejado para ser alterado:</p>";
        }

        if (isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado'))
        {
            $Botao = $_POST['botao'];

            if ($Botao == "Alterar")
            {
                include "alterdoAdm.php";
            }
            if ($Botao == "Gerenciar")
            {
                $_SESSION['controleResp'] = "gerenciar";
                header('location:faleConoscoAdm.php');
            }
        }
    ?>
    <header>
        <h1>Dados da Conta</h1>
    </header>
    <section>
        <form action="AlterarAdm.php?valor=enviado" method="POST" name="form1">
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
                <input type="submit" value="Alterar" name="botao">
                <input type="button" value="Gerenciar" name="botao">
            </div>
        </form>
    </section>
</body>
</html>