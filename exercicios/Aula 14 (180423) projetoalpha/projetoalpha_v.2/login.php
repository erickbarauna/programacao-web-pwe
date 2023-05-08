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

        if (isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado'))
        {
            $botao = $_POST ["botao"]; 
            
            if ($botao == "Login")
            {
                $email = $_POST['email'];
                $senha = $_POST['senha'];

                include "conexao.php";

                $comando = $conexao -> prepare("SELECT EMAIL_USUARIO, SENHA_USUARIO  FROM tb_usuario WHERE EMAIL_USUARIO = ? AND SENHA_USUARIO = ?");

                $comando -> bindParam(1, $email);
                $comando -> bindParam(2, $senha);

                if ($comando -> execute())
                {
                    if ($comando -> rowCount() > 0)
                    {
                        $_SESSION['emailUsuario'] = $_POST['email'];
                        $_SESSION['senhaUsuario'] = $_POST['senha'];
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
                header('location:cadastro.php');
            }
        }
    ?>
</body>
</html>