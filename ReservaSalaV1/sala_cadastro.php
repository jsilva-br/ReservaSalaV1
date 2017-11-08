<?php
session_start();
	echo "<center>Você já esta logado como ".$_SESSION["nome"]."<br>";
	echo "<p><a href= 'painel.php'> HOME </a>";
?>
<html>
<body>
	<form id="form1" name="form1" method="post" action="sala_gravar.php">
		<center>
		<table border=1>
			<tr><td colspan=2 align=center>CADASTRO DE SALAS</td></tr>
			<tr><td>Número da Sala..:</td><td><input  type="text" name="numsala" id="salanum" size= 10 ></td></tr>
			<tr><td>Nome da Sala....:</td><td><input  type="text" name="nomesala" id="salanome" size= 30></td></tr>
			
		</table><br>
		<table border=1>
			<tr><td><input type="submit" name="OK" id="button" value="Gravar"></td>
			<td><input type="reset" name="reset" id="button" value="Limpar"></td></tr>

			
<table border=1>
		<tr><td colspan=2 align=center>SALAS JÁ CADASTRADAS</td></tr>
			<tr><td>Número da Sala: </td><td>Descrição da Sala: </td></tr>
		</tr>
		<?php
			require_once "config.php";

			$sql = mysql_query("SELECT * FROM  salas") or die(mysql_error());
			$row = mysql_num_rows($sql);
			//echo "<br>".$row;
			$num=0;
			while($l = mysql_fetch_array($sql)) {
					$sala      =$l["sala"];
					$nome_sala         =$l["nome_sala"];	
					
					$num=$num + 1; 
					echo "<br><tr><td>".$sala."</td><td>".$nome_sala."</td></tr>";
					}	 


			@mysql_close();

		?>

	</form>

</body>
</html>