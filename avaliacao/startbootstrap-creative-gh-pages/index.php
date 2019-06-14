<pre>
  <?php
     require_once 'class/Usuario.php';
     require_once 'class/Resultado.php';
     $usuario = new Usuario;
     $resultado = new Resultado;
     if(isset($_POST["enviar"])){
     $resultado->setNome($_POST["nome"]);
     $resultado->setDataNasc($_POST["data_nasc"]);
     $resultado->setSexo($_POST["sexo"]);
     $resultado->setCpf($_POST["cpf"]);
     $resultado->setAltura($_POST["altura"]);
     $resultado->setPeso($_POST["peso"]);
     $resultado->salvarUsuario();
     $resultado->calcularImc();
     
     print_r($resultado);
    }
  ?>
  </pre>
<?php
	//iniciar a sessao
session_start();
//mostrar todos os erros
ini_set("display_error", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
//incluir  banco e funções
include "../config/conexao.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

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
            $pagina = "../paginas/home";
            if (isset($_GET["param"])) {
              $pagina = trim($_GET["param"]);
            }
            $p = explode("/", $pagina);
            //posiçao 0 é pasta
            //posição 1 é aquivo
            //posição 2 é id 
            $doisPontos = $p[0];
            $pasta      = $p[1];
            $aquivo     = $p[2];
            $pagina = "$doisPontos/$pasta/$aquivo.php";
            //pagina .=".php";
            include "main.php";
            ?>

</body>

</html>