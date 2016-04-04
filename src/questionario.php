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
    <link rel="stylesheet" href="css/questionario.css" />
</head>

<body>
    
    <section class="cursos">
        <?php include 'top_menu_modelo.php'; ?>
        
        <div>
            <div><span>Escolha aqui as opções para seu curso</span></div>
        </div>
        <br>
        
        <!-- Opções Questionário -->
        <form data-abide action="Script/seleciona.php" method="post">
            <div class="row">
                <div class="large-12 columns">
                    <label>Curso baseado em :
                        <select name="baseado">
                            <option value="" selected="selected"></option>>
                            <option value="texto">Textos</option>
                            <option value="videoAula">Video Aula</option>
                            <option value="exemplo">Exemplos</option>
                            <option value="exercicioInterativo">Exercícios Interativos</option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="large-12 columns">
                    <label>Preço
                        <select name="preco">
                            <option value="" selected="selected"></option>>
                            <option value="gratis">Grátis</option>
                            <option value="ate30">Até 30 reais</option>
                            <option value="31a60">De 31 a 60 reais</option>
                            <option value="61a100">De 61 a 100 reais</option>
                            <option value="101a150">De 101 a 150 reais</option>
                            <option value="151mais">Mais de 151 reais</option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="large-12 columns">
                    <label>Dinâmica
                        <select name="dinamica">
                            <option value="" selected="selected"></option>>
                            <option value="cursoLivre">Curso Livre</option>
                            <option value="tempoDefinido">Tempo de Curso Definido</option>
                            <option value="inicioDefinido">Data de Início Definida</option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="large-12 columns">
                    <label>Plataforma
                        <select name="plataforma">
                            <option value="" selected="selected"></option>>
                            <option value="andOff">Android - Offline</option>
                            <option value="andOn">Android - Online</option>
                            <option value="iosOff">IOS - Offline</option>
                            <option value="iosOn">IOS - Online</option>
                            <option value="desktopOff">Desktop - Offline</option>
                            <option value="desktopOn">Desktop - Online</option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="large-12 columns">
                    <label>Extras
                        <select name="extra">
                            <option value="" selected="selected"></option>>
                            <option value="selecaoNivel">Seleção de Nível de conhecimento</option>
                            <option value="professor">Professor Disponível</option>
                            <option value="comunicacaoAlunos">Comunicação entre alunos</option>
                        </select>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="small-12 columns">
                    <button type="submit" class="button small">OK</button>
                </div>
            </div>
        </form>
        <!-- Fim Opções Questionário -->
        
        <!--    Javascript Files    -->
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
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
