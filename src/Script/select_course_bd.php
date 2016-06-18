<?php
session_start();
include_once "database.php";
include_once "check_attribute.php";

class SelectCourseDB extends CheckAttributes
{
    /*Função que retorna todos os cursos pontuados conforme as caracteristicas*/
    public function getCourseFromDB()
    {
        // global $db, $colecao_cursos;
        $number_course = 5;
        $db = new DataBase;
        //procura por todos os cursos
        $courses = $db->findCourses();
        $attributes = $db->findCustomCourses(array("email" => $_SESSION['email']));
        foreach ($courses as $course) {
            $scored_course[$course["nome"]] = 0;
            if ($this->checkAttribute($course["baseadoEm"], $attributes["baseado"])) {
                $scored_course[$course["nome"]]++;
            }
            if ($this->checkAttribute($course["dinamica"], $attributes["dinamica"])) {
                $scored_course[$course["nome"]]++;
            }
            if ($this->checkAttribute($course["plataforma"], $attributes["plataforma"])) {
                $scored_course[$course["nome"]]++;
            }
            if ($this->checkAttribute($course["extra"], $attributes["extra"])) {
                $scored_course[$course["nome"]]++;
            }
            if ($_POST["preco"] == "gratis") {
                if ($this->checkAttribute($course["precoReal"], 0)) {
                    $scored_course[$course["nome"]]++;
                }
            } else if ($this->rangePrice($course["precoReal"], $attributes["preco"], "real")) {
                $scored_course[$course["nome"]]++;
            } else if ($this->rangePrice($course["precoDolar"], $attributes["preco"], "dolar")) {
                $scored_course[$course["nome"]]++;
            }
        }
        arsort($scored_course);
        return array_slice((array) $scored_course, 0, $number_course);
    }
}