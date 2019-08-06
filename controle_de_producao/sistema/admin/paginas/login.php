<?php
//verificar se foi dado um $_POST
if ($_POST) {

    if (isset($_POST["login"]))
        $login = trim($_POST["login"]);
    if (isset($_POST["senha"])) {
        $senha = trim($_POST["senha"]);
    }
    //verificar se o longin esta em branco
    print_r($login, $senha);

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
            if (!password_verify($senha, $dados->senha)) {
                $msg = "Senha invalida!!!";
                mensagem($msg);
            } else {
                $_SESSION["banco_tcc"] = array(
                    "id" => $dados->id,
                    "login" => $dados->login,
                );
            }
        } else {
            //se nao trouxe resultado
            $msg = "Usuário inexistente ou desativado";
            mensagem($msg);
        }
        //redirecionar a tela para home
        echo "<script>location.href='paginas/home'</script>";
    }
}
?>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form>
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
      <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>


<!--divbody-->