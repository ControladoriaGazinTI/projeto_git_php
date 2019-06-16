   <pre>
   <?php
    require_once 'class/Tratamento.php';
    $tratamento = new Tratamento;
    if (isset($_POST["enviar"])) {
        $tratamento->setNome($_POST["nome"]);
        $tratamento->setCidade($_POST["cidade"]);
        $tratamento->setEstado($_POST["estado"]);
        $tratamento->setRua($_POST["rua"]);
        $tratamento->setContato($_POST["contato"]);
        $tratamento->setEmail($_POST["email"]);
        $tratamento->setLogin($_POST["login"]);
        $tratamento->setSenha($_POST["senha"]);
        $tratamento->salvarEspecialista();
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
                    <label>Nome:</label>
                    <input type="text" class="form-control " placeholder="Nome" name="nome" required>
                </div>
                <div class="form-group">
                    <label>Cidade:</label>
                    <input type="text" class="form-control " placeholder="Cidade" name="cidade" required>
                </div>
                <div class="form-group">
                    <label>Estado:</label>
                    <input type="text" class="form-control " placeholder="Estado" name="estado" required>
                </div>
                <div class="form-group">
                    <label>Rua:</label>
                    <input type="text" class="form-control " placeholder="Rua" name="rua" required>
                </div>
                <div class="form-group">
                    <label>Contato:</label>
                    <input type="text" class="form-control " placeholder="Contato" name="contato" required>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" class="form-control " placeholder="E-mail" name="email" required>
                </div>
                <div class="form-group">
                    <label>Login:</label>
                    <input type="text" class="form-control " placeholder="login" name="login" required>
                </div>
                <div class="form-group">
                    <label>Senha:</label>
                    <input type="password" class="form-control" placeholder="Senha" name="senha" required>
                </div>
                <button type="submit" class="btn btn-success" name="enviar">Cadastrar</button>
            </form>
        </div>
        <div class="card-footer text-muted">
        </div>
    </div>