<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    
    // Contato com banco
    if(isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado'))
    {
        // Cria sessão se usuário tiver clicado no botao enviar do formulario

        $Nome = $_POST["nome_contato"];
        $Email = $_POST["email_contato"];
        $Fone = $_POST["fone_contato"];
        $Msg = $_POST["mensagem_contato"];
        $Assunto = $_POST["assunto_contato"];
        $Resposta = null;

        echo ("<header><h1>Dados Cadastrados</h1></header>");
        echo ("<section>Nome: " .$Nome .'<br>');
        echo ("Email: " .$Email .'<br>');
        echo ("Assunto: " .$Assunto .'<br>');
        echo ("Fone: " .$Fone .'<br>');
        echo ("Mensagem: " .$Msg .'<br></section>');

        $Resposta = null;
        include "conexao.php";

        try
        {
            $Comando = $conexao->prepare("INSERT INTO TB_FALECONOSCO (NOME_CONTATO, FONE_CONTATO, EMAIL_CONTATO, ASSUNTO_CONTATO, MSG_CONTATO, RESP_CONTATO) VALUES ( ?, ?, ?, ?, ?, ?)");

            $Comando->bindParam(1, $Nome);
            $Comando->bindParam(2, $Fone);
            $Comando->bindParam(3, $Email);
            $Comando->bindParam(4, $Assunto);
            $Comando->bindParam(5, $Msg);
            $Comando->bindParam(6, $Resposta);

            if ($Comando->execute())
            {
                if ($Comando->rowCount() > 0)
                {
                    echo "<script> alert('Contato registrado com sucesso!')</script>";
                    echo ('<meta http equiv="refresh"content=0;"contato.php">');

                    $Nome = null;
                    $Email = null;
                    $Fone = null;
                    $Msg = null;
                    $Assunto = null;
                    $Resposta = null;
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
        catch (PDOException $erro)
        {
            echo "Erro" .$erro->getMessage();
        }
    }
    else 
    {
        ?>
        <header>
            <h1>Tela Fale Conosco</h1>
        </header>
        <section>
            <form name="form1" action="contato.php?valor=enviado" method="post">
                <div>
                    <label for="inome_contato">Nome:</label>
                    <input type="text" name="nome_contato" size="35" id="inome_contato" placeholder="Preencha seu Nome">
                </div>
                <div>
                    <label for="iemail_contato">E-mail:</label>
                    <input type="text" name="email_contato" placeholder="email@servidor.com" size="35" id="iemail_contato">
                </div>
                <div>
                    <label for="ifone_contato">Telefone:</label>
                    <input type="text" name="fone_contato" id="ifone_contato" placeholder="(00) 0-0000-0000" size="35">
                </div>
                <div>
                    <label for="iassunto_contato">Assunto:</label>
                    <select name="assunto_contato" id="iassunto_contato">
                        <option default value="Selecione">Selecione o assunto!</option>
                        <option value="Duvidas">Dúvidas</option>
                        <option value="Elogios">Elogios</option>
                        <option value="Reclamações">Reclamações</option>
                        <option value="Sugestões">Sugestões</option>
                    </select>
                </div>
                <div>
                    <label for="imensagem_contato">Mensagem:</label>
                    <br>
                    <textarea name="mensagem_contato" id="imensagem_contato" cols="40" rows="8"></textarea>
                </div>
                <br>
                <div>
                    <input type="submit" value="Enviar">
                    <input type="reset" name="Limpar" value="Redefinir">
                </div>
                <div>
                    <label id="aviso">Preencher os campos, para enviar!</label>
                </div>
            </form>
        </section>
    <?php 
    }
    ?>
</body>
</html>