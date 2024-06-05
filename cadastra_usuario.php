<?php
session_start();
include('verifica_login.php');
?>
<html>
<?php

//criar a conexÃ£o com o banco

include "sql.php";


if(isset($_POST['done'])){   

    
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    

    if(empty($usuario)|| empty($senha)){

        $erro = "Atenção, você deve preencher todos os campos";

    }else{        

       $sql = mysql_query("INSERT INTO `usuarios_control_pass`(`usuario`, `senha`) VALUES ('$usuario', md5('$senha'))") or die(mysql_error());

            if($sql){

                $erro = "Dados cadastrados com sucesso!";

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

<nav class="nav">
<ul>
<li><a href="menu.php">||Menu||</a></li>
<li><a href="logout.php">Sair</a>
</li>
</ul>
</nav>
<!-- partial -->
<body>
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script><script  src="script.js"></script>

<script>
alert('Essa tela serve para cadastrar um usuario para acesso ao sistema, comumente somente pessoas do T.I')
</script>





<body>

    <section class="hero is-success is-fullheight">
	
        
            <div class="container has-text-centered">			
                <div class="column is-4 is-offset-4">
                    <h1 class="title has-text-grey">MENU DE ACESSO</h1>
					<h2 class="title has-text-grey"><font size=4>[Tecnologia da Informação]</font></h2>                   
                    <div class="box">
                    <form name="form1" action="cadastra_usuario.php" method="POST">
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
                                    <input name="usuario" class="input is-large" placeholder="usuario" autofocus="" >
									<input name="senha" type="password"  class="input is-large" placeholder="senha" autofocus="">
									
									
                                </div>
                            </div>
                            
                            <button type="submit"  class="button is-block is-link is-large is-fullwidth">CADASTRAR</button><input type="hidden" name="done"  value="" />
                        </form>    
						
                    </div>
                </div>
            </div>
        </div>
    </section>
	<a href="menu.php">Voltar</a>

</body>

</html>