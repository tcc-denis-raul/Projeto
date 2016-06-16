<?php
session_start();
include_once "database.php";

class ChangePassword extends DataBase
{
    public function checkFields($field1, $field2, $field3) {
        if($field1 == "" || $field2 == "" || $field3 == "") {
            return 0;
        }
        return 1;
    }
    
    public function ChangePassword()
    {
        // global $db, $colecao_cursos;
        if (!empty($_POST)) {
            $email                      = $_POST["email"];
            $old                        = md5($_POST["old_password"]);
            $new                        = md5($_POST["new_password"]);
            $check                      = md5($_POST["check_password"]);

            if(!$this->checkFields($old, $new, $check)){
                echo "<script>alert('Preencha todos os fields');history.back();</script>";
            } else {
                $user                   = $this->findUser(array('email' => $email));
                if($old != $user['password']){
                    echo "<script>alert('Senha antiga inválida');history.back();</script>";
                    return;
                }
                if($new != $check){
                    echo "<script>alert('Senhas não são as mesmas');history.back();</script>";
                    return;   
                }
                $ok = $this->updateUser(array('email' => $email, "password" => $new));
                if(!$ok){
                    echo "<script>alert('Usuário não encontrado');history.back();</script>";
                    return;
                } else {
                    echo "<script>alert('Senha modificado com sucesso');window.location='../index.php';</script>";
                    return;
                }
            }
        }
    }
}
$cad = new ChangePassword;
$cad->ChangePassword();
