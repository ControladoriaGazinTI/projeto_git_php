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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/summernote.min.css">
    <link rel="stylesheet" type="text/css" href="css/summernote-lite.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">

    <!--   Core JS Files   -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!--  Charts Plugin -->
    <script type="text/javascript" src="assets/js/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script type="text/javascript" src="assets/js/bootstrap-notify.js"></script>
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script type="text/javascript" src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script type="text/javascript" src="assets/js/demo.js"></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="js/summernote.min.js"></script>
    <script type="text/javascript" src="js/summernote-lite.js"></script>
    <script type="text/javascript" src="lang/summernote-pt-BR.min.js"></script>
    <script type="text/javascript" src="js/parsley.min.js"></script>
    <script type="text/javascript" src="js/jquery.maskMoney.min.js"></script>
    <script src="chart/chart.js@2.8.0"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'radar',

            // The data for our dataset
            data: {
                labels: ['<?php print_r(implode("','", $teste1)); ?>'],
                datasets: [{
                    label: 'QTDE',
                    pointBackgroundColor:'rgba(0, 0, 0, 10)',//altera cor do ponto de referencia
                    pointBorderColor:'rgba(0, 0, 0, 10)',//
                    backgroundColor: 'rgb(255, 200, 200)',
                    borderColor: 'rgb(255, 99, 132)',
                    pointStyle:'triangle',//altera o tipo do
                   
                    //lineTension: 0.0,//deixar linha sem curva
                    //borderDash: [23],//colocar traços na linha
                    data: [ <?php print_r(implode(",", $teste)); ?> ],

                }]
            },

            // Configuration options go here
            options: {
            }
        });
    </script>
</body>

</html>