<?php
session_start();
include_once "database.php";

class Signup extends DataBase
{
    public function checkFields($field1, $field2, $field3) {
        if($field1 == "" || $field2 == "" || $field3 == "") {
            return 0;
        }
        return 1;
    }
    /*Função que retorna todos os cursos pontuados conforme as caracteristicas*/
    public function registerUser()
    {
        // global $db, $colecao_cursos;
        if (!empty($_POST)) {
            $email              = $_POST["email"];
            $name               = $_POST["name"];
            $password           = md5($_POST["password"]);
            if(!$this->checkFields($email, $password, $name)){
                unset($_SESSION['email']);
                unset($_SESSION['name']);
                echo "<script>alert('Preencha todos os fields');history.back();</script>";
            } else {
                $_SESSION['email']  = $email;
                $_SESSION['name']   = $name;
                date_default_timezone_set('America/Sao_Paulo');
                $time = date('d/m/y H:i:s');
                $ok = $this->insertUser(
                        array(
                            'email'         => $email, 
                            "name"          => $name, 
                            "password"      => $password, 
                            "created"       => $time,
                            "photo"         => "img/usuario/default.jpeg"
                        )
                    );
                if(!$ok){
                    unset($_SESSION['email']);
                    unset($_SESSION['name']);
                    echo "<script>alert('Email já cadastrado');history.back();</script>";
                } else {
                    echo "<script>alert('Usuario criado com sucesso');window.location='../index.php';</script>";
                }
            }
        }
    }
}
$regis = new Signup;
$regis->registerUser();
