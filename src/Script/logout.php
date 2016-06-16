<?php
session_start();
include_once "database.php";
class Logout extends DataBase {
	
	public function logoutUser(){
		date_default_timezone_set('America/Sao_Paulo');
		$email 				= $_SESSION["email"];
		$time 				= date('d/m/y H:i:s');
		$ok 				= $this->updateUser(array('email' => $email, "last_acess" => $time));
		if(!$ok){
        	echo "<script>alert('Usuário não encontrado');history.back();</script>";
    	}
		session_destroy();
	}
}

$insert = new Logout;
$insert->logoutUser();
header("location: ../index.php"); 