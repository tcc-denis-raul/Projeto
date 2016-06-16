<?php
session_start();
include_once "bd.php";

class Indicar
{
    public function validaCampos($campo1, $campo2) {
        if($campo1 == "" || $campo2 == "") {
            return 0;
        }
        return 1;
    }
    /*Função que retorna todos os cursos pontuados conforme as caracteristicas*/
    public function indicaCurso()
    {
        // global $db, $colecao_cursos;
        if (!empty($_POST)) {
            $nome = $_POST["nome_curso"];
            $endereco = $_POST["endereco_curso"];
            if(!$this->validaCampos($nome, $endereco)){
                echo "<script>alert('Preencha todos os campos');history.back();</script>";
            } else {
                $bd = new BD;
                $i = $bd->insertNewCourse(
                        array(
                            'nome' => $nome, 
                            "endereco" => $endereco, 
                        )
                    );
                if($i) {
                    echo "<script>alert('Curso registrado. Obrigado');history.back();</script>";
                }
            }
        }
    }
}
$cad = new Indicar;
$cad->indicaCurso();
header("Location: ../index.php");
