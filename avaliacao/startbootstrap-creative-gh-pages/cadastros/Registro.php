<?php

if (isset($_POST["enviarr"])) {
    $tratamento->setNome($_POST["nome"]);
    $tratamento->setCidade($_POST["cidade"]);
    $tratamento->setEstado($_POST["estado"]);
    $tratamento->setRua($_POST["rua"]);
    $tratamento->setContato($_POST["contato"]);
    $tratamento->setEmail($_POST["email"]);
    $tratamento->setLogin($_POST["login"]);
    $tratamento->setSenha($_POST["senha"]);
    $tratamento->salvarEspecialista();
}
?>
<div class="card text-center">
    <div class="card-header">
        Cadastrar Especialista
    </div>
    <div class="card-body">
        <form method="post">
            <div class="form-group">
                <label>Nome:</label>
                <input type="text" class="form-control " placeholder="Nome" name="nome" required>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Cidade:</label>
                    <input type="text" class="form-control " placeholder="Cidade" name="cidade" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Estado:</label>
                    <input type="text" class="form-control " placeholder="Estado" name="estado" required>
                </div>
            </div>
            <div class="form-group">
                <label>Rua:</label>
                <input type="text" class="form-control " placeholder="Rua" name="rua" required>
            </div>
            <div class="form-group">
                <label>Contato:</label>
                <input type="text" class="form-control " placeholder="Contato" name="contato" required onkeypress="$(this).mask('(00)00000-0000')">
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control " placeholder="E-mail" name="email" required>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label>Login:</label>
                    <input type="text" class="form-control " placeholder="login" name="login" required>
                </div>
                <div class="form-group col-sm-6">
                    <label>Senha:</label>
                    <input type="password" class="form-control" placeholder="Senha" name="senha" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="enviarr">Cadastrar</button>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>