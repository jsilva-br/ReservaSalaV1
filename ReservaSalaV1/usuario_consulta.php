<html>
<body>
	<form id="form1" name="form1" method="post" action="">
	<p>
		<center>
		
		<table border=1>
		<tr><td colspan=3 align=center>Consulta de Usuários Cadastrados </td></tr>
		<tr><td>ID Usuário</td><td>Usuário</td><td>Nome do Usuário</td></tr>
		<?php
		session_start();
		echo "<center>Você já esta logado como ".$_SESSION["nome"]."<br>";
		echo "<p><a href= 'painel.php'> HOME </a>";
			require_once "config.php";

			$sql = mysql_query("SELECT * FROM  usuarios") or die(mysql_error());
			$row = mysql_num_rows($sql);
			//echo "<br>".$row;
			
			while($l = mysql_fetch_array($sql)) {
					$id_usuario   = $l["id_usuario"];
					$usuario      =$l["usuario"];
					$nome_usuario =$l["nome"];	
			
					echo "<br><tr><td>".$id_usuario."</td><td>".$usuario."</td><td>".$nome_usuario."</td></tr>";
					}	 


			@mysql_close();

		?>

	</form>

</body>
</html>