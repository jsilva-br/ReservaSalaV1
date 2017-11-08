<html>
<body>
	<form id="form1" name="form1" method="post" action="">
	<center>
	<table border=1>
		<tr><td colspan=2 align=center>EXCLUSÃO DE USUÁRIOS</td></tr>
		<?php
		session_start();
		echo "<center>Você está logado como ".$_SESSION["nome"]."<br>";
		echo "<p><a href= 'painel.php'> HOME </a>";
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
</table><br>
		<table border=1>
<tr><td><input type="submit" name="OK" id="button" value="EXCLUIR"></td>

</table>



<?php
	if (isset($_POST["OK"])){
		$up = "DELETE FROM usuarios WHERE usuario = '".$login."'";
		mysql_query($up) or die(mysql_error());
		session_destroy();
		header("Location: index.php");
	}
?>
<table border=1>
		<tr><td colspan=3  align=center>USUÁRIOS JÁ CADASTRADOS</td></tr>
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


			//@mysql_close();

		?>
		
</table>

<table border=1>
		<tr><td colspan=7 align=center>RESERVAS JÁ FEITAS</td></tr>
			<tr><td>ID da Reserva</td><td>Número da Sala</td><td>Usuário</td><td>Data</td><td>Hora Inicial</td><td>Hora Final</td><td>Disponibilidade</td></tr>
		</tr>
		<?php
			
            //echo " Para usuario:".$login."<p>";
			
			$sql_user = mysql_query("SELECT * FROM  usuarios WHERE usuario = '".$login."'") or die(mysql_error());
			$row_user = mysql_num_rows($sql_user);
			//echo "<br> Encontrado :".$row_user." usuarios";
			
			while($b1 = mysql_fetch_array($sql_user)) {
					
					$id_usuario = $b1["id_usuario"];
					$nome 	 	= $b1["nome"];
					$usuario 	=$b1["usuario"];
			}
			
			$sql = mysql_query("SELECT * FROM  reservas WHERE id_usuario = '".$id_usuario."'") or die(mysql_error());
			$row = mysql_num_rows($sql);
			echo "<br> Encontrado :".$row." reversa(s) para o usuário ".$login.".<br>Para Exclui-lo, deve CANCELAR A(s) RESERVA(s).";
			
			while($l = mysql_fetch_array($sql)) {
					$id_reserva = $l["id_reserva"];
					$id_usuario   = $l["id_usuario"];
					$sala = $l["id_sala"];
					$data      =$l["data"];
					$hora_inicial =$l["hora_inicial"];
					$disponivel	 = $l["disponivel"];				
			
						
			$sql_user = mysql_query("SELECT * FROM  usuarios WHERE id_usuario = '".$id_usuario."'") or die(mysql_error());
			$row_user = mysql_num_rows($sql_user);
			//echo "<br> Encontrado :".$row1." usuarios";
			
			while($b = mysql_fetch_array($sql_user)) {
					
					$id_usuario = $b["id_usuario"];
					$nome 	 	= $b["nome"];
					$usuario 	=$b["usuario"];
			}
			
			$sql_sala = mysql_query("SELECT * FROM  salas WHERE id_sala = '".$sala."'") or die(mysql_error());
			$row_sala = mysql_num_rows($sql_sala);
			//echo "<br> Encontrado :".$row1." usuarios";
			
			while($b = mysql_fetch_array($sql_sala)) {
					
					$id_sala   = $b["id_sala"];
					$nome_sala = $b["nome_sala"];
					$sala      =$b["sala"];
			}
			
			
			$hora_final=$hora_inicial +1;
			
					echo "<br><tr><td>".$id_reserva."</td><td>".$sala."</td><td>".$usuario."</td><td>".$data."</td><td>".$hora_inicial."</td><td>".$hora_final."</td><td>".$disponivel."</td></tr>";
					}	 


			@mysql_close();

		?>
</table>
	</form>

</body>
</html>