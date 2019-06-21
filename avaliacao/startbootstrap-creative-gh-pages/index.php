<?php
//iniciar a sessao
session_start();
//mostrar todos os erros
ini_set("display_error", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
//incluir  banco e funções
include "config/conexao.php";
require_once 'class/Tratamento.php';
require_once 'class/Resultado.php';
$resultado = new Resultado;
$tratamento = new Tratamento;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <base href="http://<?= $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'] ?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>IMC</title>

  <!-- Font Awesome Icons -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="css/creative.min.css" rel="stylesheet">


</head>

<body id="page-top">
  <?php
  $pagina = "paginas/home";
  if (isset($_GET["param"])) {
    $pagina = trim($_GET["param"]);
  }
  $p = explode("/", $pagina);
  //posiçao 0 é pasta
  //posição 1 é aquivo
  //posição 2 é id 
  $pasta      = $p[0];
  $arquivo     = $p[1];
  $pagina = "$pasta/$arquivo.php";
  //pagina .=".php";
  include "main.php";
  ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/creative.min.js"></script>
  <script src="jquery/jquery.mask.min.js"></script>
</body>

</html>