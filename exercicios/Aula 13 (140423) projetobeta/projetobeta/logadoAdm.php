<?php 
    // session_star inicia a seção

    // As variáveis login e senha recebem os dados na página anterior
    $login = $_POST['usuario_login'];
    $senha = $_POST['senha_login'];
    
    // As próximas 3 linhas são responsáveis em se conectar com o banco de dados

    include "conexao.php";

    // A variável $result pega as váriaveis $login e $senha, faz uma pesquisa na tabela de usuários

    $Comando = $conexao -> prepare("SELECT ID_ADM, NOME_ADM, EMAIL_ADM, SENHA_ADM FROM TB_CADASTRO_ADM WHERE EMAIL_ADM = ? AND SENHA_ADM = ?");

    $Comando -> bindParam(1, $login);
    $Comando -> bindParam(2, $senha);

    if ($Comando -> execute())
    {
        if ($Comando -> rowCount() > 0)
        {
            while ($Linha = $Comando -> fetch(PDO::FETCH_OBJ))
            {
                $id = $Linha -> ID_ADM;
                $_SESSION['IdAdm'] = $id;

                $nome = $Linha -> NOME_ADM;
                $_SESSION['nomeAdm'] = $nome;

                $email = $Linha -> EMAIL_ADM;
                $_SESSION['emailAdm'] = $email;

                $senha = $Linha -> SENHA_ADM;
                $_SESSION['senha$senhaAdm'] = $senha;

                header('location:alternarAdm.php');
            }
        }
        else
        {
            unset($_SESSION['controle']);

            echo "<script>alert('Usuário e/ou senha não confere!')</script>";

            echo "<a href=\"loginAdm.php\">Retornar</a>";
        }
    }

?>