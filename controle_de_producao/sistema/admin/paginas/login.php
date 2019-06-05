<?php
//verificar se foi dado um $_POST
if ($_POST) {

    if (isset($_POST["login"]))
        $login = trim($_POST["login"]);
    if (isset($_POST["senha"]))
        $senha = trim($_POST["senha"]);
    //verificar se o longin esta em branco
    print_r($login,$senha);
    
    if (empty($login)) {
        $msg = "Preencha o login:";
        menssagem($msg);
        //verificar se a senha esta em branco
    } else if (empty($senha)) {
        menssagem("preencha o senha:");
    } else {
        //login e a senha foram preenchidos
        //buscar o usuario em banco
        $sql = "SELECT id, nome ,login , senha
                from funcionario
                where login = ? 
                limit 1";
        //preparar o sql para execução
        $consulta = $pdo->prepare($sql);
        //passar o parametro
        $consulta->bindParam(1, $login);
        //executar
        $consulta->execute();
        //recuperar os dados da cunsulta

        $dados = $consulta->fetch(PDO::FETCH_OBJ);

        if (isset($dados->id)) {
            //verifica se trouxe algum resultado
            if ($senha != $dados->senha) {
                $msg = "Senha invalida!!!";
                menssagem($msg);
            } else {
                $_SESSION["banco_tcc"] = array(
                    "id" => $dados->id,
                    "login" => $dados->login
                );
            }
        } else {
            //se nao trouxe resultado
            $msg = "Usuário inexistente ou desativado";
            menssagem($msg);
        }
        //redirecionar a tela para home
        echo "<script>location.href='paginas/home'</script>";
    }
}
?>
<div class="full-page">
    <div class="content">
        <div class="container">
            <div class=" col-md-4 login">
                <form class="form" name="formLogin" method="post">
                    <div class="card card-login">
                        <div class="card-header ">
                            <h3 class="header text-center">Login</h3>
                        </div>
                        <div class="card-body pd-15">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input class="form-control" type="text" name="login" class="input" placeholder="preencha o login" required data-parsley-required-message="<i class='fas fa-info-circle'></i>Por favor preencha este campo">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" class="input" name="senha" placeholder="Digite sua senha" required data-parsley-required-message="<i class='fas fa-info-circle'></i>Por favor preencha este campo">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer pd-15">
                            <button type="submit" class="btn btn-warning btn-wd">Login</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
</div> 