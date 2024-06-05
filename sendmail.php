<?php
session_start();
include('verifica_login.php');
?>
<!DOCTYPE html>
<html>



 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>



<img src=css/logo.png><br>
Hoje, 
<script Language="JavaScript">
<!--
mydate = new Date();
myday = mydate.getDay();
mymonth = mydate.getMonth();
myweekday= mydate.getDate();
weekday= myweekday; 
myear = mydate.getFullYear();

if(myday == 0)
day = " Domingo, " 

else if(myday == 1)
day = " Segunda - Feira, " 

else if(myday == 2)
day = " Terça - Feira, " 

else if(myday == 3)
day = " Quarta - Feira, " 

else if(myday == 4)
day = " Quinta - Feira, " 

else if(myday == 5)
day = " Sexta - Feira, " 

else if(myday == 6)
day = " Sábado, " 

if(mymonth == 0)
month = "Janeiro " 

else if(mymonth ==1)
month = "Fevereiro " 

else if(mymonth ==2)
month = "Março " 

else if(mymonth ==3)
month = "Abril " 

else if(mymonth ==4)
month = "Maio " 

else if(mymonth ==5)
month = "Junho " 

else if(mymonth ==6)
month = "Julho " 

else if(mymonth ==7)
month = "Agosto " 

else if(mymonth ==8)
month = "Setembro " 

else if(mymonth ==9)
month = "Outubro " 

else if(mymonth ==10)
month = "Novembro " 

else if(mymonth ==11)
month = "Dezembro " 

document.write("<font face=arial, size=2>"+ day);
document.write(myweekday+" de "+month+ "</font>");
document.write(myear);
// -->
</script>
<br>
<a href="listar_senhas.php">Voltar</a>
<body>

    <section class="hero is-success is-fullheight">
	
        
            <div class="container has-text-centered">			
                <div class="column is-4 is-offset-4">
                    <h1 class="title has-text-grey">MENU DE ACESSO</h1>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2>                   
                    <div class="box">
                    <?php 
   include "sql.php";//conexão com o banco de dados
   
    $id_fixo = $_GET['id'];
	$ip_solicitacao = $_SERVER['REMOTE_ADDR'];
    $usu_solicitacao = $_SESSION['usuario'];

   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM control_passwords WHERE id = '$id_fixo'")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);
           for($j = 0; $j < $colunas; $j++){
           $id = @mysql_result($sqltudo, $j, "id");
           $senha = @mysql_result($sqltudo, $j, "senha");
	   
           }
	   print'</table>';
	   
	   
       $sql = mysql_query("INSERT INTO `control_passwords_historico`(`observacoes`,`id_historico`,`usuario`,`ip_cadastro`,`data_criacao`) VALUES ('Registro de auditoria solicitacao da senha','$id','$usu_solicitacao','$ip_solicitacao',now())") or die(mysql_error());
	 
?>

<?php
$ip = $_SERVER['REMOTE_ADDR'];
print '<font color=red>';
print '<br>';
print'<b>Olá, <b>';

print '</font>';
print '<font color=white';
print'<b> Seu ip foi registrado para fins de auditoria e o administrador notificado!<b>';

?>
<img src=img/fundo_seguro.png>
<?php
//garantir que somente usuario especifico pode receber email
if ($usu_solicitacao = 'seuuserdocadastroaqui') {
	
	require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'email@provedor.com.br';
    $mail->Password = 'suasenhaqui';
    $mail->Port = 587;
    $mail->setFrom('email@provedor.com.br', 'Gestor de Senhas');
    $mail->addAddress('email@provedor.com.br');
    //$mail->SMTPDebug = 3;
    //$mail->Debugoutput = 'html';
    //$mail->setLanguage('pt');
    $mail->isHTML(true);
   $mail->Subject = "*** SOLICITACAO DE SENHAS ***";
   $mail->Body    = $ip.", Solicitou uma senha verifique o sistema de gestao de passwords para mais detalhes: ".$endereco_ip.", segue: ".$senha." ";
   $mail->AltBody = "CORPO DO EMAIL2";


   if(!$mail->send()) {
       echo 'Não foi possível enviar a mensagem.<br>';
       echo 'Erro: ' . $mail->ErrorInfo;
   } else {
    echo "Seu email foi enviado com sucesso!"; 
   }
}
	
?>  
						
                    </div>
                </div>
            </div>
        </div>
    </section>
	

</body>
</font>
<a href="listar_senhas.php">Voltar</a>
</html>