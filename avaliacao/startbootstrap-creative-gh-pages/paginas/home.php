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
        $resultado->calcularImc();
        $resultado->salvarUsuario();
        $resultado->select();
        $resultado->salvarTratamento_resultado();
        $resultado->listar();
    }
    ?>
  <div class="card text-center">
      <div class="card-header">
          Calcule seu IMC
      </div>
      <div class="card-body">
          <form method="post">
              <div class="row">
                  <div class="form-group col-6">
                      <label>Nome:</label>
                      <input type="text" name="nome" placeholder="Digite seu nome:" class="form-control" required>
                  </div>
                  <div class="form-group col-6">
                      <label>Data de nascimento:</label>
                      <input type="date" name="data_nasc" class="form-control" required>
                  </div>
              </div>
              <div class="form-group ">
                  <label>Sexo:</label>
                  <select name="sexo" class="form-control" required>
                      <option value="0"></option>
                      <option value="1">Masculino</option>
                      <option value="2">Feminino</option>
                  </select>
              </div>
              <div class="form-group">
                  <label>CPF:</label>
                  <input type="text" name="cpf" class="form-control" placeholder="Ex:000.000.000-00" required onkeypress="$(this).mask('000.000.000-00')">
              </div>
              <div class="row">
                  <div class="form-group col-6">
                      <label>Altura:</label>
                      <input type="text" name="altura" class="form-control" placeholder="Ex:1.75" required onkeypress="$(this).mask('0.00')">
                  </div>
                  <div class="form-group col-6">
                      <label>Peso:</label>
                      <input type="text" class="form-control" name="peso" placeholder="Ex:72.5" onkeypress="$(this).mask('000.00')">
                  </div>
              </div>
              <button type="submit" name="enviar" class="btn btn-primary " href="#navbarResponsive">Enviar</button>
          </form>
      </div>
      <div class="card-footer text-muted">
      </div>
  </div>