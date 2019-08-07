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

$sql = "SELECT * FROM produto";
$consulta = $pdo->prepare($sql);
$consulta->execute();
$teste1[] = "";
$teste[] = "";
foreach ($linha = $consulta->fetchall(PDO::FETCH_OBJ) as $key => $value) {
    //separar os dados 
    $teste[] = $value->qtde;
    $teste1[] = $value->nome;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>SCHq - Sistema de Controle de HQs</title>
    <meta charset="utf-8">

    <base href="http://<?= $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'] ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/icone.png">
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <!--  CSS files  -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <!-- summernote -->
    <link rel="stylesheet" type="text/css" href="css/summernote.css">
    <link rel="stylesheet" type="text/css" href="css/summernote-lite.css">
    <!-- dataTables -->
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
    


    
    

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

</body>
<!--   Core JS Files   -->
<script type="text/javascript" src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
<!-- Popper -->
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
<!--  Charts Plugin -->
<script type="text/javascript" src="assets/js/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script type="text/javascript" src="assets/js/bootstrap-notify.js"></script>
<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script type="text/javascript" src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script type="text/javascript" src="assets/js/demo.js"></script>
<!-- dataTables -->
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>

<!-- parsley -->
<script type="text/javascript" src="js/parsley.min.js"></script>
<!-- maskMoney -->
<script type="text/javascript" src="js/jquery.maskMoney.min.js"></script>
<!-- Gráficos -->
<script type="text/javascript" src="assets/js/chart.js"></script>
<!-- mascara cpf -->
<script type="text/javascript" src="js/jquery.mask.js"></script>
<!-- summernote -->
<script type="text/javascript" src="js/summernote.min.js"></script>
<script type="text/javascript" src="js/summernote-lite.js"></script>
<script type="text/javascript" src="lang/summernote-pt-BR.min.js"></script>
<script>
    $(document).ready(function() {
        $('.table').DataTable({
            "language": {
                "lengthMenu": "Exibir: _MENU_ registros",
                "zeroRecords": "Nada encontrado desculpe!!!",
                "info": "Páginação _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": "buscar"
            }
        });
    });
</script>
<script>
    function validaCpf(cpf) {
        $.get("validacpf.php", {
            cpf: cpf
        }, function(dados) {
            //testar
            //alert(dados);
            if (dados != 1) {
                //exibir mensagem
                alert(dados);
                //apagar o cpf
                $("#cpf".val(""));
            }
        })
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        //aplica a mascara de valor no campo
        $("#valor").maskMoney({
            thousands: ".",
            decimal: ","
        });
    })
</script>
<script type="text/javascript">
	$(document).ready(function() {
		//aplicar o summernote
		$("#descricao").summernote({
			height: 200,
            lang: 'pt-BR',
            theme: 'monokai'
		});
    })
</script>

</html>