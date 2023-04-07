<?php
// Retornando a sessão criada:

session_start();

// Ecoando os dados gravados na sessão:

echo "Os dados recebidos foram:<br><br>";
echo "Nome: " .$_SESSION['nome'] ."<br>";
echo "CPF: " .$_SESSION['cpf'] ."<br>";
echo "Banco: " .$_SESSION['banco'] ."<br>";
echo "Conta: " .$_SESSION['conta'] ."<br>";
echo "Valor: " .$_SESSION['valor'];
?>