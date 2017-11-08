<?php
require_once "config.php";
?>


<?php
	$nome= $_POST["nome"];
	$login= $_POST["login"];
	$senha= $_POST["senha"];
	
	
	echo "<center>";
	//VERIFICA se o cadastro de usuario esta com todos os campos preenchidos
	if (($nome == '') || ($login == '') ||  ($senha == '')){
		echo "No cadastro de usuário não pode haver campos em branco, FAVOR verificar!  ";
		echo "AGUARDE REDIRECIONANDO PARA O PAINEL! ";
		echo "<script>setTimeout(window.location='painel.php',30000);</script>";
	}else{
		//Aqui ele verifica se o usuário já tem  login cadastrado
		//$sql = mysql_query("SELECT * FROM  usuarios WHERE usuario = '".$login."' AND nome = '".$nome."'") or die(mysql_error());
		$sql = mysql_query("SELECT * FROM  usuarios WHERE usuario = '".$login."'") or die(mysql_error());
				$row = mysql_num_rows($sql);
				//echo "<br>".$row;
		if ($row>0){
			echo "USUÁRIO JÁ CADASTRADO NO SISTEMA ";
			echo "AGUARDE REDIRECIONANDO PARA O PAINEL! ";
			echo "<script>setTimeout(window.location='painel.php',5000);</script>";
		}else{
			//Se estiver tudo certo, ele irá criar o usuário e salvar as informações
			echo "Usuário : ".$nome."<br>Login: ".$login."<br>Senha: ".$senha."<br> GRAVADO COM SUCESSO!";
			
			mysql_query("INSERT INTO usuarios (id_usuario, usuario, nome, senha)
					VALUES ('', '$login', '$nome', '$senha')") or die( mysql_error());
			//FINALIZA A CONEXÃO COM O MYSQL
			mysql_close($conecta);
			echo "AGUARDE REDIRECIONANDO PARA O PAINEL! ";
			echo "<script>setTimeout(window.location='painel.php',3000);</script>";
			
		}
	}
 
?>
<html>
<body>
<!--<a href= "painel.php"> HOME </a>-->
<body>
</html>