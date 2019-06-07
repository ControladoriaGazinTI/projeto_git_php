<?php
	//iniciar a sessao
session_start();
//mostrar todos os erros
ini_set("display_error", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
//incluir  banco e funções
include "config/conexao.php";
include "config/funcoes.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>SCHq - Sistema de Controle de HQs</title>
    <meta charset="utf-8">

    <base href="http://<?= $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'] ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
    <link rel="shortcut icon" href="images/icone.png">
   
    <!--   Core JS Files   -->
    <script src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>

</head>

<body>
    <?php
		//verificar se esta logado
	if (!isset($_SESSION["banco_tcc"]["id"])) {
		//incluir o formulario
		include "paginas/login.php";
	} else {
		//ta logado
		$pagina = "paginas/home";
		if (isset($_GET["param"])) {
			$pagina = trim($_GET["param"]);
		}
		$p = explode("/", $pagina);
		//posiçao 0 é pasta
		//posição 1 é aquivo
		//posição 2 é id 
		$pasta = $p[0];
		$aquivo = $p[1];


		$pagina = "$pasta/$aquivo.php";
		//pagina .=".php";
		include "main.php";
	}
	?>
    </main>
    <script>
    $(document).ready(function() {
    $('.table').DataTable({
        "language": {
            "lengthMenu": "Exibir: _MENU_ registros",
            "zeroRecords": "Nada encontrado desculpe!!!",
            "info": "Páginação _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search":"buscar"
            }
        });
    } );
</script>
   
<script>
$(document).ready(function() {
    $('.table').DataTable();
} );
</script>
</body>

</html> 