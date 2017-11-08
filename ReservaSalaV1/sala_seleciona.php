<html>
<body>
	<form id="form1" name="form1" method="post" action="atualiza_sala.php">
	<center>
	<table border=1>
		<tr><td colspan=2 align=center >ATUALIZAÇÃO DE SALAS</td></tr>
		<?php
		session_start();
		echo "<center>Você já esta logado como ".$_SESSION["nome"]."<br>";
		echo "<p><a href= 'painel.php'> HOME </a>";
		?>
		<?php
			require_once "config.php";
			
			$login=$_SESSION["nome"];
			
			$sql = mysql_query("SELECT * FROM  salas") or die(mysql_error());
			$row = mysql_num_rows($sql);
			//echo $row."<br>";
			
			while($l = mysql_fetch_array($sql)) {
					$id_sala   = $l["id_sala"];
					$sala =$l["sala"];	
					$nome_sala =$l["nome_sala"];
			}
		echo "<tr><td>SELECIONE A SALA.....:</td><p>";
		?>
                    <td align="left" valign="middle"><select name="id_sala" ">
                      <option value="0">-- Selecione Sala --</option>
                      <?php for($i=0; $i<$row; $i++) { ?>
                      <option value="<?php echo mysql_result($sql, $i, "id_sala"); ?>"> <?php echo mysql_result($sql, $i, "sala"); ?></option>
                      <?php } ?>
                    </select></td>
</table>
		<table border=1>
<tr><td><input type="submit" name="OK" id="button" value="Atualizar"></td>

</table>

<table border=1>
		<tr><td  colspan=3 align=center>SALAS CADASTRADAS</td></tr>
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