<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ADM</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Tela Login</h1>
    </header>
    <section>
        <form action="loginAdm.php?valor=enviado" method="post">
            <div>
                <label for="iusuario_login">Usuário:</label>
                <input type="text" placeholder="Preencha seu E-mail" name="usuario_login" id="iusuario_login">
            </div>
            <div>
                <label for="isenha_login">Senha:</label>
                <input type="password" name="senha_login" id="isenha_login" placeholder="Preencha sua Senha" maxlength="8">
            </div>
            <br>
            <div>
                <input type="submit" value="Cadastro" name="botao">
                <input type="submit" value="Login" name="botao">
            </div>
        </form>
    </section>
    <?php 
        if (isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado'))
        {
            $Botao = $_POST["botao"];

            if ($Botao == "Logar")
            {
                session_start();
                $_SESSION["controleAdm"] = "logado";
                include "LogadoAdm.php";
            }
            
            if ($Botao == "Cadastro")
            {
                session_start();
                $_SESSION["controleAdm"] = "novo";
                // Será marcado como novo para sabermos que o usuário não tem cadastro
                echo "<a href=\"cadastro.php\">Novo</a>";
            }
        }
    ?>
</body>
</html>