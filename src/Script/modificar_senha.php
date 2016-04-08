<?php
session_start();
include_once "bd.php";

class Modificar
{
    public function validaCampos($campo1, $campo2, $campo3) {
        if($campo1 == "" || $campo2 == "" || $campo3 == "") {
            return 0;
        }
        return 1;
    }
    
    public function modificarSenha()
    {
        // global $db, $colecao_cursos;
        if (!empty($_POST)) {
            $email = $_POST["email"];
            $antiga = md5($_POST["senha_antiga"]);
            $nova = md5($_POST["nova_senha"]);
            $confirmar = md5($_POST["confirmar_senha"]);

            if(!$this->validaCampos($antiga, $nova, $confirmar)){
                echo "<script>alert('Preencha todos os campos');history.back();</script>";
            } else {
                $bd = new BD;
                $usuario = $bd->findUsuario(array('email' => $email));
                if($antiga != $usuario['senha']){
                    echo "<script>alert('Senha antiga inválida');history.back();</script>";
                    return;
                }
                if($nova != $confirmar){
                    echo "<script>alert('Senhas não são as mesmas');history.back();</script>";
                    return;   
                }
                $ok = $bd->updateUsuario(array('email' => $email, "senha" => $nova));
                if(!$ok){
                    echo "<script>alert('Usuário não encontrado');history.back();</script>";
                } else {
                    echo "<script>alert('Senha modificado com sucesso');window.location='../login.php';</script>";
                }
            }
        }
    }
}
$cad = new Modificar;
$cad->modificarSenha();
