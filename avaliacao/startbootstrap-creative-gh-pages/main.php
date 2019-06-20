<?php
if (!isset($pagina)) {
  header("location: index.php");
}
?>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="#page-top">Início</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto my-2 my-lg-0">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="cadastros/Usuario">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#about">Importância do software</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#teste">Proposta de inovação</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Masthead -->
<header class="masthead">
  <div class="container h-100">
    <div class="row h-100 align-items-center justify-content-center text-center">
      <?php
      if (file_exists($pagina)) include $pagina;
      else include "paginas/erro.php";
      ?>
    </div>
  </div>
  </div>
</header>

<!-- About Section -->
<section class="page-section bg-primary text-justify text-white" id="about">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8  text-justify">
        <h2 class="text-black mt-0 text-center">IMPORTÂNCIA DO SOFTWARE</h2>
        <hr class="divider light my-4">
        <p class="text-black mb-4">A cada dia que passa mais pessoas se mantêm conectadas à internet através de computadores, smartphones ou tablets e a tendência é que esse número cresça ainda mais com o acesso mais facilitado a esses equipamentos. Pesquisas mostram que o número já ultrapassa 40% da população mundial.</p>
        <p class="text-black mb-4">Com esses dados é impossível ignorar a utilização desse equipamento no dia-a-dia ,ele vai facilitar o usuario encontrar um tratamento e um especialista para cada tipo de resultado dado no sistema.</p>
        <div class="text-center">
              <a class="btn btn-light btn-xl js-scroll-trigger m-3" href="https://diariodoporto.com.br/conheca-a-lei-de-inovacao-que-regulamenta-empresas-criativas-no-rio/">Leis de Inovação</a>
              <a class="btn btn-light btn-xl js-scroll-trigger" href="https://www.significados.com.br/inovacao/">Conceitos de Inovação</a>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="page-section bg-white" id="teste">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 text-justify">
        <h2 class=" text-black mt-0 text-center">DESCRIÇÃO DA PROPOSTA DE INOVAÇÃO</h2>
        <hr class="divider light my-4">
        <p class="text-black mb-4 "> Nossa proposta de inovação sobre o cálculo do IMC (Índice de massa corporal), é desenvolver um site onde as pessoas fazem um pré-cadastro do seu nome, sexo, idade, altura e peso. Onde apos esse pré-cadastro ela ja tem o seu IMC calculado e consegue verificar a descrição do seu IMC, como exemplo se está abaixo do peso, peso ideal, levemente acima do peso, obesidade grau I, obesidade grau II e obesidade morbida.</p>
        <p class="text-black mb-4"> Apos esses passos, ela tem uma aba “Procurar um especialista”, onde a pessoa pode facilmente identificar o melhor especialista para o seu caso, e ganhar um cupom de desconto por usar o site para calcular seu IMC.</p>
        <p class="text-black mb-4"> A proposta de inovar e empreender, é fazer convenio com especialista nutricional, onde a pessoa que marcar a consulta com o especialista gere uma porcentagem de lucro para nós desenvolvedor do site e da inovação, e para o cliente um cupom de desconto, onde o especialista vai ter mais clientes indicados pelo site, e onde mais clientes vão procurar o site pelo fato de calcular o IMC e indicar o especialista com um cupom de desconto.</p>
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