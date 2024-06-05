<?php
session_start();
include('verifica_login.php');
?>

<?php
$usuario_cadastro = $_SESSION['usuario'];
print '<p>';
print 'Olá: ';
print $usuario_cadastro;
print '<p>';
print 'Seja Bem Vindo(a).';
print '<br>';
?> 
<!DOCTYPE html>
<html>

 <?php

include "sql.php";
       
if(isset($_POST['done'])){   

    $login = $_POST['login'];
	$descricao = $_POST['descricao'];
	$senha = $_POST['senha'];
    $forma_acesso = $_POST['forma_acesso'];
    $endereco_ip = $_POST['endereco_ip'];	
    // AUDITORIA 
    $ip_criacao = $_SERVER['REMOTE_ADDR'];
    $usuario = $_SESSION['usuario'];	
	// ENVIO DE EMAIL COM BIBLIOTECA PHPMAILER	
	require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'ti@lotisa.com.br';
    $mail->Password = '!@#vndrl1979!@#';
    $mail->Port = 587;
    $mail->setFrom('ti@lotisa.com.br', 'Gestor de Senhas');
    $mail->addAddress('ti@lotisa.com.br');
    //$mail->SMTPDebug = 3;
    //$mail->Debugoutput = 'html';
    //$mail->setLanguage('pt');
    $mail->isHTML(true);
    $mail->Subject = "*** NOTIFICACAO DE CADASTRO DE SENHAS ***";
    $mail->Body    = $usuario.", cadastrou uma senha para: ".$descricao.", no controle senhas caso deseje verificar verifique no sistema de controle de senhas";
    $mail->AltBody = "CORPO DO EMAIL2";


   if(!$mail->send()) {
       echo 'Não foi possível enviar a mensagem.<br>';
       echo 'Erro: ' . $mail->ErrorInfo;
   } else {
    echo "Seu email foi enviado com sucesso!"; 
   }

    if(empty($descricao) || empty($senha) || empty($endereco_ip)){

        $erro = "Atenção, você deve preencher todos os campos";

    }else{        

       $sql = mysql_query("INSERT INTO `control_passwords`(`login`,`descricao`, `senha`, `endereco_ip`, `forma_acesso`, `usu_criacao`,`ip_criacao`,`data_criacao`) VALUES ('$login','$descricao','$senha','$endereco_ip','$forma_acesso','$usuario','$ip_criacao',now())") or die(mysql_error());
       

            if($sql){

                $erro2 = "Dados cadastrados com sucesso!";

              } else{

                  $erro = "Não foi possivel cadastrar os dados";

              }

    }

}

?>    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" href="./style.css">
</head>

<script language="javascript" type="text/javascript">
function validar() {
var senha = form1.senha.value;
var rep_senha = form1.rep_senha.value;

if (senha != rep_senha) {
alert('Senhas diferentes');
form1.senha.focus();
return false;
}
}

function maiuscula(z){
        v = z.value.toUpperCase();
        z.value = v;
    }
	

	
</script>


<nav class="nav">
<ul>
<li><a href="menu.php">||Menu||</a></li>
<li><a href="listar_senhas.php">Home</a></li>
<li><a href="init.php">Cadastro</a></li>
<li><a href="logout.php">Sair</a>
</li>
</ul>
</nav>
<!-- partial -->
<body>
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script><script  src="script.js"></script>
<body>

    <section class="hero is-success is-fullheight">
	
        
            <div class="container has-text-centered">			
                <div class="column is-4 is-offset-4">
                    <h1 class="title has-text-grey">GESTOR DE SENHAS</h1>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2>                   
                    <div class="box">
                        <form name="form1" action="init.php" method="POST">
						<?php
if(isset($erro)){
    print '<div style="width:80%; background:red; color:Black; padding: 5px 0px 5px 0px; text-align:center; margin: 0 auto;">'.$erro.'</div>';
}
if(isset($erro2)){
    print '<div style="width:80%; background:green; color:Black; padding: 5px 0px 5px 0px; text-align:center; margin: 0 auto;">'.$erro2.'</div>';
}
?>	
                            <div class="field">
                                <div class="control">
									<input name="login" class="input is-large" placeholder="login" autofocus="" >                                    
									<input name="senha" type="password"  class="input is-large" placeholder="senha" autofocus="">
									<input type="password" name="rep_senha" id="rep_senha" class="input is-large" placeholder="rep_senha" autofocus="">
									<input name="endereco_ip"  class="input is-large" placeholder="Url de Acesso" autofocus="">
									<input name="descricao" class="input is-large" placeholder="descricao" autofocus="" onkeyup="maiuscula(this)">									
									<select name="forma_acesso" class="input is-large" placeholder="forma_acesso" autofocus="" >
									<option>SELECIONE</option>
									<option>WTS</option>
									<option>SSH</option>
									<option>WEB</option>									
									<option>OUTROS</option>
									</select>
                                </div>
                            </div>
                            
                            <button type="submit" onclick="return validar()" class="button is-block is-link is-large is-fullwidth">CADASTRAR</button><input type="hidden" name="done"  value="" />
                        </form>
						
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	

<br>
<a href="menu.php">Voltar</a>
</body>

</html>
