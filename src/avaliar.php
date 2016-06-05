<?php
include_once "Script/informacoes.php";
include_once "Script/seleciona_bd.php";
session_start();
$get = new MAIN;
$top_cursos = $get->getCursosBd();
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
        <link rel="stylesheet" type="text/css" href="css/tabela/dataTables.foundation.css">
        <link rel="stylesheet" href="css/main.css" />
    </head>

    <body>
        <section class="hero">
            <?php include 'top_menu_modelo.php'; ?>    
            
            <section class="css_tabela">
                <table id="tabela" class="stripe row-border order-column" cellspacing="0" width="40%">
                    <thead>
                        <tr>
                            <th>Curso</th>
                            <th>Textos</th>
                            <th>Video aulas</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($top_cursos as $curso => $ig) {
                        $inf = new Informacoes;
                        $resultado = $inf->getDados($curso);
                    ?>
                        <tr>
                            <th ><?=$resultado['nome'];?></th>
                            <th >
                                <form method="post" action="Script/like.php" >  
                                    <input type="hidden" value="<?=$resultado['nome']?>" name="enviardados" value="" />
                                    <input type="submit" value="Like" class="button expand index" />
                                </form>
                            </th>
                            <th >
                                <form method="post" action="Script/deslike.php" >  
                                    <input type="hidden" id="<?=$resultado['nome']?>" name="enviardados" value="" />
                                    <input type="submit" value="Unlike" class="button expand index" />
                                </form>
                            </th>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </section>
        </section>

        <!--    Javascript Files    -->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/foundation.min.js"></script>
        <script type="text/javascript" src="js/tabela/jquery.dataTables.js"></script>
        <script type="text/javascript" src="js/tabela/dataTables.foundation.js"></script>
        <script type="text/javascript" language="javascript" class="init">
            $(document).ready(function() {
                $('#tabela').DataTable({
                    "scrollX": true,
                    "responsive": true,
                    "info":     false,
                    "searching": false,
                    "paging": false,
                    "ordering": false,
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ cursos por página",
                        "zeroRecords": "Nada encontrado - desculpe",
                        "paginate": {
                             "previous": "Anterior",
                             "next": "Próximo"
                        },
                    }
                });
            });
        </script>
        <script type="text/javascript" src="js/main.js"></script>

    </body>
</html>

<?php include_once 'rodape_modelo.php'; ?>
