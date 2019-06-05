<?php
    $connect =mysqli_connect(
        "localhost",
        "root",
        "",
        "banco_fabone"
    );
    //modificar o charset
    mysqli_set_charset($connect,"utf8");
    //difinir pagina com home
    $pag = "home";
    //recuperar parametro 
    if(isset ($_GET["parametro"])){
        $pag = trim ($_GET["parametro"]);
        //quebra um string a partir de um caracter 
        $p = explode("/",$pag);
        //print_r($p);
        //$p[0] - nome da pagina 
        //$p [1] - id do registro
        $pag = $p[0];
    }
    //verificar qual pagina  ira carregar 
    if($pag == "funcionario") $titulo ="Funcionários";
    elseif($pag == "funcao") $titulo = "Função";
    elseif($pag == "produto") $titulo = "Produtos";
    elseif($pag == "producao") $titulo = "Produção";
    elseif($pag == "cadastro") $titulo = "Cadastros";
    else($titulo =
     "Página Inicial");

?>
<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <base href="http://<?=$_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME']?>">
	<title>C.D.P - <?=$titulo;?></title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>
    <!--container-->
    <div class="wrapper">
        <!--começo da div class sidebar-->
        <div class="sidebar" data-color="purple"  data-image="assets/img/sidebar-2.jpg">
        <!--

            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag

        -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">
                        Controle de Produção
                    </a>
                </div>
                <ul class="nav">
                    <li class="active">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <i class="pe-7s-id"></i>
                            <span><b class="caret"></b></span>
                            <p>Cadastrar</p>
                        </a>
                    </li>
                    <div class="collapse" id="collapseExample">
                            <ul class="nav">
                                <li>
                                    <a class="profile-dropdown" href="form_cliente">
                                        <span class="sidebar-normal">Cadastrar cliente</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="profile-dropdown" href="form_funcionario">
                                        <span class="sidebar-normal">Cadastrar funcionario</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="profile-dropdown" href="form_funcao">
                                        <span class="sidebar-normal">Cadastrar Função</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="profile-dropdown" href="form_pedido">
                                        <span class="sidebar-normal">Cadastrar pedido</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="profile-dropdown" href="form_producao">
                                        <span class="sidebar-normal">Cadastrar produção</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="profile-dropdown" href="form_produto">
                                        <span class="sidebar-normal">Cadastrar produto</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="profile-dropdown" href="form_categoria">
                                        <span class="sidebar-normal">Cadastrar categoria de produto</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    <li>
                        <a href="#">
                            <i class="pe-7s-user"></i>
                            <p>Clientes</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="pe-7s-users"></i>
                            <p>Funcionários</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="pe-7s-news-paper"></i>
                            <p>Funções</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="pe-7s-hammer"></i>
                            <p>Produção</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="pe-7s-cart"></i>
                            <p>Produtos</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--fim da div class sidebar-->
        <!--começo do nav bar-->
        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">C.D.P</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                            <a href="">
                                Account
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        <!--fim do nav bar-->
             <!--começo div main-->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <?php
                            //configurar a pagina que ira carregar 
                            $pag = "paginas/".$pag.".php";
                            //verificar se a página existe 
                            if( file_exists($pag)){
                                include $pag;
                            }else {
                                include "erro.php";
                            }
                            ?>
                            
                    </div>
                </div>
            </div>
            <!--fim div main-->
            <!--começo do footer-->
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">Home</a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy; <script>document.write(new Date().getFullYear())</script>
                        <a href="#">C.D.P</a>, Todos os direiros reservados
                    </p>
                </div>
            </footer>
            <!--fim do footer-->
        </div>
        <!--fim do nav bar-->
    </div>
    <!--fim container-->
</body>
    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>
    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>
    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
</html>
