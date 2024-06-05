<?php
session_start();
include('verifica_login.php');
?>
<script language="javascript" type="text/javascript">

function maiuscula(z){
        v = z.value.toUpperCase();
        z.value = v;
    }	
</script>

<?php
$usuario_cadastro = $_SESSION['usuario'];
print '<p>';
print 'Olá: ';
print $usuario_cadastro;
print '<p>';
print 'Seja Bem Vindo(a).';
print '<br>';
?> 
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
<script language="javascript" type="text/javascript">

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
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script><script  src="./script.js"></script>
<br>
<body> 
	


			<div class="column is-4 is-offset-4">
                    <h1 class="title has-text-grey">ATUALIZAÇÃO DE DADOS</h1><center>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2> </center><br>
					
					<?php

//criar a conexÃ£o com o banco

include "sql_t.i.php";
$ip_cadastro = $_SERVER['REMOTE_ADDR'];



if(isset($_POST['done'])){   


    //INICIO DE UPDATE DOS CAMPOS
    $descricao = $_POST['descricao'];
	$senha = $_POST['senha'];	
    $endereco_ip = $_POST['endereco_ip'];
    $forma_acesso = $_POST['forma_acesso'];
	$login = $_POST['login'];	
	$id_retorno = $_POST['id_retorno'];
       if ($senha ==''){
	   $sqltudo = mysql_query("update control_passwords  set  descricao='$descricao',endereco_ip='$endereco_ip',forma_acesso='$forma_acesso',login='$login' where id='$id_retorno'")  or die(mysql_error());
       }else{
        $sqltudo = mysql_query("update control_passwords  set  descricao='$descricao',senha='$senha',endereco_ip='$endereco_ip',forma_acesso='$forma_acesso',login='$login' where id='$id_retorno'")  or die(mysql_error());
        $controle = 1;
       }
       if ($controle ==1){
       $sqltudo2 = mysql_query("INSERT INTO `control_passwords_historico`(`data_criacao`,`usuario`,`ip_cadastro`,`observacoes`,`id_historico` ) VALUES (now(),'$usuario_cadastro','$ip_cadastro', 'Atualizacao de dados pelo sistema inclusive senha update','$id_retorno')") or die(mysql_error());
       }else{
        $sqltudo2 = mysql_query("INSERT INTO `control_passwords_historico`(`data_criacao`,`usuario`,`ip_cadastro`,`observacoes`,`id_historico` ) VALUES (now(),'$usuario_cadastro','$ip_cadastro', 'Atualizacao de dados pelo sistema','$id_retorno')") or die(mysql_error());
       }
            if($sqltudo){
				print '<center>';
				print '<font size=4 color=green>';
                print  "Dados cadastrados com sucesso!";
                print '<meta http-equiv="refresh" content="3;url=listar_senhas.php">';
				print '</font>';

              } else{
				print '<font size=4 color=red>';
                  print "Não foi possivel cadastrar os dados";
				  print '</font>';
				  print '</center>';

              }

    }

    

?>
					

                    <div class="box">


<font size=1>  
  <form name="form1" action="listar_pesquisa_update.php" method="POST">


<p align=left>
				   <img src=css/logo.png><br></p>

					
				<?php 
   include "sql_t.i.php";//conexão com o banco de dados   
   @mysql_select_db($db);//selecione o banco de dados
	$id_retorno = $_GET['id'];
	$sqltudo = mysql_query("select  * FROM control_passwords  where id =('$id_retorno')  order by id ")  or die(mysql_error());           
    $colunas = mysql_num_rows($sqltudo);	   
	         
	   print'</tr></b>';
           for($j = 0; $j < $colunas; $j++){/*caso no mesmo dia tenha mais eventos continua imprimindo */
            $id = @mysql_result($sqltudo, $j, "id");
            $login = @mysql_result($sqltudo, $j, "login");
            $endereco_ip = @mysql_result($sqltudo, $j, "endereco_ip");
            $descricao = @mysql_result($sqltudo, $j, "descricao");		               
            $forma_acesso = @mysql_result($sqltudo, $j, "forma_acesso");           
            $usu_criacao = @mysql_result($sqltudo, $j, "usu_criacao");
            $data_criacao = @mysql_result($sqltudo, $j, "data_criacao");
            $ip_criacao = @mysql_result($sqltudo, $j, "ip_criacao");
            $usu_solicitacao = @mysql_result($sqltudo, $j, "usu_solicitacao");
            $data_ultima_solicitacao = @mysql_result($sqltudo, $j, "data_ultima_solicitacao");
            $ip_solicitacao = @mysql_result($sqltudo, $j, "ip_solicitacao");   

           }
   
	   print'</table>';

?>

<form name="form2" action="atualiza.php" method="POST">

  <div class="field">
                                <div class="control">                                    									
									
                                <input type="text" placeholder="LOGIN" name="login" value="<?php echo $login; ?>"class="input is-large" />									
                                <input type="text" placeholder="SENHA" name="senha" value=""class="input is-large" />									
                                <input type="text" placeholder="FORMA ACESSO" name="forma_acesso" value="<?php echo $forma_acesso; ?>"class="input is-large" onkeyup="maiuscula(this)"/>									
                                <input type="text" placeholder="ENDERECO IP" name="endereco_ip" value="<?php echo $endereco_ip; ?>"class="input is-large" onkeyup="maiuscula(this)"/>									
                                <input type="text" placeholder="DESCRICAO" name="descricao"  value="<?php echo $descricao; ?>" class="input is-large" onkeyup="maiuscula(this)"/>									
									<td><input type="hidden" enable="false" name="id_retorno" value="<?php echo $id_retorno; ?>" size=6/></td></tr>
	
                                </div>
                            </div>
                            
                            <button type="submit" onclick="" class="button is-block is-link is-large is-fullwidth">ATUALIZAR</button><input type="hidden" name="done"  value="" />
                        </form>

						
						

						
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>