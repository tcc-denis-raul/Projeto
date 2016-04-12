<?php
	session_start();
	include_once "bd.php";
	date_default_timezone_set('America/Sao_Paulo');
	$email = $_SESSION["email"];
	$data = date('d/m/y H:i:s');
	$bd = new BD;
	$ok = $bd->updateUsuario(array('email' => $email, "ultimo_acesso" => $data));
	if(!$ok){
        echo "<script>alert('Usuário não encontrado');history.back();</script>";
    }
	session_destroy();
	header("location: ../index.php"); 
?>