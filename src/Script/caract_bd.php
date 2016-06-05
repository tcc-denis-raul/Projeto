<?php
session_start();
include_once "bd.php";
include_once "verifica_caracteristica.php";

$quantidade_cursos = 5;

class Main
{
    /*Função que retorna todos os cursos pontuados conforme as caracteristicas*/
    public function getCursos()
    {
        // global $db, $colecao_cursos;
        if (!empty($_POST)) {
            $f  = new Funcoes;
            $bd = new BD;
            //procura por todos os cursos
            $cursos = $bd->find();
            if(isset($_SESSION['email'])) {
                $inserted = $bd->setCustomCurses(
                    array(
                        "email" => $_SESSION["email"],
                        "baseado" => $_POST["baseado"] ? $_POST["baseado"] : "",
                        "dinamica" => $_POST["dinamica"] ? $_POST["dinamica"] : "",
                        "plataforma" => $_POST["plataforma"] ? $_POST["plataforma"] : "",
                        "extra" => $_POST["extra"] ? $_POST["extra"] : "",
                        "preco" => $_POST["preco"] ? $_POST["preco"] : ""
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
$req                           = new Main;
$req->getCursos();
$_SESSION['top_cursos_idioma'] = array_slice((array) $cursos, 0, $quantidade_cursos);
header("Location: ../custom_curses.php");
