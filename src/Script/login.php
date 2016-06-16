<?php
session_start();
include_once "database.php";

class Login extends DataBase
{
    public function checkField($field1, $field2) {
        if($field1 == "" || $field2 == "") {
            return 0;
        }
        return 1;
    }
    
    public function getUser()
    {
        if (!empty($_POST)) {
            $email                      = $_POST["email"];
            $password                   = md5($_POST["password"]);
            $user                       = $this->findUser(array('email' => $email));
            $_SESSION['email']          = $email;
            $_SESSION['name']           = $user['name'];
            if(!$this->checkField($email, $password)) {
                unset($_SESSION['email']);
                unset($_SESSION['name']);
                echo "<script>alert('Preencha todos os campos');history.back();</script>";
            }
            else if(sizeof($user) <= 0){
                unset($_SESSION['email']);
                unset($_SESSION['name']); 
                echo "<script>alert('Email não encontrado');history.back();</script>";
            }
            else if($user["password"] != $password) {
                unset($_SESSION['email']);
                unset($_SESSION['name']); 
                echo "<script>alert('senha invalida');history.back();</script>";   
            }
        }
    }
}
$req                           = new Login;
$req->getUser();
header("Location: ../index.php");
