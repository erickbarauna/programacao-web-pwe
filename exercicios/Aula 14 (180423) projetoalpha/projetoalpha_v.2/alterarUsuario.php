<?php 
    // Resgatando os dados do Usuário
    session_start();
    $email = $_SESSION['emailUsuario'];
    $senha = $_SESSION['senhaUsuario'];

    include "conexao.php";
    $comando = $conexao -> prepare("SELECT * FROM tb_usuario WHERE EMAIL_USUARIO = ? AND SENHA_USUARIO = ?");
    
    $comando -> bindParam(1, $email);
    $comando -> bindParam(2, $senha);

    if ($comando -> execute())
    {
        if ($comando -> rowCount() > 0)
        {
            while ($dados = $comando -> fetch(PDO::FETCH_OBJ))
            {
                $nomeUsuario = $dados -> NOME_USUARIO;
                $enderecoUsuario = $dados -> ENDERECO_USUARIO;
                $emailUsuario = $dados -> EMAIL_USUARIO;
                $senhaUsuario = $dados -> SENHA_USUARIO;
            }
        }
    }
    //

    if (isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado'))
    {
        $nomeNovo = $_POST['nome'];
        $endNovo = $_POST['end'];
        $emailNovo = $_POST['email'];
        $senhaNovo = $_POST['senha'];

        if ($senhaNovo == $_POST['senhaConfirm'])
        {
            include "conexao.php";

            $comando = $conexao->prepare("UPDATE tb_usuario SET NOME_USUARIO = ?, ENDERECO_USUARIO = ?, EMAIL_USUARIO = ?, SENHA_USUARIO = ? WHERE EMAIL_USUARIO = ? AND SENHA_USUARIO = ?");

            $comando -> bindParam(1, $nomeNovo);
            $comando -> bindParam(2, $endNovo);
            $comando -> bindParam(3, $emailNovo);
            $comando -> bindParam(4, $senhaNovo);
            $comando -> bindParam(5, $email);
            $comando -> bindParam(6, $senha);

            if ($comando -> execute()) {
                $_SESSION['nomeCadastrado'] = $nomeNovo;
                $_SESSION['endCadastrado'] = $endNovo;
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
    <link rel="stylesheet" href="perola.css">
</head>
<body>
    <header>
        <h1>Tela Alterar Usuário</h1>
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