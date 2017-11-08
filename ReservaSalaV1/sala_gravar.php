<?php
require_once "config.php";
?>


<?php
	echo "<center>";
	$numsala= $_POST["numsala"];
	$nomesala= $_POST["nomesala"];
	//Verifica se os campos estão em branco
	if (($numsala =='') || ($nomesala=='')){
		echo "Verifique os campos em branco ! ";
		echo "AGUARDE REDIRECIONANDO PARA O PAINEL! ";
		echo "<script>setTimeout(window.location='painel.php',5000);</script>";
	}else {
		//Aqui ele vai verificar se a sala já esta cadastrada
		$sql = mysql_query("SELECT * FROM  salas WHERE sala = '".$numsala."'") or die(mysql_error());
				$row = mysql_num_rows($sql);
				//echo "<br>".$row;
		if ($row>0){
			echo "Número da sala: ".$numsala."<br>Já esta cadastrado no SISTEMA!<br>";
			echo "AGUARDE REDIRECIONANDO PARA O PAINEL! ";
			echo "<script>setTimeout(window.location='painel.php',3000);</script>";	 
		}else{
			//SE estiver tudo certo ele grava as Informações
			echo "Número da sala: ".$numsala."<br>Nome da sala: ".$nomesala.".";
			mysql_query("INSERT INTO salas (id_sala, sala, nome_sala) VALUES ('', '$numsala', '$nomesala')") or die( mysql_error());
			//FINALIZA A CONEXÃO COM O MYSQL
			mysql_close($conecta);
			echo "AGUARDE REDIRECIONANDO PARA O PAINEL! ";
			echo "<script>setTimeout(window.location='painel.php',3000);</script>";	  
		}
	}
	 
?>
<html>
<body>

<body>
</html>