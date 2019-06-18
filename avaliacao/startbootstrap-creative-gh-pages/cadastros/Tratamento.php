<?php

if (isset($_POST["enviart"])) {
    $tratamento->setExercicio($_POST["exercicio"]);
    $tratamento->setAlimentacao($_POST["alimentacao"]);
    $tratamento->setMedicamento($_POST["medicamento"]);
    $tratamento->setTipoTratamento($_POST["tipo_tratamento"]);
    $tratamento->setIdEspecialista($_SESSION["banco_avaliacao"]["id"]);
    $tratamento->salvarTratamento();
}
?>
<form method="post">
    <div class="form-group">
        <label>Tipo do tratamento:</label>
        <select name="tipo_tratamento" id="" class="form-control">
            <option value="1">A baixo do peso</option>
            <option value="2">Levemente acima do Peso</option>
            <option value="3">Obesidade grau I</option>
            <option value="4">Obesidade grau II (Severa)</option>
            <option value="5">Obesidade grau III (Morbida)</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">Exercicios</label>
        <textarea name="exercicio" id="" cols="20" rows="5" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="">Alimentação:</label>
        <textarea name="alimentacao" id="" cols="20" rows="5" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="">Medicamento:</label>
        <textarea name="medicamento" id="" cols="20" rows="5" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-success" name="enviart">Cadastrar</button>
</form>