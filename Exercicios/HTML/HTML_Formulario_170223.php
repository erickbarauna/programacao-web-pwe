<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="div">
            <h1>Formulário Cleitin</h1>
            <form action="HTML_Formulario_170223.php?valor=enviar" method="post">
                <p class="negrito">Digite o seu nome: </p>
                <input type="text" name="nome" width="30" maxlength="30">
                <br>
                <p class="negrito">Digite sua idade:</p>
                <input type="number" name="idade" min="12" max="99">
                <br>
                <p class="negrito">Selecione o estado civil: </p>
                <input type="radio" name="civil" value="Casado"> Casado
                <input type="radio" name="civil" value="Solteiro"> Solteiro
                <p class="negrito">Marque as linguagens que você conhece: </p>
                <input type="checkbox" name="linguagem1" value="Csharp"> C#
                <input type="checkbox" name="linguagem2" value="Java Script"> Java Script
                <input type="checkbox" name="linguagem3" value="Java"> Java
                <input type="checkbox" name="linguagem4" value="PHP"> PHP
            
                <p class="negrito">Marque seu nível de conhecimento em TI: </p>
                <select name="nivel" id="Nivel">
                    <option default value="Selecione">Selecione seu nível!</option>
                    <option value="Básico">Básico</option>
                    <option value="Intermediario">Intermediario</option>
                    <option value="Avançado">Avançado</option>
                </select>
                <br>
                <p class="negrito">Data de Nascimento: </p>
                <input type="date" name="dtaNascimento">
                <br>
                <p class="negrito">E-mail: </p>
                <input type="email" name="email">
                <br>
                <p class="negrito">Telefone: </p>
                <input type="tel" name="fone" pattern="[0 9]{2}[0 9]{4} 4}--[0 9]{4}" placeholder="(00)0000-0000" required>
                <br>
                <br>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>

    <?php
    if (isset($_REQUEST['nome']) and ($_REQUEST['valor'] == 'enviar')){
        if (isset ($_POST ["nome"]))
        {
            $Nome = $_POST["nome"];
            echo ('<div class="resposta">' .'Nome: ' .$Nome. '<BR>' .'</div>');

            $Idade = $_POST["idade"];
            echo ('<div  class="resposta">' .'Idade: ' .$Idade. '<BR>'  .'</div>');

            $EstadoCivil = $_POST["civil"];
            echo ('<div  class="resposta">' .'Estado Civil: ' .$EstadoCivil. '<BR>'  .'</div>');

            if (isset ($_POST ["linguagem1"]))
            {
                $Linguagens = $_POST["linguagem1"];
                echo ('<div  class="resposta">' .'Linguagens: ' .$Linguagens. '<BR>'  .'</div>');
            }

            if (isset ($_POST ["linguagem2"]))
            {
                $Linguagens = $_POST["linguagem2"];
                echo ('<div  class="resposta">' .'Linguagens: ' .$Linguagens. '<BR>'  .'</div>');
            }

            if (isset ($_POST ["linguagem3"]))
            {
                $Linguagens = $_POST["linguagem3"];
                echo ('<div  class="resposta">' .'Linguagens: ' .$Linguagens. '<BR>'  .'</div>');
            }

            if (isset ($_POST ["linguagem4"]))
            {
                $Linguagens = $_POST["linguagem4"];
                echo ('<div  class="resposta">' .'Linguagens: ' .$Linguagens. '<BR>'  .'</div>');
            }

            $Nivel = $_POST["nivel"];
            echo ('<div  class="resposta">' .'Seu nível: ' .$Nivel .'<BR>'  .'</div>');

            
            $NiveNascimento = $_POST["dtaNascimento"];
            echo ('<div  class="resposta">' .'Data de Nascimento: ' .$NiveNascimento .'<BR>'  .'</div>');

            
            $Email = $_POST["email"];
            echo ('<div  class="resposta">' .'E-mail: ' .$Email .'<BR>'  .'</div>');

            
            $Fone = $_POST["fone"];
            echo ('<div  class="resposta">' .'Telefone: ' .$Fone .'<BR>'  .'</div>');
        }
    }
    ?>
</body>
</html>