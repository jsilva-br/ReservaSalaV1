<?php
require_once "config.php";
?>

<html>
	<head>
		<title>Autenticando Usuários </title>
		<script type="text/javascript">
			function loginsucessfully(){
				setTimeout("window.location='painel.php'",2000);
			}
			
			function loginfailed(){
				setTimeout("window.location='index.php'",2000);
			}
		</script>
	</head>
</html>


<?php
$nome= $_POST["login"];
$senha = $_POST["senha"];

//echo "Nome: ".$nome."<br>Senha: ".$senha."<br>";


$sql = mysql_query("SELECT * FROM  usuarios WHERE usuario = '".$nome."' AND senha = '".$senha."'") or die(mysql_error());
$row = mysql_num_rows($sql);
//echo $row;

if ($row >0) {
	session_start();
	//$_SESSION['nome']= $_POST['login'];
	//$_SESSION['senha']= $_POST['senha'];
	$_SESSION['nome']= $nome;
	$_SESSION['senha']= $senha;
	echo "Você foi autenticado com sucesso";
	echo "<script>loginsucessfully()</script>";	
}else{
	echo "Nome de usuário e senha inválidos";
	echo "<script> loginfailed()</script>";
}
?>