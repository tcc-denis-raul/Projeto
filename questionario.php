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
        <div><span>Questionário:</span></div>
      </div>
      
      <!-- Define algumas váriaveis básicas e realiza busca no bd -->
      <?php 
        $sql = "SELECT * FROM questionario WHERE  id_idioma = 1";
        $resultado = pg_query($sql);
        $Count = 0;
      ?>
      
      <?php while($linha = pg_fetch_assoc($resultado)) { $Count++; ?>
        <form data-abide method="post" action="Script/seleciona.php"> 
          <div class="row">
            <div class="large-6 columns">
              <label><?=$Count?>. <?=$linha['pergunta']?></label>
              <input type="checkbox" name=<?=$linha['item1']?> value=<?=$linha['item1']?> id=<?=$linha['item1']?>><label><?=$linha['item1']?></label>
              <input type="checkbox" name=<?=$linha['item1']?> value=<?=$linha['item2']?> id=<?=$linha['item2']?>><label><?=$linha['item2']?></label>
            
            </div>
          </div>
      <?php } ?>
          <div class="row">
            <div class="small-12 columns">
              <button type="submit" class="button small">OK</button>
            </div>
          </div>
        </form>
       
      

    </section>
      
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

  </body>
</html>