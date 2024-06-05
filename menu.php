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
	<link rel="stylesheet" href="./style.css">
</head>
<nav class="nav">
<ul>
<li class="drop"><a href="cadastra_usuario.php">||Usuarios||</a>
			<ul class="dropdown">		
				
			
			</ul>
			<li><a href="faturas.php">Faturas </a></li>			
			<li><a href="../controle_patrimonio/listar.php">Ativos</a></li>
			<li><a href="../controle_suprimentos/listar_suprimentos.php"> Toners</a></li>			
            <li><a href="../controle_acesso_portas/controle_acesso_portas_listar.php"> Crachas</a></li>			
			<li><a href="listar_senhas.php">Passwords</a></li>
            <li><a href="../banco_horas/new/init.php">B.H</a></li>
			
</li>
</ul>
</nav>
<!-- partial -->
<script src='jquery.min.js'></script><script  src="./script.js"></script>  
<body>
<?php
$usuario_cadastro = $_SESSION['usuario'];
print '<p>';
print 'Olá: ';
print $usuario_cadastro;
print '<p>';
print 'Seja Bem Vindo(a).';
print '<br>';
?>         
<p align=right>
</p>
<body>

    <section class="hero is-success is-fullheight">
	
        
            <div class="container has-text-centered">			
                <div class="column is-4 is-offset-4">
                   <a href=img/topologia.png> <img src=img/topologia.png width=800 hight=600></a>
						
                    </div>

										
                </div>
				<p align=center>

<img src=img/t320.jpg width=800 hight=600>
<img src=img/r540.jpg width=800 hight=600>

<a href=licencas/licencas.png><img src=licencas/licencas.png width=800 hight=600></a>
<img src=img/bkps.png width=800 hight=600>
<center>
<a href="img/drives.png"><img src=img/drives.png width=800 hight=600></a>
<font color=black>
<p>Custo de Impressões - [COPY LINE]</p>
<a href="img/custo_impressoes.png"><img src=img/custo_impressoes.png width=800 hight=600></a>
<CENTER>

<font color=Black>
    <ul>Documentos Auxiliares        
    <br>
<font color=blue>
<li><a href=licencas/licencas.xlsx>Lista de Licenças Engenharia - EXCEL</a><br></li>
<li><a href="termos/termo21092023.docx">Termos de Uso dos Equipamentos - Word.</a></li>
</ul>
</center>
</font>
            </div>

	