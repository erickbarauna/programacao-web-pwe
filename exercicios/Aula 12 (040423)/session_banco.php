<?php
// Testando sessões em PHP

if(isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado')) 
{
    // Cria sessão se o usuário tiver clicado no botão Enviar do formulário

    session_start();

    // Cria variáveis de sessão e as inicializa com os dados do formulário

    $_SESSION['banco'] = $_POST['nome_banco'];
    $_SESSION['conta'] = $_POST['conta_banco'];
    $_SESSION['valor'] = $_POST['valor_banco'];

    // Exibe link para a página 03;

    echo "<a href='session_pedido.php'>Enviar dados!</a>";
}
else 
{
    // Se o usuário ainda não clicou no botão de enviar, mostra o formulário na página:

    ?>

    <form name="form1" action="session_banco.php?valor=enviado" method="POST">
        <div>
            <label for="ibanco">Digite seu Banco:</label>
            <input type="text" name="nome_banco" id="ibanco">
        </div>
        <br>
        <div>
            <label for="iconta">Digite sua Conta:</label>
            <input type="text" name="conta_banco" id="iconta">
        </div>
        <br>
        <div>
            <label for="ivalor">Digite o Valor:</label>
            <input type="text" name="valor_banco" id="ivalor">
        </div>
        <br>
        <div>
            <input type="submit">
        </div>
    </form>
<?php
}
?>