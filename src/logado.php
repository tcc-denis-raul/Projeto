<?php
session_start();
if((!isset ($_SESSION['login']) == true)) { 
	unset($_SESSION['login']); 
	unset($_SESSION['senha']); 
	header('location:login.html'); 
}
$logado = $_SESSION['login']; 
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
    <section class="hero">
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
                        <span class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a>
                        </span>
                        </li>
                    </ul>
                    <!--    End Logo    -->
                    <!--    Start Navigation Menu    -->
                    <section class="top-bar-section" id="mean_nav">
                        <ul class="right">
                            <li><a href="#services">About Us</a></li>
                            <li class="has-dropdown">
                                <a>Cursos</a>
                                <ul class="dropdown">
                                    <li><a href="cursos.php" id="curso">Ingles</a></li>
                                </ul>
                            </li>
                            <li><a href="">Olá <?=$logado?></a></li>
                        </ul>
                    </section>
                    <!--    End Navigation Menu    -->
                </nav>
            </div>
        </header>
        <!--    Start Hero Caption    -->
        <section class="caption">
            <div class="row">
                <h1 class="mean_cap">Encontre o Curso</hA>
          <h2 class="sub_cap">Ideal para voce!</h2>
          <a href="questionario.html" class="btn_details"><span>Descubra rapidamente</span> <img src="img/btn_arrow.png" alt="" src="" class="arrow"></a>
        </div>
      </section>
      <!--    End Hero Caption    -->

    </section>
    <!--  End Hero Section  -->



    <!--  Start Services Section  -->
    <section class="services" id="services">

      <!--    Start Services Titles    -->
      <div class="row">
        <h1 class="mean_title">Com Paloma a dificuldade acabou</h1>
                <h2 class="sub_title">Descubra qual é o melhor curso para você</h2>
            </div>
            <!--    End Services Titles    -->
            <!--    Start Services List    -->
            <div class="row services_list">
                <div class="small-12 medium-3 large-3 columns">
                    <img src="img/icon2.png" alt="" title="" class="serv_icon" />
                    <h2 class="title">Personalizado</h2>
                    <p>O Paloma foi feito especialmente para você! Através de simples perguntas, conseguimos descobrir suas necessidades e adequar o melhor curso.</p>
                </div>
                <div class="small-12 medium-3 large-3 columns">
                    <img src="img/icon1.png" alt="" title="" class="serv_icon" />
                    <h2 class="title">Interativo</h2>
                    <p>Converse no nosso fórum, troque ideias e tire dúvidas. Sincronize com o facebook e veja o que seus amigos estão aprendendo.</p>
                </div>
                <div class="small-12 medium-3 large-3 columns">
                    <img src="img/icon3.png" alt="" title="" class="serv_icon" />
                    <h2 class="title">Integrado</h2>
                    <p>Não está aprendendo o quanto queria? Acha que seu curso poderia ter novas funcionalidade? O Paloma é o melhor lugar para expor suas críticas e sugestóes, por ser um ponto de encontro de TODOS os cursos da WEB</p>
                </div>
                <div class="small-12 medium-3 large-3 columns">
                    <img src="img/icon4.png" alt="" title="" class="serv_icon" />
                    <h2 class="title">Divertido</h2>
                    <p>Aprender se divertindo é a melhor coisa! Crie seu perfil de aluno e suba de níveis através de ações como sugerir um novo curso e ajudar algum outro aluno. Quanto mais ativo mais você sobe e pode virar até professor!</p>
                </div>
            </div>
            <!--    End Services List    -->
            <!--    Start Button    -->
            <div class="btn_holder">
                <a href="#" class="btn_fancy">
                    <div class="solid_layer"></div>
                    <div class="border_layer"></div>
                    <div class="text_layer">Cadastre-se</div>
                </a>
            </div>
            <!--    End Button    -->
        </section>
        <!--  End Services Section  -->
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
                            <p class="adress">550 Hershell Hollow Road Johnson City, TN 37615</p>
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
