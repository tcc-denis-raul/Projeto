<!-- Lista todos os cursos presente no banco de dados -->

<!-- Conectar ao banco de dados-->
<?php
  include "Script/Conectar.php";
?>

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

    <!--    Javascript files are placed before </body>    -->
  </head>

  <body>
    <!--  Start Hero Section  -->
    <section class="cursos">
      <header>
        <div class="row">


          <nav class="top-bar" data-topbar role="navigation">

            <!--    Start Logo    -->
            <ul class="title-area">
              <li class="name">
                <a href="#" class="logo">
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
                <li><a href="#connect">Login</a></li>
              </ul>
            </section>
            <!--    End Navigation Menu    -->
          </nav>
        </div>
      </header>

      <!-- Titulo -->
      <div>
        <div><span>Escolha aqui as opções para seu curso</span></div>
      </div>
      <br>
      <!-- End Titulo -->

      <!-- Opções Questionário -->
      <form>
        <div class="row">
          <div class="large-12 columns">
            <label>Curso baseado em :
              <select>
                <option value="husker">Texto</option>
                <option value="starbuck">Video Aula</option>
                <option value="hotdog">Exemplos</option>
                <option value="apollo">Exercícios Interativos</option>
              </select>
            </label>
          </div>
        </div>
        <div class="row">
          <div class="large-12 columns">
            <label>Preço
              <select>
                <option value="husker">Grátis</option>
                <option value="starbuck">Até 30 reais</option>
                <option value="hotdog">De 31 a 60 reais</option>
                <option value="apollo">De 61 a 100 reais</option>
                <option value="apollo">De 101 a 150 reais</option>
                <option value="apollo">Mais de 151 reais</option>
              </select>
            </label>
          </div>
        </div>
        <div class="row">
          <div class="large-12 columns">
            <label>Dinâmica
              <select>
                <option value="husker">Curso Livre</option>
                <option value="starbuck">Tempo de Curso Definido</option>
                <option value="hotdog">Data de Início Definida</option>
              </select>
            </label>
          </div>
        </div>
        <div class="row">
          <div class="large-12 columns">
            <label>Plataforma
              <select>
                <option value="husker">Android - Offline</option>
                <option value="starbuck">Android - Online</option>
                <option value="hotdog">IOS - Offline</option>
                <option value="apollo">IOS - Online</option>
                <option value="apollo">Desktop</option>
              </select>
            </label>
          </div>
        </div>
        <div class="row">
          <div class="large-12 columns">
            <label>Extras
              <select>
                <option value="husker">Seleção de Nível de conhecimento</option>
                <option value="starbuck">Professor Disponível</option>
                <option value="hotdog">Comunicação entre alunos</option>
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

      <!--  Start Footer Section  -->
      <footer>
        <div class="row">

          <!--    Start Copyrights    -->
          <div class="small-12 medium-4 large-4 columns">
            <div class="copyrights">
              <a class="logo" href="#">
                <h1>paloma<span class="tld"> .com</span></h1>
              </a>
              <p>Copyright © 20014-2015 pixelhint.</p>
            </div>
          </div>
          <!--    End Copyrights    -->


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
      <script type="text/javascript" src="js/carouFredSel.js"></script>
      <script type="text/javascript" src="js/scrollTo.js"></script>
      <script type="text/javascript" src="js/map.js"></script>
      <script type="text/javascript" src="js/main.js"></script>
      <!--  End Javascript Files    -->

  </body>
</html>
