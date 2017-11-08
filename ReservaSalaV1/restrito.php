<?php
	@session_start();
	if (isset($_SESSION["loggin"])){
		
	}else{
		header('location:index.php');
	}
		
?>