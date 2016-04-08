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
    
        <section class="hero">
            <?php include 'top_menu_modelo.php'; ?>
            <!-- LOGIN -->
            <div class="row">
                <div class="medium-6 medium-centered large-4 large-centered columns">
                    <form method="post" action="Script/valida.php">
                        <div class="row column log-in-form">
                            <h4 class="text-left">Entrar com email e senha</h4>
                            <label>Email</label>
                            <input type="text" name="email" placeholder="exemplo@exemplo.com">
                            
                            <label>Senha</label>
                            <input type="password" name="senha" placeholder="Senha">
                            
                            <input type="submit" value="Entrar" class="button expand index"/>
                        
                            <p class="text-center"><a href="cadastrar.php">Não tem uma senha? Cadastre agora</a></p>   
                        </div>
                    </form>
                </div>
            </div>
        </section>

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