<?php
	echo "teste1";
	include "Conectar.php";
	echo "teste2";
	if($_SERVER['REQUEST_METHOD'] == "POST") { 
		echo "teste";
		echo $_POST["baseado"];
		echo $_POST["preco"];
		echo $_POST["dinamica"];
		echo $_POST["plataforma"];
		echo $_POST["extra"];
		// $teste = $_POST['valor'];
		// echo $teste;
		echo "ok";
	} else {
		echo "aff";
	}
?>