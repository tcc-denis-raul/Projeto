<?php
if (!empty($_POST)){
	session_start();
	include_once "bd.php";
	$Curso = trim($_POST['enviardados']);
	//verificar se existe na tabela
	$db = new BD;
	$curso_original = $db->findOne(array("nome" => $Curso));
	$rate = $curso_original["rate"]+1;
	$db->updateCurses(array("nome" => $Curso, "rate" => $rate));
	$db->updateUsuarioCustom(
		array("email" => $_SESSION["email"], "avaliado" => $Curso)
	);
	header("Location: ../avaliar.php");
}
?>