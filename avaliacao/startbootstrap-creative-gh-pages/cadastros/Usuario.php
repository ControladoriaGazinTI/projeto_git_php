<pre>
<?php

$tratamento = new Tratamento;
if (isset($_POST["enviaru"])) {
    $tratamento->setLoginEntrar($_POST["login"]);
    $tratamento->setSenhaEntrar($_POST["senha"]);
    $tratamento->login();
    print_r($tratamento);
}
?>
</pre>
<div class="card text-center">
    <div class="card-header">
        Especialista
    </div>
    <div class="card-body">
        <form method="post">
            <div class="form-group">
                <label>Login:</label>
                <input type="text" class="form-control " placeholder="Login" name="login">
            </div>
            <div class="form-group">
                <label>Senha:</label>
                <input type="password" class="form-control" placeholder="Senha" name="senha">
            </div>
            <button type="submit" class="btn btn-primary" name="enviaru">Entrar</button>
            <button class="btn btn-primary">
                <a href="cadastros/Registro" class="text-white">Regitrar</a>
            </button>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>