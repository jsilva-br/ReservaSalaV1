<html>
<body>
	<form id="form1" name="form1" method="post" action="">
	<center>
	<table border=1>
		<tr><td  colspan=2 align=center>CADASTRO DE USUÁRIOS</td></tr>
		<?php
		session_start();
		echo "<center>Você já esta logado como ".$_SESSION["nome"]."<br>";
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
		echo "<tr><td>Nome Completo.....:</td><td><input  type=text name=nome id=usuario value=".$nome." size= 30 ></td></tr><p>";
		echo "<tr><td>Usuário..:</td><td><input  type=text name=login id=login value=".$login." size= 10 ></td></tr><p>";
		echo "<tr><td>Senha....:</td><td><input  type=password name=senha id=passwords value=".$senha." size= 10 ></td></tr><p>";
		
		
	
		
		?>
</table><br>
		<table border=1>
<tr><td><input type="submit" name="OK" id="button" value="Gravar"></td>
<td><input type="reset" name="reset" id="button" value="Limpar"></td><tr>
</table>



<?php
	if (isset($_POST["OK"])){
			
			$login = $_POST["login"];
			$nome= $_POST["nome"];
			$senha = $_POST["senha"];

	$up = "UPDATE usuarios 
            SET  
              usuario = '$login',
			  nome  ='$nome',
			  senha = '$senha' WHERE id_usuario = '$id_usuario'";

   //mysql_select_db($banco,$conecta);
    mysql_query($up) or die(mysql_error());
	echo "ALTERAÇÃO EFETUADA COM SUCESSO!!!<p>AGUARDE REDIRECIONANDO PARA O PAINEL! ";
	 echo "<script>setTimeout(window.location='painel.php',3000);</script>";
			}
?>
<table border=1>
		<tr><td colspan=3 align=center>USUÁRIOS JÁ CADASTRADOS</td></tr>
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