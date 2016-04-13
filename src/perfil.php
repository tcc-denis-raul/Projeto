<?php 
session_start();
include_once "Script/bd.php";
$email = $_SESSION['email'];
$bd = new BD;
$usuario = $bd->findUsuario(array("email" => $email));
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
    </head>

    <body>
        <section class="hero2">
            <?php include 'top_menu_modelo.php'; ?>

            <div class="row" data-equalizer>
                <div class="medium-5 columns panel imagem" data-equalizer-watch>
                    <table>
                        <caption align="bottom"><a href="#" data-reveal-id="foto">Modificar foto</a></caption>
                        <tr>
                            <td><img src="<?=$usuario['foto'];?>"></td>
                        </tr> 
                    </table>
                    <div id="foto" class="reveal-modal tiny" data-reveal aria-labelledby="modalTitle">
                            <h2 id="modalTitle">Modificar foto</h2>
                            <p class="lead">selecione a imagem para enviar: </p>
                            <form action="Script/upload_img.php" method="post" enctype="multipart/form-data">
                                <input type="file" name="arquivo" id="arquivo" class="file-input">
                                <input type="submit" value="Upload Image" name="submit" class="button expand index">
                            </form>
                            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                        </div>
                </div>
                <div class="large-6 columns panel info" data-equalizer-watch>
                    <h4>Nome: 
                        <p><?=$usuario['nome'];?></p>
                    </h4>
                    <h4>Email: 
                        <p><?=$usuario['email'];?></p>
                    </h4>
                    <a href="editar.php" class="button tiny round index"><span>Editar informações</span></a>
                </div>            
            </div>
            <div class="row" data-equalizer>
                <div class="small-6 columns panel estatistica" data-equalizer-watch>
                    <h3>ESTATÍSTICAS DO USUÁRIO</h3>
                    <h4>Membro desde: 
                        <p><?=$usuario['criado'];?></p>
                    </h4>
                    <h4>
                        Último visita:
                        <p><?=$usuario['ultimo_acesso'] ? $usuario['ultimo_acesso'] : "-"; ?></p>
                    </h4>

                </div>
            </div>


        </section>
        

        <!--    Javascript Files    -->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/foundation.min.js"></script>
        <script>
            $(document).foundation();
        </script>
    </body>

</html>

<?php include 'rodape_modelo.php'; ?>
