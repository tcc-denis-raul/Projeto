<!-- Script que pontua cada curso do banco de dados conforma as caracteristicas selecionadas pelo usuário -->

<?php
include "Conectar.php";
include "cotacao_dolar.php";
session_start();
?>

<!-- variaveis globais -->
<?php
$precos = array(
    "ate30"   => array(0, 30.0),
    "31a60"   => array(31.0, 60.0),
    "61a100"  => array(61.0, 100.0),
    "101a150" => array(101.0, 150.0),
    "151mais" => array(151.0),
);

$quantidade_cursos = 5;
?>

<!-- Funcoes -->
<?php
/*
funcao para verificar se um certo valor está no array(bd)
Entrada:
$vet_bd:     array com as caracteristicas do curso a ser avaliado
$valor:      caracteristica a ser encontrado
Saída:
1:      contém
0:      nao contém
 */
function possuiCaracteristica($vet_bd, $valor)
{
    foreach ($vet_bd as $valor_vet) {
        if ($valor_vet == $valor) {
            return 1;
        }
    }
    return 0;
};

/*
Verifica se o curso está na faixa solicitada pelo cliente.
Entrada:
$vet_bd:    array de preços.
$faixa:     faixa de preço selecionado pelo cliente.
$moeda:     tipo da moeda: dolar ou real

Saída:
1:          curso com preço na faixa
0:          cuso fora da faixa
 */
function faixaPreco($vet_bd, $faixa, $moeda)
{
    global $precos, $dolar;
    foreach ($vet_bd as $valor_vet) {
        //dolar
        if ($moeda == "dolar") {
            $valor_vet = $valor_vet * $dolar;
        }
        if ($faixa == "151mais") {
            if (floatval($valor_vet) >= floatval($precos[$faixa]["0"])) {
                return 1;
            }
        } else if (floatval($valor_vet) >= floatval($precos[$faixa]["0"]) && floatval($valor_vet) <= floatval($precos[$faixa]["1"])) {
            return 1;
        }
    }
    return 0;
};

?>
<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //procura por todos os cursos
    $cursos = $db->$colecao_cursos->find();
    foreach ($cursos as $um_curso) {
        $pontua_cursos[$um_curso["nome"]] = 0;
        if (possuiCaracteristica($um_curso["baseadoEm"], $_POST["baseado"])) {
            $pontua_cursos[$um_curso["nome"]]++;
        }
        if (possuiCaracteristica($um_curso["dinamica"], $_POST["dinamica"])) {
            $pontua_cursos[$um_curso["nome"]]++;
        }
        if (possuiCaracteristica($um_curso["plataforma"], $_POST["plataforma"])) {
            $pontua_cursos[$um_curso["nome"]]++;
        }
        if (possuiCaracteristica($um_curso["extra"], $_POST["extra"])) {
            $pontua_cursos[$um_curso["nome"]]++;
        }
        if ($_POST["preco"] == "gratis") {
            if (possuiCaracteristica($um_curso["precoReal"], 0)) {
                $pontua_cursos[$um_curso["nome"]]++;
            }
        } else if (faixaPreco($um_curso["precoReal"], $_POST["preco"], "real")) {
            $pontua_cursos[$um_curso["nome"]]++;
        } else if (faixaPreco($um_curso["precoDolar"], $_POST["preco"], "dolar")) {
            $pontua_cursos[$um_curso["nome"]]++;
        }
    }
    arsort($pontua_cursos);
    $_SESSION['top_cursos_idioma'] = array_slice($pontua_cursos, 0, $quantidade_cursos);
    header("Location: ../resultado.php");
}

?>