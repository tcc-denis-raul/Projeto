<?php
session_start();
include_once "database.php";
include_once "check_attribute.php";

$number_courses = 5;

class SelectCourse extends CheckAttributes
{
    /*Função que retorna todos os cursos pontuados conforme as caracteristicas*/
    public function ScoreCourse()
    {
        // global $db, $colecao_cursos;
        if (!empty($_POST)) {
            $db = new DataBase;
            //procura por todos os cursos
            $courses = $db->findCourses();
            foreach ($courses as $course) {
                $scored_course[$course["nome"]] = 0;
                if ($this->checkAttribute($course["baseadoEm"], $_POST["based"])) {
                    $scored_course[$course["nome"]]++;
                }
                if ($this->checkAttribute($course["dinamica"], $_POST["dynamic"])) {
                    $scored_course[$course["nome"]]++;
                }
                if ($this->checkAttribute($course["plataforma"], $_POST["platform"])) {
                    $scored_course[$course["nome"]]++;
                }
                if ($this->checkAttribute($course["extra"], $_POST["extra"])) {
                    $scored_course[$course["nome"]]++;
                }
                if ($_POST["price"] == "gratis") {
                    if ($this->checkAttribute($course["precoReal"], 0)) {
                        $scored_course[$course["nome"]]++;
                    }
                } else if ($this->rangePrice($course["precoReal"], $_POST["price"], "real")) {
                    $scored_course[$course["nome"]]++;
                } else if ($this->rangePrice($course["precoDolar"], $_POST["price"], "dolar")) {
                    $scored_course[$course["nome"]]++;
                }
                $scored_course[$course["nome"]] = (($course["rate"] + $scored_course[$course["nome"]]) / 2 ) ;
            }
            arsort($scored_course);
            return $scored_course;
        }
    }
}
$req                                = new SelectCourse;
$courses                            = $req->ScoreCourse();
$_SESSION['top_courses_language']   = array_slice((array) $courses, 0, $number_courses);
header("Location: ../best_courses.php");
