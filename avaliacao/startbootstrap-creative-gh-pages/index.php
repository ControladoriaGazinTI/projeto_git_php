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

  <!-- Masthead -->
  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="form-row">
        <pre>
        <?php
        require_once 'Usuario.php';
        require_once 'Resultado.php';
        $objeto = new Usuario;
        $objeto_resutado = new Resultado;
        $objeto_especialista = new Especialista;
        $objeto_tratamento = new Tratamento;
        if (isset($_POST["enviar"])) {
          $objeto->setNome($_POST["nome"]);
          $objeto->setDataNasc($_POST["data_nasc"]);
          $objeto->setSexo($_POST["sexo"]);
          $objeto->setCpf($_POST["cpf"]);
          $objeto->setAltura($_POST["altura"]);
          $objeto->setPeso($_POST["peso"]);
          $objeto->calcular();
          $objeto_resutado->setImc($objeto->getResultado());
          $objeto_resutado->setData($_POST["data_teste"]);
          $objeto_resutado->setIdUsuario($objeto);
          print_r($objeto_resutado);
        }
        $objeto_especialista->setNome("Dr.Felipe Henning Gaia Duarte");
        $objeto_especialista->setCidade("Umuarama");
        $objeto_especialista->setEstado("Paraná");
        $objeto_especialista->setRua("Pedro neto da silva");
        $objeto_especialista->setContato("(44)99756-4548");
        $objeto_especialista->setEmail("Felipe.henning@gmail.com");

        $objeto_tratamento->setIdEspecialista($objeto_especialista);
        $objeto_tratamento->setExercicio("natação em ritmo leve.");
        $objeto_tratamento->setAlimentacao("
               O segundo passo é começar uma dieta “rica em nutrientes”. Há pessoas que perdem mais de 50 quilos e não recuperam. Essa mudança na dieta é o fator mais importante de seu sucesso.

        Em termos muito simples, isso quer dizer comer grandes (quase ilimitadas) quantidades de certos vegetais, verduras, castanhas, sementes e outros alimentos vegetais. E isso envolve comer algumas frutas. Isso não quer dizer se tornar vegetariano ou vegano, mas quer dizer se tornar um “nutririano”. Uma pessoa nutririana é uma pessoa cuja preferência está em alimentos altamente nutritivos.
        
        A grande questão para a maioria das pessoas é “como eu faço isso?” A resposta é que é mais fácil do que você pensa, e há muitos atalhos que te levarão até lá. O atalho mais importante é se comprometer com essa direção. Sim, se você está em uma situação séria de saúde, muito acima do peso, você deve fazer essa mudança imediatamente.
        
        Mas se o risco maior é não fazer alguma coisa, comece devagar. Adicione um vegetal por dia à sua dieta. Se você gosta de bebidas e vitaminas, um pacote ou colher de vegetais em pó é um ótimo primeiro passo. Descobrimos que uma vez que uma pessoa começa a ter um gosto do sucesso usando essa abordagem, ela continua nesse caminho.
        
        ");
        $objeto_tratamento->setTipoTratamento(1);
        $objeto_tratamento->getMedicamento("dipirona");
        ?>
        </pre>
        <form method="post" class="form-group">
          <div  class="form-group">
            <label>Nome:</label>
            <input type="text" name="nome" class="form-control">
          </div>
          <div  class="form-group">
            <label>Data de nascimento:</label>
            <input type="date" name="data_nasc" class="form-control">
          </div>
          <div  class="form-group">
            <label>Data do teste:</label>
            <input type="date" name="data_teste" class="form-control">
          </div>
          <div class="form-group">
            <label>Sexo:</label>
            <select name="sexo" class="form-control">
              <option value="0"></option>
              <option value="1">Masculino</option>
              <option value="2">Feminino</option>
            </select>
          </div>
          <div class="form-group">
            <label>CPF:</label>
            <input type="text" name="cpf" onkeypress="$(this).mask('000.000.000-00')" class="form-control">
          </div>
          <div class="form-group">
            <label>Altura:</label>
            <input type="text" name="altura" class="form-control">
          </div>
          <div class="form-group">
            <label>Peso:</label>
            <input type="text" name="peso" class="form-control">
          </div>
          <div class="form-group">
            <label>Resultado IMC:</label>
            <input type="text" name="resultado" value="<?= $objeto->getResultado(); ?> " class="form-control">
          </div>
          <button name="enviar" type="submit" class="btn btn-success">Enviar</button>
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

  <!-- Portfolio Section -->
  <section id="portfolio">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/1.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/1.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Category
              </div>
              <div class="project-name">
                Project Name
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/2.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/2.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Category
              </div>
              <div class="project-name">
                Project Name
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/3.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/3.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Category
              </div>
              <div class="project-name">
                Project Name
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/4.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/4.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Category
              </div>
              <div class="project-name">
                Project Name
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/5.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/5.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                Category
              </div>
              <div class="project-name">
                Project Name
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="img/portfolio/fullsize/6.jpg">
            <img class="img-fluid" src="img/portfolio/thumbnails/6.jpg" alt="">
            <div class="portfolio-box-caption p-3">
              <div class="project-category text-white-50">
                Category
              </div>
              <div class="project-name">
                Project Name
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action Section -->
  <section class="page-section bg-dark text-white">
    <div class="container text-center">
      <h2 class="mb-4">Free Download at Start Bootstrap!</h2>
      <a class="btn btn-light btn-xl" href="https://startbootstrap.com/themes/creative/">Download Now!</a>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Let's Get In Touch!</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>+1 (202) 555-0149</div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <!-- Make sure to change the email address in anchor text AND the link below! -->
          <a class="d-block" href="mailto:contact@yourwebsite.com">contact@yourwebsite.com</a>
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