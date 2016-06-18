<?php 
include_once "Script/database.php";
session_start();
$email = $_SESSION['email'];
$db = new DataBase;
$caract = $db->findCustomCourses(array("email" => $email));
?>
<!-- Lista todos os cursos presente no banco de dados -->
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Paloma - Porque aprender é uma experiência única</title>
    <!--    Stylesheet Files    -->
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/foundation.min.css" />
    <link rel="stylesheet" href="css/main.css" />
</head>

<body>
    
    <section class="hero2 survey">
        <?php include 'top_bar.php'; ?>
        
        <div>
            <h3 align="center">Caracteristicas atuais: </h3>
        </div>
        <br>

        <div class="row" data-equalizer data-equalizer-mq="large-up">
            <div class="medium-5 columns panel" data-equalizer-watch>
                <?php switch ($caract["baseado"]) {
                    case 'texto': ?>
                    <h3 color="red">Textos</h3>
                <?php   break;
                    case 'videoAula': ?>
                        <h3>Video Aula</h3>
                <?php   break;
                    case 'exemplo': ?>
                        <h3>Exemplos</h3>
                <?php   break;
                    case 'exercicioInterativo': ?>
                        <h3>Exercicios Interativos</h3>
                <?php   break;
                    default: ?>
                        <h3 color="red">Textos</h3>
                        <h3>Video Aula</h3>
                        <h3>Exemplos</h3>
                        <h3>Exercicios Interativos</h3>
                <?php   break;
                } ?>
            </div>
            <div class="medium-6 columns panel" data-equalizer-watch>
                <?php switch ($caract["dinamica"]) {
                    case 'cursoLivre': ?>
                        <h3>Curso Livre</h3>
                <?php   break;
                    case 'cursoLivre': ?>
                        <h3 href="">Tempo de Curso Definido</h3>
                <?php   break;
                    case 'cursoLivre': ?>
                        <h3 href="">Data de Início Definida</h3>
                <?php   break; 
                    default: ?>
                        <h3>Curso Livre</h3>
                        <h3 href="">Tempo de Curso Definido</h3>
                        <h3 href="">Data de Início Definida</h3>
                <?php   break;
                } ?>
            </div>
            <div class="medium-6 columns panel" data-equalizer-watch>
                <?php switch ($caract["plataforma"]) {
                    case 'andOff': ?>
                        <h3>Android - Offline</h3>
                <?php   break;
                    case 'andOn': ?>
                        <h3>Android - Online</h3>    
                <?php   break;
                    case 'iosOff': ?>
                        <h3>IOS - Offline</h3>    
                <?php   break; 
                    case 'iosOn': ?>
                        <h3>IOS - Online</h3>    
                <?php   break;
                    case 'desktopOff': ?>
                        <h3>Desktop - Offline</h3>    
                <?php   break;
                    case 'desktopOn': ?>
                        <h3>Desktop - Online</h3>    
                <?php   break;
                    default: ?>
                        <h3>Android - Offline</h3>
                        <h3>Android - Online</h3>  
                        <h3>IOS - Offline</h3>  
                        <h3>IOS - Online</h3>    
                        <h3>Desktop - Offline</h3>   
                        <h3>Desktop - Online</h3>  
                <?php   break;
                } ?>
            </div>
            <div class="medium-6 columns panel" data-equalizer-watch>
                <?php switch ($caract["extra"]) {
                    case 'selecaoNivel':?>
                        <h3>Seleção de Nível de conhecimento</h3>
                <?php   break;
                    case 'professor':?>
                        <h3>Professor Disponível</h3>
                <?php   break;
                    case 'comunicacaoAlunos':?>
                        <h3>Comunicação entre alunos</h3>
                <?php   break;
                    default: ?>
                        <h3>Seleção de Nível de conhecimento</h3>
                        <h3>Professor Disponível</h3>
                        <h3>Comunicação entre alunos</h3>
                <?php   break;
                } ?>
            </div>
            <div class="medium-6 columns panel" data-equalizer-watch>
                <?php switch ($caract["preco"]) {
                    case "gratis": ?> 
                        <h3>Grátis</h3>                    
                <?php   break;
                    case "ate30": ?>
                        <h3>Até 30 reais</h3>
                <?php   break;
                    case "31a60":?>
                        <h3>De 31 a 60 reais</h3>
                <?php   break;
                    case "61a100": ?>
                        <h3>De 61 a 100 reais</h3>
                <?php   break;
                    case "101a150":?>
                        <h3>De 101 a 150 reais</h3>
                <?php   break;
                    case "151mais":?>
                        <h3>Mais de 151 reais</h3>
                <?php   break;
                    default: ?>
                        <h3>Grátis</h3>  
                        <h3>Até 30 reais</h3>
                        <h3>De 31 a 60 reais</h3>
                        <h3>De 61 a 100 reais</h3>
                        <h3>De 101 a 150 reais</h3>
                        <h3>Mais de 151 reais</h3>
                <?php   break;
                } ?>
            </div>
        </div>

    

        <a href="change_attributes.php" class="button round index"><span>Modificar</span></a>        
    </section> 
        <!--    Javascript Files    -->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/foundation.min.js"></script>
</body>

</html>

<?php include 'footer.php'; ?>
