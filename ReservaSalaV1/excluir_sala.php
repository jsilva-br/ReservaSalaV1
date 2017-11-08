<html>
<body>
	<form id="form1" name="form1" method="post" action="">
	<center>
	<table border=1>
		<tr><td >EXCLUSÃO DE USUÁRIOS</td></tr>
		<?php
		session_start();
		echo "<center>Você está logado como ".$_SESSION["nome"]."<br>";
		?>
		<?php
			require_once "config.php";
			
			$login=$_SESSION["nome"];
			
			$sql = mysql_query("SELECT * FROM  usuarios WHERE usuario = '".$login."'") or die(mysql_error());
			$row = mysql_num_rows($sql);
			
			while($l = mysql_fetch_array($sql)) {
					$id_usuario   = $l["id_usuario"];
					//$usuario      =$l["usuario"];
					$nome =$l["nome"];	
					$senha =$l["senha"];
			}
		echo "<tr><td>Nome Completo.....:</td><td>".$nome."</td></tr><p>";
		echo "<tr><td>Usuário..:</td><td>".$login."</td></tr><p>";
		echo "<tr><td>Senha....:</td><td>".$senha."</td></tr><p>";
		
		
	
		
		?>
</table>
		<table border=1>
<tr><td><input type="submit" name="OK" id="button" value="EXCLUIR"></td>
<td><input type="reset" name="reset" id="button" value="Limpar"></td><tr>
</table>
<p><a href= "painel.php"> HOME </a>


<?php
	if (isset($_POST["OK"])){
		$up = "DELETE FROM usuarios WHERE usuario = '".$login."'";
		mysql_query($up) or die(mysql_error());
		session_destroy();
		header("Location: index.php");
	}
?>
<table border=1>
		<tr><td>USUÁRIOS JÁ CADASTRADOS</td></tr>
			<tr><td>Id Usuário</td><td>Usuário</td><td>Nome do Usuário</td></tr>
		</tr>
		<?php
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