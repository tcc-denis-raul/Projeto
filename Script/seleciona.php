<!--Seleciona os cursos conforme as resposta do questionario("pagina continuação de questionario.php")-->

<!--Informações básicas-->
<?php
if($_POST) { 
	print("teste");
	include "conexoes.php";
	print($_POST['size[]']);
	// session_start();
	// // //Campos do banco de dados: preencher conforme os campos da tabela questionario
	// //$Pago=$_SESSION['Pago'];
	// // $Gratis=$_SESSION['Gratuito']; 	
	// // $Adulto=$_SESSION['Adulto'];		
	// // $Crianca=$_SESSION['Criança'];
	// // $Portugues=$_SESSION['Português'];
	// // $Ingles=$_SESSION['Inglês'];
	// // $Movel=$_SESSION['Móvel'];
	// // $Desktop=$_SESSION['Desktop'];
	// // $CProfessor=$_SESSION['Com Professor'];
	// // $SProfessor=$_SESSION['Sem Professor'];
	// // $CWeb=$_SESSION['Com Web Conferência'];
	// // $SWeb=$_SESSION['Sem Web Conferência'];
	// // $CChat=$_SESSION['Com chat/forum'];
	// // $SChat=$_SESSION['Sem chat/forum'];
	// // $CCert=$_SESSION['Com Certificado'];
	// // $SCert=$_SESSION['Sem Certificado'];

	// print($Pago)

	// $sql = "SELECT * FROM cursos WHERE (pago = '$Pago' or gratis = '$Gratis') AND
	// 				   (adulto = '$Adulto' or crianca = '$Crianca') AND
	// 				   (portugues = '$Portugues' or ingles = '$Ingles') AND
	// 				   (movel = '$Movel' or desktop = '$Desktop')  AND 
	// 				   (comprofessor = '$CProfessor' or semprofessor = '$SProfessor') AND
	// 				   (comwebconf = '$CWeb' or semwebconf = '$SWeb') AND
	// 				   (comchatfor = '$CChat' or semchatfor = '$SChat' ) AND
	// 				   (comcertificado = '$CCert' or semcertificado = '$SCert') ORDER BY rate DESC LIMIT 7";
	// $resultado = pg_query($sql);
	// $qtd_linha = pg_num_rows($resultado);
} else {
	print("teste2");
}
	
?>
