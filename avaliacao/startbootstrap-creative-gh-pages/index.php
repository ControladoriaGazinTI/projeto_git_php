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

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Inicio</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">sobre</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <?php
     require_once 'Usuario.php';
     $usuario = new Usuario;
     if(isset($_POST["enviar"])){
     $usuario->setNome($_POST["nome"]);
     $usuario->setDataNasc($_POST["data_nasc"]);
     $usuario->setSexo($_POST["sexo"]);
     $usuario->setCpf($_POST["cpf"]);
     $usuario->setAltura($_POST["altura"]);
     $usuario->setPeso($_POST["peso"]);
     $usuario->setResultado($_POST["resultado"]);
     $usuario->calcular();
     $usuario->salvarbanco();
     print_r($usuario);
    }
  ?>
  <!-- Masthead -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
      <form method="post">
              <div class="row">
                <div  class="form-group col-6">
                  <label>Nome:</label>
                  <input type="text" name="nome" class="form-control">
                </div>
                <div  class="form-group col-6">
                  <label>Data de nascimento:</label>
                  <input type="date" name="data_nasc" class="form-control">
                </div>
                <div  class="form-group col-6">
                  <label>Data do teste:</label>
                  <input type="date" name="data_teste" class="form-control">
                </div>
                <div class="form-group col-6">
                  <label>Sexo:</label>
                  <select name="sexo" class="form-control">
                    <option value="0"></option>
                    <option value="1">Masculino</option>
                    <option value="2">Feminino</option>
                  </select>
                </div>
                <div class="form-group col-12">
                  <label>CPF:</label>
                  <input type="text" name="cpf" class="form-control">
                </div>
                <div class="form-group col-4">
                  <label>Altura:</label>
                  <input type="text" name="altura" class="form-control" required >
                </div>
                <div class="form-group col-4 ">
                  <label>Peso:</label>
                  <input type="text" name="peso" class="form-control" required >
                </div>
                <div class="form-group col-4">
                  <label>Resultado IMC:</label>
                  <input type="text" name="resultado" class="form-control">
                </div>
              </div>
              <button  type="submit" name="enviar" class="btn btn-success ">Enviar</button>
           </form>
        </div>  
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section class="page-section bg-primary" id="about">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="text-white mt-0">We've got what you need!</h2>
          <hr class="divider light my-4">
          <p class="text-white-50 mb-4">Start Bootstrap has everything you need to get your new website up and running in no time! Choose one of our open source, free to download, and easy to use themes! No strings attached!</p>
          <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="page-section" id="services">
    <div class="container">
      <h2 class="text-center mt-0">At Your Service</h2>
      <hr class="divider my-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-gem text-primary mb-4"></i>
            <h3 class="h4 mb-2">Sturdy Themes</h3>
            <p class="text-muted mb-0">Our themes are updated regularly to keep them bug free!</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
            <h3 class="h4 mb-2">Up to Date</h3>
            <p class="text-muted mb-0">All dependencies are kept current to keep things fresh.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-globe text-primary mb-4"></i>
            <h3 class="h4 mb-2">Ready to Publish</h3>
            <p class="text-muted mb-0">You can use this design as is, or you can make changes!</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-4x fa-heart text-primary mb-4"></i>
            <h3 class="h4 mb-2">Made with Love</h3>
            <p class="text-muted mb-0">Is it really open source if it's not made with love?</p>
          </div>
        </div>
      </div>
    </div>

      </section>

  <!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - Start Bootstrap</div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/creative.min.js"></script>

</body>

</html>