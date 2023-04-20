<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <h1>Tela Cadastro</h1>
    </header>
    <section>
        <form action="cadastro.php?valor=enviado" method="POST">
            <div>
                <label for="inome">Nome</label>
                <input type="text" name="Nome" id="inome" required>
            </div>
            <div>
                <label for="iendereco">Endereço</label>
                <input type="text" name="Endereco" id="iendereco" required>
            </div>
            <div>
                <label for="ivalor">Valor</label>
                <input type="text" name="Valor" id="ivalor" required>
            </div>
            <div>
                <input type="submit" value="Confirmar">
            </div>
        </form>
    </section>
    
    <?php 
        if (isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado')) 
        {
            $semVirgula = str_replace(",", ".", $_POST['Valor']);

            if (is_numeric($semVirgula))
            {
                session_start();
                $_SESSION['nome_usuario'] = $_POST['Nome'];
                $_SESSION['endereco_usuario'] = $_POST['Endereco'];
                $_SESSION['valor_total'] = $semVirgula;

                header("Location: pagamento.php");
            }
            else 
            {
                echo "<script> alert('Digite um valor NUMÉRICO no campo: Valor')</script>";
            }
        }
    ?>
</body>
</html>