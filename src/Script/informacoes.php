<?php 
include_once "bd.php";
include_once "verifica_caracteristica.php";
class Informacoes {
	private $baseadoEm = array("texto", "videoAula", "exemplo", "exercicioInterativo");
	private $dinamica = array("cursoLivre","tempoDefinido","inicioDefinido");
	private $plataforma = array("andOff","andOn", "iosOff", "iosOn", "desktopOff", "desktopOn");
	private $extra = array("selecaoNivel","professor", "comunicacaoAlunos");
	function getDados($nome){
		$bd = new BD;
		$f = new Funcoes;
		$curso_dados = $bd->findOne(array('nome' => $nome));
		$resultado['nome'] = $curso_dados['nome'];
		foreach ($this->baseadoEm as $carac) {
			$f->possuiCaracteristica($curso_dados['baseadoEm'], $carac) ? $resultado[$carac] = "&radic;" : $resultado[$carac] = "X";
		}
		foreach ($this->dinamica as $carac) {
			$f->possuiCaracteristica($curso_dados['dinamica'], $carac) ? $resultado[$carac] = "&radic;" : $resultado[$carac] = "X";
		}
		foreach ($this->plataforma as $carac) {
			$f->possuiCaracteristica($curso_dados['plataforma'], $carac) ? $resultado[$carac] = "&radic;" : $resultado[$carac] = "X";
		}
		foreach ($this->extra as $carac) {
			$f->possuiCaracteristica($curso_dados['extra'], $carac) ? $resultado[$carac] = "&radic;" : $resultado[$carac] = "X";
		}
		return $resultado;
	}
}
?>