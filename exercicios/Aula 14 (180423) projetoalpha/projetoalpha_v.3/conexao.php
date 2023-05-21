<?php 
    // Define as informações de conexão com o banco de dados
    $Bco = 'dblojamaior';
    $User = 'root';
    $Senha = '';

    // Tenta estabelecer a conexão com o banco de dados
    try
    {
        // Cria uma nova instância da classe PDO, passando como parâmetros as strings de conexão
        $conexao = new PDO("mysql:host=localhost; dbname=$Bco", "$User", "$Senha");

        // Permitir que a classe PDO lance exceções em caso de erros de conexão
        $conexao -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Define o conjunto de caracteres a ser utilizado na conexão
        $conexao -> exec("set names utf8");
    }
    // Exibe uma mensagem de erro contendo a descrição do erro capturado
    catch (PDOException $erro)
    {
        echo "Erro na conexão" . $erro -> getMessage();
    }
?>