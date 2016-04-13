<?php
session_start();
include_once "bd.php";
/* Algumas variaveis
	$email = email do usuário logado
	$image_dir = diretório onde será salvo a imagem (caminho absoluto)
	$nome = nome da imagem sem extensão (unico baseado no email do usuário)
	$imagem = caminho absoluto da imagem que foi enviado.
		ex. $imagem = /var/www/html/Projeto/src/img/usuario/a09da0kd.jpg
*/
$email = $_SESSION['email'];
$image_dir = "/var/www/html/Projeto/src/img/usuario/";
$nome = basename(md5(uniqid($email, true))); 
$imagem = $image_dir . $nome;
$tipo_imagem = pathinfo($image_dir . basename($_FILES["arquivo"]["name"]), PATHINFO_EXTENSION);
$imagem = $imagem . "." . $tipo_imagem;

// Verificar se é uma imagem
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["arquivo"]["tmp_name"]);
    if($check === false) {
        echo "<script>alert('Arquivo não é uma imagem');history.back();</script>";
        return;
    }
}

// Checar se já existe
if (file_exists($imagem)) {
    echo "<script>alert('Imagem já existe');history.back();</script>";
    return;
}

// Checar tamanho da imagem
if ($_FILES["arquivo"]["size"] > 500000) {
    echo "<script>alert('Tamanho muito grande');history.back();</script>";
    return;
}

// Permitir alguns formatos
if($tipo_imagem != "jpg" && $tipo_imagem != "png" && $tipo_imagem != "jpeg" && $tipo_imagem != "gif" ) {
	echo "<script>alert('Desculpe, somente arquivos JPG, JPEG, PNG e GIF são permitidos');history.back();</script>";
    return;
}

if (!move_uploaded_file($_FILES["arquivo"]["tmp_name"], $imagem)) {
	echo "<script>alert('Desculpe, ocorreu um erro ao enviar a imagem, tente novamente');history.back();</script>";
} else {
	$bd = new BD;
	$usuario = $bd->findUsuario(array("email" => $email));
	if($usuario['foto'] != "img/usuario/default.jpeg"){
		unlink("/var/www/html/Projeto/src/" . $usuario['foto']);
	}
	$bd->updateUsuario(array("email" => $email, "foto" => "img/usuario/" . $nome . "." . $tipo_imagem));
	header("location: ../perfil.php"); 
}
?>