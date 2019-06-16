<pre>
  <?php
    require_once 'class/Resultado.php';
    $resultado = new Resultado;
    if (isset($_POST["enviar"])) {
        $resultado->setNome($_POST["nome"]);
        $resultado->setDataNasc($_POST["data_nasc"]);
        $resultado->setSexo($_POST["sexo"]);
        $resultado->setCpf($_POST["cpf"]);
        $resultado->setAltura($_POST["altura"]);
        $resultado->setPeso($_POST["peso"]);
        $resultado->salvarUsuario();
        $resultado->calcularImc();

        print_r($resultado);
    }
    ?>
  </pre>
<form method="post">
    <div class="row">
        <div class="form-group col-6">
            <label>Nome:</label>
            <input type="text" name="nome" class="form-control">
        </div>
        <div class="form-group col-6">
            <label>Data de nascimento:</label>
            <input type="date" name="data_nasc" class="form-control">
        </div>
        <div class="form-group col-6">
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
            <input type="text" name="altura" class="form-control" required>
        </div>
        <div class="form-group col-4 ">
            <label>Peso:</label>
            <input type="text" name="peso" class="form-control" required>
        </div>
        <div class="form-group col-4">
            <label>Resultado IMC:</label>
            <input type="text" class="form-control">
        </div>
    </div>
    <button type="submit" name="enviar" class="btn btn-success ">Enviar</button>
</form>