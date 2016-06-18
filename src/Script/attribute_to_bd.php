<?php
session_start();
include_once "database.php";

class AttributeToDB extends DataBase
{
    /*Função que retorna todos os cursos pontuados conforme as caracteristicas*/
    public function saveAttributeInDB()
    {
        // global $db, $colecao_cursos;
        if (!empty($_POST)) {
            if(isset($_SESSION['email'])) {
                $inserted = $this->insertCustomCourses(
                    array(
                        "email" => $_SESSION["email"],
                        "baseado" => $_POST["based"] ? $_POST["based"] : "",
                        "dinamica" => $_POST["dynamic"] ? $_POST["dynamic"] : "",
                        "plataforma" => $_POST["platform"] ? $_POST["platform"] : "",
                        "extra" => $_POST["extra"] ? $_POST["extra"] : "",
                        "preco" => $_POST["price"] ? $_POST["price"] : ""
                    )
                );
                if(!$inserted){
                    echo "<script>alert('Erro inesperado, tente novamente');history.back();</script>";
                    return;
                }
            }
        }
    }
}
$req                           = new AttributeToDB;
$req->saveAttributeInDB();
header("Location: ../profile_courses.php");
