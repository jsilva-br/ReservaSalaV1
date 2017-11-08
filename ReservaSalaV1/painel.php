<?php
require_once "config.php";
?>

<?php
	session_start();
	if (!isset($_SESSION["nome"]) || !isset($_SESSION["senha"])){
		header("Location: index.php");
		exit;
	}else{
		echo "<center>Você já esta logado como ".$_SESSION["nome"]."<br>";
		echo "<br>.....::::: Painel de Usuário :::::.....<br><p>";
		echo '<a href="usuario_cadastro.php"> Cadastro de Usuário </a> <br>';
		echo '<a href="usuario_consulta.php"> Consulta de Usuário </a> <br>';
		echo '<a href="usuario_atualiza.php"> Atualizar de Usuário </a> <br>';
		echo '<a href="usuario_excluir.php"> Excluir de Usuário </a> <br>';
		
		echo "<br>.....::::: Painel de Salas :::::.....<br><p>";
		echo '<a href="sala_cadastro.php"> Cadastro de Sala </a><br> ';
		echo '<a href="sala_consulta.php"> Consulta de Sala </a> <br>';
		echo '<a href="sala_seleciona.php"> Atualizar de Sala </a> <br>';
		echo '<a href="sala_excluir.php"> Excluir de Sala </a> <br>';
		
		echo "<br>.....::::: Painel de Reservas :::::.....<br><p>";
		echo '<a href="reserva_sala.php"> Reserva de Sala </a> <br>';
		echo '<a href="reserva_consulta.php"> Consultar Reservas de Sala </a> <br>';
		echo '<a href="reserva_cancelar.php"> Cancelar Reservas de Sala </a> <br>';
		
		echo "<br>.....::::: Painel Para TESTE :::::.....<br><p>";
		echo '<a href="teste.php"> TESTE  </a> <br>';
		
	}
?>

<html>
	<head>
		<title>Painel</title>
		
	</head>
	
<body>
<p>
<a href= "logout.php"> SAIR </a>
</body>
</html>