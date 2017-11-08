<?php
include("restrito.php");

	echo 'Você esta logado como: '.$_SESSION["loggin"].' <a href="?logout=sim">Sair</a>'; 

	if ($_GET["logout"]){
		session_destroy();
		header('location:index.php');
	}
?>