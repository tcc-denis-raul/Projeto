<?php 
include_once "database.php";
include_once "check_attribute.php";

class CourseEval extends CheckAttributes {
	private $based = array("texto", "videoAula", "exemplo", "exercicioInterativo");
	private $dynamics = array("cursoLivre","tempoDefinido","inicioDefinido");
	private $platform = array("andOff","andOn", "iosOff", "iosOn", "desktopOff", "desktopOn");
	private $extra = array("selecaoNivel","professor", "comunicacaoAlunos");
	
	function CoursesEval($name){
		$db = new DataBase;
		$course = $db->findCourses(array('nome' => $name));
		$result['nome'] = $course['nome'];
		foreach ($this->based as $attribute) {
			$this->checkAttribute($course['baseadoEm'], $attribute) ? $result[$attribute] = "&radic;" : $result[$attribute] = "X";
		}
		foreach ($this->dynamics as $attribute) {
			$this->checkAttribute($course['dinamica'], $attribute) ? $result[$attribute] = "&radic;" : $result[$attribute] = "X";
		}
		foreach ($this->platform as $attribute) {
			$this->checkAttribute($course['plataforma'], $attribute) ? $result[$attribute] = "&radic;" : $result[$attribute] = "X";
		}
		foreach ($this->extra as $attribute) {
			$this->checkAttribute($course['extra'], $attribute) ? $result[$attribute] = "&radic;" : $result[$attribute] = "X";
		}
		$price = $this->getMinMaxPrice($course['precoReal'], $course['precoDolar']);
		$result['minPreco'] = $price['min'];
		$result['maxPreco'] = $price['max'];
		$result['rate'] = $course['rate'];
		return $result;
	}
}
?>