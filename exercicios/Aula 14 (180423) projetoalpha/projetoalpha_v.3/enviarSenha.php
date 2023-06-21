<?php
    // E-mail resgatado de login.php 
    $email = $_POST['emailRecuperar'];

    echo($email);
    
    // Conecta o banco de dados
    include "conexao.php";

    // Resgata a senha do Usuaário

    // Seleciona a o campo SENHA_USUARIO onde o EMAIL_USUARIO for igual ao parâmetro enviado
    $tabela = $conexao -> prepare("SELECT SENHA_USUARIO FROM tb_usuario WHERE EMAIL_USUARIO = ?");
        
    // Utiliza o $email como parâmetro
    $tabela -> bindParam(1, $email);

    // Executa o comando
    $tabela -> execute();

    // Armazena todos os registros em um objeto $dados
    while ($dados = $tabela -> fetch(PDO::FETCH_OBJ))
    {
        // Cada registro é armazenado em variáveis separadas
        $senha = $dados -> SENHA_USUARIO;
        $senha = "Sua senha é: $senha";
    }

    $dataEnvio = date('d/m/Y');
    $horaEnvio = date('H:i:s');

    require_once("phpmailer/class.phpmailer.php");
    
    include "senhaEmail.php";

    $para = $email;
    $de = "ericksbarauna36@outlook.com";
    $de_nome = "Erick Barauna";
    $assunto = "Senha Esquecida";
    

    function smtpmailer($para, $de, $de_nome, $assunto, $senha)
    {
        global $error;
        $mail = new PHPMailer();
        $mail -> IsSMTP(); // Ativa o SMTP
        $mail -> SMTPDebug = 0; // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
        $mail -> SMTPAuth = true; // Padão de atividade
        $mail -> SMTPSecure = 'tls'; // Padrão de segurança
        $mail -> Host = 'smtp.office365.com'; // SMTP utilizado
        $mail -> Port = 587; // A porta 587 deverá estar aberta em seu servidor
        $mail -> Username = USER; 
        $mail -> Password = PWD;
        $mail -> SetFrom($de, $de_nome);
        $mail -> Subject = $assunto;
        $mail -> Body = $senha;
        $mail -> AddAddress($para);

        if (!$mail -> Send())
        {
            $error = 'Mail error: ' . $mail -> ErrorInfo;
            return false;
        }
        else
        {
            $error = 'Mensagem enviada';
            return true;
        }
    }

    $Vai = "E-mail: $email\n\nResposta: $senha";

    if (smtpmailer($para, $de, $de_nome, $assunto, $Vai))
    {
        // echo('E-mail enviado com sucesso.');          
        header('Location: emailEnviado.php');
    }

    if (!empty($error)) echo $error;

    
?>