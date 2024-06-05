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
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
	<link rel="stylesheet" href="./style.css">
</head>

<nav class="nav">
<ul>
<li><a href="menu.php">||Menu||</a></li>
<li><a href="listar_senhas.php">Home</a></li>
<li><a href="init.php">Cadastro</a></li>
<li><a href="logout.php">Sair</a>
</li>
</ul>
</nav>
<body>
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script><script  src="script.js"></script>



    <section class="hero is-success is-fullheight">
	
        
            <div class="container has-text-centered">			
                
                    <h1 class="title has-text-grey">MENU DE ACESSO</h1>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2>                   
                    <div class="box">
					<p align=left>					
				   <img src=css/logo.png><br></p>					
                    
					<?php 
   include "sql.php";//conexão com o banco de dados
   
   @mysql_select_db($db);//selecione o banco de dados
   
	
           $sqltudo = mysql_query("SELECT * FROM control_passwords where D_E_L_E_T_E is NULL ORDER BY endereco_ip")  or die(mysql_error());
           $colunas = mysql_num_rows($sqltudo);


	   

       print '<font size=1>';  
	   print'<br>';		
	   print'<br>';		   	
       print'<table border="1"   bordercolor="#00BFFF">';
	   print'<tr>';
	   print'<td><b>ID</td>';
	   print'<td><b>UP</td>';
	   print'<td><b>HISTORICO</td>';
	   print'<td><b>LOGIN</td>';	      	   
	   print'<td><b>ACESSO</td>';
	   print'<td><b>URL</td>';	
	   	   print'<td><b>DESCRICAO</td>';
	   print'<td><b>SENHA</td>';
	   
	   
	   

           
	   print'</tr></b>';

           for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */
           $id = @mysql_result($sqltudo, $j, "id");
		   $login = @mysql_result($sqltudo, $j, "login");
           $endereco_ip = @mysql_result($sqltudo, $j, "endereco_ip");
           $descricao = @mysql_result($sqltudo, $j, "descricao");		   
		   $senha = @mysql_result($sqltudo, $j, "senha");           
           $forma_acesso = @mysql_result($sqltudo, $j, "forma_acesso");           
           $usu_criacao = @mysql_result($sqltudo, $j, "usu_criacao");
           $data_criacao = @mysql_result($sqltudo, $j, "data_criacao");
		   $ip_criacao = @mysql_result($sqltudo, $j, "ip_criacao");
		   $usu_solicitacao = @mysql_result($sqltudo, $j, "usu_solicitacao");
		   $data_ultima_solicitacao = @mysql_result($sqltudo, $j, "data_ultima_solicitacao");
		   $ip_solicitacao = @mysql_result($sqltudo, $j, "ip_solicitacao");       	       
       	 

	   print'<tr>';
	   print '<td>'.$id.'<a href="delete.php?id='.$id.'"><img src=img/bolinha_vermelha.png width=10 height=10"></a>';	   	   
	   print '</td>';	       
	   print '<td>'.$id.'<a href="listar_pesquisa_update.php?id='.$id.'"><img src=img/relogio.jpg width=20 height=20"></a>';	   
	   print '<td><a href="historico.php?id='.$id.'"><img src=img/historico.jpg></a>';	   	   
   // INCLUI O NUMERO DE HISTORICOS AO LADO DO ICONE DE HISTORICO
	   include "sql_t.i.php";//conexão com o banco de dados   
	   @mysql_select_db($db);//selecione o banco de dados
	   $sqltudo2 = mysql_query("SELECT count(*)id_historico FROM control_passwords_historico where id_historico = $id ")  or die(mysql_error());
	   $colunas2 = mysql_num_rows($sqltudo2);		  	   
	   for($x = 0; $x < $colunas2; $x++){/*caso no mesmo dia tenha mais eventos continua imprimindo */           
	   $id_historico = @mysql_result($sqltudo2, $x, "id_historico"); 
	   
	   print $id_historico;	   	   		   		   
	   print'</td>';	   
	   }	   
	   //FIM DA INCLUSAO 
	   print '<td>'.$login.'</td>';	   
	   print '<td>'.$forma_acesso.'</td>';	   
	   print '<td>'.$endereco_ip.'</td>';
	   print '<td>'.$descricao.'</td>';	   
	   	   print '<td align="center"><a href=sendmail.php?id='.$id.'><b><font color=red>Solicitar</b></a></td>';	   
	   	
	   print '</tr>';	
           }
	   print'</table>';

?>

						
                    </div>
                </div>
            </div>
        </div>
    </section>
	


</body>

</html>