
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>

<?php
// Contato com banco
if(isset($_REQUEST['valor']) and ($_REQUEST['valor'] == 'enviado')) 
{ 
// cria sessão se usuário tiver clicado no botão enviar do formulário
 
 $Nome = $_POST ["Nome"]; 
 $Email = $_POST ["Email"];
 $Fone = $_POST ["Fone"];
 $Msg = $_POST ["Mensagem"];
 $Assunto = $_POST ["Assunto"];
 $Resposta = null;

 echo ("Nome: ".$Nome.'<BR>'); 
 echo ("Email: ".$Email.'<BR>');
 echo ("Assunto: ".$Assunto.'<BR>');
 echo ("Fone: ".$Fone.'<BR>');
 echo ("Mensagem: ".$Msg.'<BR>');

 $Resposta = null;
 include "conexao.php";
 try
 {
    $Comando=$conexao->prepare("INSERT INTO TB_FALECONOSCO (NOME_CONTATO, FONE_CONTATO, EMAIL_CONTATO, ASSUNTO_CONTATO, MSG_CONTATO, RESP_CONTATO) VALUES ( ?, ?, ?, ?, ?, ?)");
            
            $Comando->bindParam(1, $Nome);
            $Comando->bindParam(2, $Fone);
  	    	$Comando->bindParam(3, $Email);
  	    	$Comando->bindParam(4, $Assunto);
            $Comando->bindParam(5, $Msg);
  	    	$Comando->bindParam(6, $Resposta);
                        
    if ($Comando->execute())
    {
        if ($Comando->rowCount () >0) 
        {
            echo "<script> alert('Contato resgistrado com sucesso!')</script>";
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
           
           throw new PDOException("Erro: Não foi possivel executar a declaração sql.");
            
        }      
    }   
    catch (PDOException $erro)
    {
        echo"Erro" . $erro->getMessage();
    }
} 

else { 
// Se usuário ainda não clicou no botão de enviar, mostra o formulário na página:
?>
 <form name="form1" action="contato.php?valor=enviado" method="POST">
 
 <label for="Nome">Nome:</label>
 <input type="text" name="Nome" size="35"><BR><p>

 <label for="Email">E-mail:</label>
 <input type="text" name="Email" placeholder="email@servidor.com" size="35"><BR><p>

 <label for="Fone">Telefone:</label>
 <input type="text" name="Fone" placeholder="(00) 0-0000-0000" size="35"><BR><p>
 <label for="Assunto">Assunto:</label>
	<select name="Assunto" id="Assunto">
			<option default value="Selecione">Selecione o assunto!</option>
            <option value="Duvidas">Duvidas</option>
            <option value="Elogios">Elogios</option>
            <option value="Reclamações">Reclamações</option>
            <option value="Sugestões">Sugestões</option>
    </select> <br><p>
    <label for="Mensagem">Mensagem:</label><BR><p>
	<textarea name="Mensagem" rows="8" cols="40"></textarea><br><p>
	
	<input type="submit" name="Enviar" value="Enviar">
	
	<input type="reset" name="Limpar" value="Redefinir"><br><p>
	</p>
	
	<label id="aviso">Preenchar os campos, para enviar!<br>	
 
 
 </p>
</form>
<?php
 }
?>
</body>
</html>
