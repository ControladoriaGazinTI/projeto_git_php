<?php
if (!isset($pagina)) {
    header("location: index.php");
}
?>
<!--container-->
<div class="wrapper">
    <!--começo da div class sidebar-->
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-4.jpg">
        <!--

            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag

        -->
        <div class="sidebar-wrapper ">
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
                            <a class="profile-dropdown" href="cadastros/cliente">
                                <span class="sidebar-normal">Cliente</span>
                            </a>
                        </li>
                        <li>
                            <a class="profile-dropdown" href="cadastros/funcionario">
                                <span class="sidebar-normal">Funcionario</span>
                            </a>
                        </li>
                        <li>
                            <a class="profile-dropdown" href="cadastros/funcao">
                                <span class="sidebar-normal">Função</span>
                            </a>
                        </li>
                        <li>
                            <a class="profile-dropdown" href="cadastros/peca">
                                <span class="sidebar-normal">Peças</span>
                            </a>
                        </li>
                        <li>
                            <a class="profile-dropdown" href="cadastros/produto">
                                <span class="sidebar-normal">Produto</span>
                            </a>
                        </li>
                        <li>
                            <a class="profile-dropdown" href="cadastros/categoria">
                                <span class="sidebar-normal">Categoria de produto</span>
                            </a>
                        </li>
                        <li>
                            <a class="profile-dropdown" href="cadastros/pedido">
                                <span class="sidebar-normal">Pedido</span>
                            </a>
                        </li>
                        <li>
                            <a class="profile-dropdown" href="cadastros/producao">
                                <span class="sidebar-normal">Produção de produto</span>
                            </a>
                        </li>
                        <li>
                            <a class="profile-dropdown" href="cadastros/producaoPeca">
                                <span class="sidebar-normal">Produção de Peças</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <li>
                    <a href="listar/categoria">
                        <i class="pe-7s-cart"></i>
                        <p>Categorias de produtos</p>
                    </a>
                </li>
                <li>
                    <a href="listar/cliente">
                        <i class="pe-7s-user"></i>
                        <p>Clientes</p>
                    </a>
                </li>
                <li>
                    <a href="listar/funcionario">
                        <i class="pe-7s-users"></i>
                        <p>Funcionários</p>
                    </a>
                </li>
                <li>
                    <a href="listar/funcao">
                        <i class="pe-7s-news-paper"></i>
                        <p>Funções</p>
                    </a>
                </li>
                <li>
                    <a href="listar/produto">
                        <i class="pe-7s-cart"></i>
                        <p>Produtos</p>
                    </a>
                </li>
                <li>
                    <a href="listar/peca">
                        <i class="pe-7s-cart"></i>
                        <p>Peças</p>
                    </a>
                </li>
                <li>
                    <a href="listar/pedido">
                        <i class="pe-7s-cart"></i>
                        <p>Pedidos a Serem feitos</p>
                    </a>
                </li>
                <li>
                    <a href="listar/producao">
                        <i class="fas fa-bicycle"></i>
                        <p>Produção a serem feitas</p>
                    </a>
                </li>
                <li>
                    <a href="listar/producaoPeca">
                        <i class="pe-7s-cart"></i>
                        <p>Produção de peças a serem feitas</p>
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
                <div class="navbar navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <p>
                                        <?= print_r("bem vindo!!!".$_SESSION["banco_tcc"]["login"]);?>
                                    </p>
                                </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="sair.php">Sair</a></li>
                            </ul>
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

                    if (file_exists($pagina)) include $pagina;
                    else include "paginas/erro.php";

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
                    &copy; <script>
                        document.write(new Date().getFullYear())
                    </script>
                    <a href="#">C.D.P</a>, Todos os direiros reservados
                </p>
            </div>
        </footer>
        <!--fim do footer-->
    </div>
    <!--fim do nav bar-->
</div>
<!--fim container--> 