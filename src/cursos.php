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
    <script src="js/tabela/jquery.min.js"></script>
    <script src="js/tabela/responsive-tables.js"></script>
</head>

<body>
    <section class="cursos">
      <header>
        <div class="row">


          <nav class="top-bar" data-topbar role="navigation">

            <!--    Start Logo    -->
            <ul class="title-area">
              <li class="name">
                <a href="index.html" class="logo">
                  <h1>paloma<span class="tld"> .com</span></h1>
                </a>
              </li>
                <span class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></span>
              </li>
            </ul>
            <!--    End Logo    -->

            <!--    Start Navigation Menu    -->
            <section class="top-bar-section" id="mean_nav">
              <ul class="right">
                <li class="has-dropdown">
                  <a>Cursos</a>
                  <ul class="dropdown">
                    <li><a href="cursos.php" id="curso">Ingles</a></li>
                  </ul>
                </li>
                <li><a href="login.html">Login</a></li>
              </ul>
            </section>
            <!--    End Navigation Menu    -->
          </nav>
        </div>
      </header>

      <!-- Titulo -->
      <!-- <div class="course-type">
        <div><span>Cursos de Ingles:</span></div>
      </div>

      <div>
        <?php foreach ($cursos as $curso) {?>
            <p><?=$curso['nome'];?></p>
        <?php }
?>
      </div> -->
      <div class="container">
        <div class="row">
            <div class="twelve columns">
                <hr />
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

    </section>
    <!-- container -->
    <div class="small-12 medium-8 large-8 columns">
          <div class="contact_details right">
            <nav class="social">
              <ul class="no-bullet">
                <li><a href="http://facebook.com/pixelhint" target="_blank">Facebook</a></li>
                <li><a href="http://instagram.com/pixelhint" target="_blank">Instagram</a></li>
                <li><a href="http://twitter.com/pixelhint" target="_blank">Twitter</a></li>
                <li><a href="http://plus.google.com/+Pixelhint" target="_blank">Google+</a></li>
              </ul>
            </nav>

            <div class="contact">
              <div class="details">
                <p>contact@pixelhint.com</p>
                <p>+1.323 596 5770</p>
              </div>

              <p class="adress">550 Hershell Hollow Road
              Johnson City, TN 37615</p>
            </div>
          </div>
        </div>

      </div>
    </footer>
    <!--  End Footer Section  -->

    <!--    Start Back To Top    -->
    <a href="#" class="btn_fancy" id="back_top">
      <div class="solid_layer"></div>
      <div class="border_layer"></div>
      <div class="text_layer"><img src="img/top_arrow.png" alt="Back to top" title="" class="top_arrow"></div>
    </a>
    <!--    End Back To Top    -->

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
