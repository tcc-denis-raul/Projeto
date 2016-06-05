<?php
session_start();
include_once "bd.php";
include_once "verifica_caracteristica.php";

class Main
{
    /*Função que retorna todos os cursos pontuados conforme as caracteristicas*/
    public function getCursosBd()
    {
        // global $db, $colecao_cursos;
        $quantidade_cursos = 5;
        $f  = new Funcoes;
        $bd = new BD;
        //procura por todos os cursos
        $cursos = $bd->find();
        $caracteristicas = $bd->getCustomCurses(array("email" => $_SESSION['email']));
        foreach ($cursos as $um_curso) {
            $pontua_cursos[$um_curso["nome"]] = 0;
            if ($f->possuiCaracteristica($um_curso["baseadoEm"], $caracteristicas["baseado"])) {
                $pontua_cursos[$um_curso["nome"]]++;
            }
            if ($f->possuiCaracteristica($um_curso["dinamica"], $caracteristicas["dinamica"])) {
                $pontua_cursos[$um_curso["nome"]]++;
            }
            if ($f->possuiCaracteristica($um_curso["plataforma"], $caracteristicas["plataforma"])) {
                $pontua_cursos[$um_curso["nome"]]++;
            }
            if ($f->possuiCaracteristica($um_curso["extra"], $caracteristicas["extra"])) {
                $pontua_cursos[$um_curso["nome"]]++;
            }
            if ($_POST["preco"] == "gratis") {
                if ($f->possuiCaracteristica($um_curso["precoReal"], 0)) {
                    $pontua_cursos[$um_curso["nome"]]++;
                }
            } else if ($f->faixaPreco($um_curso["precoReal"], $caracteristicas["preco"], "real")) {
                $pontua_cursos[$um_curso["nome"]]++;
            } else if ($f->faixaPreco($um_curso["precoDolar"], $caracteristicas["preco"], "dolar")) {
                $pontua_cursos[$um_curso["nome"]]++;
            }
        }
        arsort($pontua_cursos);
        return array_slice((array) $pontua_cursos, 0, $quantidade_cursos);
    }
}