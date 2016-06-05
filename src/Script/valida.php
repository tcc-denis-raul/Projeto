<?php
session_start();
include_once "bd.php";

class Main
{
    public function validaCampos($campo1, $campo2) {
        if($campo1 == "" || $campo2 == "") {
            return 0;
        }
        return 1;
    }
    /*Função que retorna todos os cursos pontuados conforme as caracteristicas*/
    public function getUser()
    {
        if (!empty($_POST)) {
            $email = $_POST["email"];
            $senha = md5($_POST["senha"]);
            $bd = new BD;
            $usuario_bd = $bd->findUsuario(array('email' => $email));
            $_SESSION['email'] = $email;
            $_SESSION['nome'] = $usuario_bd['nome'];
            if(!$this->validaCampos($email, $senha)) {
                unset($_SESSION['email']);
                unset($_SESSION['nome']);
                echo "<script>alert('Preencha todos os campos');history.back();</script>";
            }
            else if(sizeof($usuario_bd) <= 0){
                unset($_SESSION['email']);
                unset($_SESSION['nome']); 
                echo "<script>alert('Email não encontrado');history.back();</script>";
            }
            else if($usuario_bd["senha"] != $senha) {
                unset($_SESSION['email']);
                unset($_SESSION['nome']); 
                echo "<script>alert('senha invalida');history.back();</script>";   
            }
        }
    }
}
$req                           = new Main;
$req->getUser();
header("Location: ../index.php");
