<?php
// Testando sessões em PHP

if(isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado')) 
{
    // Cria sessão se o usuário tiver clicado no botão Enviar do formulário

    session_start();

    // Cria variáveis de sessão e as inicializa com os dados do formulário

    $_SESSION['nome'] = $_POST['nome_usuario'];
    $_SESSION['cpf'] = $_POST['cpf_usuario'];

    // Exibe link para a página 02;

    echo "<a href='session_banco.php'>Continuar Cadastro</a>";
}
else 
{
    // Se o usuário ainda não clicou no botão de enviar, mostra o formulário na página:

    ?>

    <form name="form1" action="session_cadastro.php?valor=enviado" method="POST">
        <div>
            <label for="inome">Digite seu nome:</label>
            <input type="text" name="nome_usuario" id="inome">
        </div>
        <br>
        <div>
            <label for="icpf">Digite seu CPF:</label>
            <input type="text" name="cpf_usuario" id="icpf" placeholder="000.000.000-00" maxlenght="14">
        </div>
        <br>
        <div>
            <input type="submit">
        </div>
    </form>
<?php
}
?>