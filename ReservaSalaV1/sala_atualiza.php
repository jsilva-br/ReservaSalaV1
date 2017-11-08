<html>
<body>
	<form id="form1" name="form1" method="post" action="">
	<center>
	<table border=1>
		<tr><td colspan=2 align=center >ATUALIZAR SALA</td></tr>
		<?php
		session_start();
		echo "<center>Você já esta logado como ".$_SESSION["nome"]."<br>";
		echo "<p><a href= 'painel.php'> HOME </a>";
		
			
		$id_sala=$_POST["id_sala"];
		echo "<br> ID da SALA é: ".$id_sala."<br>";
		require_once "config.php";	
		$sql = mysql_query("SELECT * FROM  salas WHERE id_sala = '".$id_sala."'") or die(mysql_error());
		$row = mysql_num_rows($sql);
			
		while($l = mysql_fetch_array($sql)) {
				//$id_sala   = $l["id_sala"];
				$sala =$l["sala"];	
				$nome_sala =$l["nome_sala"];
		}
		echo "<tr><td>ID da Sala.........:</td><td><input  type=hidden name=id_sala id=id_sala value=".$id_sala." size= 6 >".$id_sala."</td></tr><p>";
		echo "<tr><td>Número da Sala.....:</td><td><input  type=text name=sala id=usuario value=".$sala." size= 6 ></td></tr><p>";
		echo "<tr><td>Nome da Sala.......:</td><td><input  type=text name=nome_sala id=nsala value=".$nome_sala." size=30 ></td></tr><p>";

		?>
	</table>
	<br>
	<table border=1>
		<tr><td><input type="submit" name="OK" id="button" value="Gravar"></td>
	</table>



<?php
	if (isset($_POST["OK"])){
			$id_sala  = $_POST["id_sala"];
			$sala     = $_POST["sala"];
			$nome_sala= $_POST["nome_sala"];
			
			echo "Recebi os valores: ".$sala." e ".$nome_sala."<br>";

			$up = "UPDATE salas 
				SET  
				sala = '$sala',
				nome_sala  = '$nome_sala' WHERE id_sala = '$id_sala'";

			//mysql_select_db($banco,$conecta);
			mysql_query($up) or die(mysql_error());
	}else{
			echo "Que coisa!!!!";
				
	}
?>
<table border=1>
		<tr><td>SALAS JÁ CADASTRADAS</td></tr>
			<tr><td>Id Sala</td><td>Número da Sala</td><td>Nome da Sala</td></tr>
		</tr>
		<?php
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