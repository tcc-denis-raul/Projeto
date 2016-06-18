<?php
include_once "Script/courses_eval.php";
include_once "Script/select_course_bd.php";
session_start();
$get = new SelectCourseDB;
$courses = $get->getCourseFromDB();
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
            <?php include 'top_bar.php'; ?>    
            
            <section class="css_tabela">
                <table id="tabela" class="stripe row-border order-column" cellspacing="0" width="40%">
                    <thead>
                        <tr>
                            <th>Curso</th>
                            <th>Textos</th>
                            <th>Video aulas</th>
                            <th>Exemplos</th>
                            <th>Exercícios interativos</th>

                            <th>Preços</th>
                            
                            <th>Curso Livre</th>
                            <th>Tempo Definido</th>
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
                    </thead>
                    <tbody>
                    <?php foreach ($courses as $course => $ig) {
                        $inf = new CourseEval;
                        $result = $inf->CoursesEval($course);
                    ?>
                        <tr>
                            <th ><?=$result['nome'];?></th>
                            <th ><?=$result['texto'];?></th>
                            <th ><?=$result['videoAula'];?></th>
                            <th ><?=$result['exemplo'];?></th>
                            <th ><?=$result['exercicioInterativo'];?></th>

                            <th><?= $result['minPreco'] == $result['maxPreco'] ? "R$".$result['minPreco'].",00" : "R$" . $result['minPreco'] . ",00 - " ."R$" .$result['maxPreco'].",00";?></th>

                            <th ><?=$result['cursoLivre'];?></th>
                            <th ><?=$result['tempoDefinido'];?></t>
                            <th ><?=$result['inicioDefinido'];?></th>

                            <th ><?=$result['andOff'];?></th>
                            <th ><?=$result['andOn'];?></th>
                            <th ><?=$result['iosOff'];?></th>
                            <th ><?=$result['iosOn'];?></th>
                            <th ><?=$result['desktopOff'];?></th>
                            <th ><?=$result['desktopOn'];?></th>

                            <th ><?=$result['selecaoNivel'];?></th>
                            <th ><?=$result['professor'];?></th>
                            <th ><?=$result['comunicacaoAlunos'];?></th>
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

<?php include_once 'footer.php'; ?>
