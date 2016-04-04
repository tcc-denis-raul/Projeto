<!DOCTYPE html>

<?php
include_once "Script/bd.php";
include_once "Script/informacoes.php";
$bd     = new BD;
$cursos = $bd->find();
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Paloma - Porque aprender é uma experiência única</title>

        <link rel="stylesheet" href="css/normalize.css" />
        <link rel="stylesheet" href="css/foundation.min.css" />
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="css/cursos.css" />

        <link rel="stylesheet" href="css/tabela/globals.css">
        <link rel="stylesheet" href="css/tabela/typography.css">
        <link rel="stylesheet" href="css/tabela/grid.css">
        <link rel="stylesheet" href="css/tabela/ui.css">
        <link rel="stylesheet" href="css/tabela/forms.css">
        <link rel="stylesheet" href="css/tabela/orbit.css">
        <link rel="stylesheet" href="css/tabela/reveal.css">
        <link rel="stylesheet" href="css/tabela/mobile.css">
        <link rel="stylesheet" href="css/tabela/app.css">
        <link rel="stylesheet" href="css/tabela/responsive-tables.css">
    </head>

    <body>
        <section class="cursos">
            <?php include 'top_menu_modelo.php'; ?>    

            <div class="container">
                <div class="row">
                    <div class="twelve columns">
                        <h5>Cursos: </h5>
                        <table class="responsive">
                            <tr>
                                <th></th>
                                <th colspan="4">Metodologia</th>
                                <th rowspan="2" colspan="1">Preco</th>
                                <th colspan="3">Dinamica</th>
                                <th colspan="6">Plataforma</th>
                                <th colspan="3">Extra</th>
                            </tr>
                            <tr>
                                <th ></th>
                                <th >Textos</th>
                                <th >Video aulas</th>
                                <th >Exemplos</th>
                                <th >Exercícios interativos</th>

                                <th >Curso Livre</th>
                                <th >Tempo Definido</t>
                                <th >Início definido</th>

                                <th >Android - Online</th>
                                <th >Android - Offline</th>
                                <th >Ios - Online</th>
                                <th >Ios - Offline</th>
                                <th >Desktop - Online</th>
                                <th >Desktop - Offline</th>

                                <th >Seleção de nível</th>
                                <th >Professor</th>
                                <th >Comunicação entre alunos</th>
                            </tr>

                            
                            <?php foreach ($cursos as $curso) {
                                $inf = new Informacoes;
                                $resultado = $inf->getDados($curso['nome']);
                            ?>
                                <tr>
                                    <th ><?=$resultado['nome'];?></th>
                                    <th ><?=$resultado['texto'];?></th>
                                    <th ><?=$resultado['videoAula'];?></th>
                                    <th ><?=$resultado['exemplo'];?></th>
                                    <th ><?=$resultado['exercicioInterativo'];?></th>

                                    <th>Precos</th>

                                    <th ><?=$resultado['cursoLivre'];?></th>
                                    <th ><?=$resultado['tempoDefinido'];?></t>
                                    <th ><?=$resultado['inicioDefinido'];?></th>

                                    <th ><?=$resultado['andOff'];?></th>
                                    <th ><?=$resultado['andOn'];?></th>
                                    <th ><?=$resultado['iosOff'];?></th>
                                    <th ><?=$resultado['iosOn'];?></th>
                                    <th ><?=$resultado['desktopOff'];?></th>
                                    <th ><?=$resultado['desktopOn'];?></th>

                                    <th ><?=$resultado['selecaoNivel'];?></th>
                                    <th ><?=$resultado['professor'];?></th>
                                    <th ><?=$resultado['comunicacaoAlunos'];?></th>
                                </tr>
                            <?php } ?>
                        </table>

                    </div>
                </div>
            </div>
        </section>

        <!--    Javascript Files    -->
        <script type="text/javascript" src="js/tabela/jquery.min.js"></script>
        <script type="text/javascript" src="js/tabela/responsive-tables.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/touchSwipe.min.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript" src="js/foundation.min.js"></script>
        <script type="text/javascript" src="js/foundation/foundation.topbar.js"></script>
        <script type="text/javascript" src="js/scrollTo.js"></script>
        <script type="text/javascript" src="js/map.js"></script>
        <script type="text/javascript" src="js/main.js"></script>

    </body>
</html>

<?php include 'rodape_modelo.php'; ?>
