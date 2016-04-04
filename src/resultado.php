<?php
include_once "Script/informacoes.php";
session_start();
$top_cursos = $_SESSION['top_cursos_idioma'];
?>
<!DOCTYPE html>

<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Paloma - Porque aprender é uma experiência única</title>

        <!-- Included CSS Files -->
        <link rel="stylesheet" href="css/normalize.css" />
        <link rel="stylesheet" href="css/foundation.min.css" />
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="css/stylesheets/globals.css">
        <link rel="stylesheet" href="css/stylesheets/typography.css">
        <link rel="stylesheet" href="css/stylesheets/grid.css">
        <link rel="stylesheet" href="css/stylesheets/ui.css">
        <link rel="stylesheet" href="css/stylesheets/forms.css">
        <link rel="stylesheet" href="css/stylesheets/orbit.css">
        <link rel="stylesheet" href="css/stylesheets/reveal.css">
        <link rel="stylesheet" href="css/stylesheets/mobile.css">
        <link rel="stylesheet" href="css/stylesheets/app.css">
        <link rel="stylesheet" href="css/stylesheets/responsive-tables.css">
        

    </head>

    <body>
        <section class="cursos">
            <?php include 'top_menu_modelo.php'; ?>    
            
            <div class="container">
                <div class="row">
                    <div class="twelve columns">
                        <h5>Cursos</h5>
                        <table class="responsive">
                            <tr>
                                <th></th>
                                <th>Textos</th>
                                <th>Video aulas</th>
                                <th>Exemplos</th>
                                <th>Exercícios interativos</th>
                                
                                <th>Preços</th>
                                
                                <th>Curso Livre</th>
                                <th>Tempo Definido</t>
                                <th>Início definido</th>
                                
                                <th>Android - Online</th>
                                <th>Android - Offline</th>
                                <th>Ios - Online</th>
                                <th>Ios - Offline</th>
                                <th>Desktop - Online</th>
                                <th>Desktop - Offline</th>

                                <th>Seleção de nível</th>
                                <th>Professor</th>
                                <th>Comunicação entre alunos</th>
                            </tr>
                            <?php foreach ($top_cursos as $curso => $ig) {
                                $inf = new Informacoes;
                                $resultado = $inf->getDados($curso);
                            ?>
                            <tr>
                                <th ><?=$resultado['nome'];?></th>
                                <th ><?=$resultado['texto'];?></th>
                                <th ><?=$resultado['videoAula'];?></th>
                                <th ><?=$resultado['exemplo'];?></th>
                                <th ><?=$resultado['exercicioInterativo'];?></th>

                                <th><?= $resultado['minPreco'] == $resultado['maxPreco'] ? "R$".$resultado['minPreco'].",00" : "R$" . $resultado['minPreco'] . ",00 - " ."R$" .$resultado['maxPreco'].",00";?></th>

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

        <script type="text/javascript" src="js/javascripts/jquery.min.js"></script>
        <script type="text/javascript" src="js/javascripts/responsive-tables.js"></script>  
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

<?php include_once 'rodape_modelo.php'; ?>
