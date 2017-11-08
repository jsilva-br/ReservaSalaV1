<html>
<body>
	<form id="form1" name="form1" method="post" action="">
	<p>
		<center>
		
		<table border=1>
		<tr><td colspan=3 align=center>Consulta de Salas Cadastradas </td></tr>
		<tr><td>ID Sala</td><td>Número da Sala</td><td>Nome da Sala</td></tr>
		<?php
			session_start();
			echo "<center>Você já esta logado como ".$_SESSION["nome"]."<br>";
			echo "<p><a href= 'painel.php'> HOME </a>";
		
			require_once "config.php";

			$sql = mysql_query("SELECT * FROM  salas") or die(mysql_error());
			$row = mysql_num_rows($sql);
			//echo "<br>".$row;
			
			while($l = mysql_fetch_array($sql)) {
					$id_sala   = $l["id_sala"];
					$sala      =$l["sala"];
					$nome_sala =$l["nome_sala"];	
			
					echo "<br><tr><td>".$id_sala."</td><td>".$sala."</td><td>".$nome_sala."</td></tr>";
					}	 


			@mysql_close();

		?>

	</form>

</body>
</html>