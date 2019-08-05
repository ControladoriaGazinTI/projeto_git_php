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

<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="#">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>

<!--divbody-->