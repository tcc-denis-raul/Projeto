<?php
session_start();
include_once "database.php";

class RecommendCourse extends DataBase
{
    public function checkFields($field1, $field2) {
        if($field1 == "" || $field2 == "") {
            return 0;
        }
        return 1;
    }
    /*Função que retorna todos os cursos pontuados conforme as caracteristicas*/
    public function recommendCourse()
    {
        // global $db, $colecao_cursos;
        if (!empty($_POST)) {
            $name               = $_POST["name"];
            $address            = $_POST["address"];
            if(!$this->checkFields($name, $address)){
                echo "<script>alert('Preencha todos os fields');history.back();</script>";
            } else {
                $i = $this->insertNewCourseRecommend(
                        array(
                            'name'          => $name, 
                            "address"       => $address, 
                        )
                    );
               echo "<script>alert('Curso registrado. Obrigado');history.back();</script>";
               return;
            }
        }
    }
}
$cad = new RecommendCourse;
$cad->recommendCourse();
