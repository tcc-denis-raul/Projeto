<?php
session_start();
include_once "bd.php";

class Cadastrar
{
    public function validaCampos($campo1, $campo2, $campo3) {
        if($campo1 == "" || $campo2 == "" || $campo3 == "") {
            return 0;
        }
        return 1;
    }
    /*Função que retorna todos os cursos pontuados conforme as caracteristicas*/
    public function cadastrarUsuario()
    {
        // global $db, $colecao_cursos;
        if (!empty($_POST)) {
            $email = $_POST["email"];
            $nome = $_POST["nome"];
            $senha = md5($_POST["senha"]);
            if(!$this->validaCampos($email, $senha, $nome)){
                unset($_SESSION['login']);
                echo "<script>alert('Preencha todos os campos');history.back();</script>";
            } else {
                $_SESSION['login'] = $email;
                $bd = new BD;
                $ok = $bd->insertUsuario(array('email' => $email, "nome" => $nome, "senha" => $senha));
                if(!$ok){
                    unset($_SESSION['login']);
                    echo "<script>alert('Email já cadastrado');history.back();</script>";
                } else {
                    echo "<script>alert('Usuario criado com sucesso');window.location='../login.html';</script>";
                }
            }
        }
    }
}
$cad = new Cadastrar;
$cad->cadastrarUsuario();
