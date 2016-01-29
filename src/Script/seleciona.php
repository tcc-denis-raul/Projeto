<?php
session_start();
include_once "bd.php";
include_once "verificaCaracteristica.php";

$quantidade_cursos = 5;

class Main
{
    /*Função que retorna todos os cursos pontuados conforme as caracteristicas*/
    public function getCursos()
    {
        // global $db, $colecao_cursos;
        if (!empty($_POST)) {
            $f  = new Funcoes;
            $bd = new BancoDeDados;
            //procura por todos os cursos
            $cursos = $bd->find();
            foreach ($cursos as $um_curso) {
                $pontua_cursos[$um_curso["nome"]] = 0;
                if ($f->possuiCaracteristica($um_curso["baseadoEm"], $_POST["baseado"])) {
                    $pontua_cursos[$um_curso["nome"]]++;
                }
                if ($f->possuiCaracteristica($um_curso["dinamica"], $_POST["dinamica"])) {
                    $pontua_cursos[$um_curso["nome"]]++;
                }
                if ($f->possuiCaracteristica($um_curso["plataforma"], $_POST["plataforma"])) {
                    $pontua_cursos[$um_curso["nome"]]++;
                }
                if ($f->possuiCaracteristica($um_curso["extra"], $_POST["extra"])) {
                    $pontua_cursos[$um_curso["nome"]]++;
                }
                if ($_POST["preco"] == "gratis") {
                    if ($f->possuiCaracteristica($um_curso["precoReal"], 0)) {
                        $pontua_cursos[$um_curso["nome"]]++;
                    }
                } else if ($f->faixaPreco($um_curso["precoReal"], $_POST["preco"], "real")) {
                    $pontua_cursos[$um_curso["nome"]]++;
                } else if ($f->faixaPreco($um_curso["precoDolar"], $_POST["preco"], "dolar")) {
                    $pontua_cursos[$um_curso["nome"]]++;
                }
            }
            arsort($pontua_cursos);
            return $pontua_cursos;
        }
    }
}
$req                           = new Main;
$cursos                        = $req->getCursos();
$_SESSION['top_cursos_idioma'] = array_slice((array) $cursos, 0, $quantidade_cursos);
header("Location: ../resultado.php");
