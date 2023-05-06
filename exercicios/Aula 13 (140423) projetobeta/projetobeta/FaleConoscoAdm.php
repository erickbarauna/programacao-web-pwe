<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fale Conosco</title>
</head>
<body>
    <?php
        session_start();

        include "conexao.php";

        if ($_SESSION['controleResp'] == 'localizado')
        {
            echo "Dados do Contato:<br><br>";
            echo "Nome:<br> " . $_SESSION['nomeContato'] . '<br>' . '<br>';
            echo "Fone:<br> " . $_SESSION['foneContato'] . '<br>' . '<br>';
            echo "Email:<br> " . $_SESSION['emailContato'] . '<br>' . '<br>';
            echo "Assunto:<br> " . $_SESSION['assuntoContato'] . '<br>' . '<br>';
            echo "Mensagem:<br> " . $_SESSION['msgContato'] . '<br>' . '<br>';
            echo "Resposta:<br> " . $_SESSION['respContato'] . '<br>' . '<br>';
            echo "Cadastro localizado com sucesso:" . '<br>' . '<br>';
        }
        else if ($_SESSION['controleResp'] == 'respondido')
        {
            echo "Resposta gravada com sucesso: <br><br>";
        }
        else if ($_SESSION['controleResp'] == 'enviado')
        {
            echo "Resposta eniada com sucesso: <br><br>";
        }

        // Carrega a tabela
        $Matriz = $conexao -> prepare("SELECT * FROM TB_FALECONOSCO");

        echo "Contatos realizados no site: <br><br>";
        $Matriz -> execute();

        echo "<table border=1>";
        echo "<tr>";
        echo "<td>Id Contato</td>";
        echo "<td>Nome do Contato</td>";
        echo "<td>Fone do Contato</td>";
        echo "<td>Email do Contato</td>";
        echo "<td>Assunto do Contato</td>";
        echo "<td>Mensagem do Contato</td>";
        echo "<td>Resposta do Contato</td>";
        echo "</tr>";

        while ($linha = $Matriz -> fetch(PDO::FETCH_OBJ))
        {
            $idContato = $linha -> ID_CONTATO;
            $nomeContato = $linha -> NOME_CONTATO;
            $foneContato = $linha -> FONE_CONTATO;
            $emailContato = $linha -> EMAIL_CONTATO;
            $assuntoContato = $linha -> ASSUNTO_CONTATO;
            $msgContato = $linha -> MSG_CONTATO;
            $respContato = $linha -> RESP_CONTATO;

            echo "<tr>";
            echo "<td>" . $idContato . "</td>";
            echo "<td>" . $nomeContato . "</td>";
            echo "<td>" . $foneContato . "</td>";
            echo "<td>" . $emailContato . "</td>";
            echo "<td>" . $assuntoContato . "</td>";
            echo "<td>" . $msgContato . "</td>";
            echo "<td>" . $respContato . "</td>";
            echo "</tr>";
        }

        echo "</table>";

        if (isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado'))
        {
            if ($_POST['id_contato'] != "") $_SESSION['IdContato'] = $_POST['id_contato'];
            if ($_POST['resp_contato'] != "") $_SESSION['respContato'] = $_POST['resp_contato'];
            $Botao = $_POST["Botao"];

            if ($Botao == "Alterar")
            {
                include "AlterarContato.php";
            }
            
            if ($Botao == "Enviar")
            {
                include "ResponderContato.php";
            }

            if ($Botao == "Localizar")
            {
                include "LocalizarContato.php";
            }
        }
        else
        {
            ?>
            <form action="FaleConoscoAdm.php?valor=enviado" method="POST" name="form1">
                Id:
                <br>
                <input type="text" id="Codigo" class="input" placeholder="Preencher Id" name="id_contato">
                <input type="submit" value="Localizar">
                <br>
                <p>
                    Mensagem de Resposta: <br>
                    <textarea name="resp_contato" placeholder="Preencher a Resposta" cols="40" rows="8"></textarea>
                    <br>
                <p>

                <input type="submit" name="Botao" value="Alterar">
                <input type="submit" name="Botao" value="Enviar"><br><p>
                <p>
            </form>
        <?php
        }
        ?>
</body>
</html>