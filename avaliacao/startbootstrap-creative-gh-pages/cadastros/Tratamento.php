<?php

if (isset($_POST["enviart"])) {
    $tratamento->setExercicio($_POST["exercicio"]);
    $tratamento->setAlimentacao($_POST["alimentacao"]);
    $tratamento->setMedicamento($_POST["medicamento"]);
    $tratamento->setTipoTratamento($_POST["tipo_tratamento"]);
    $tratamento->setIdEspecialista($_SESSION["banco_avaliacao"]["id"]);
    $tratamento->salvarTratamento();
    print_r($tratamento);
}
?>
<div class="container">
    <form method="post">
        <div class="form-group">
            <label>Tipo do tratamento:</label>
            <select name="tipo_tratamento" id="" class="form-control">
                <option value="0"></option>
                <option value="1">A baixo do peso</option>
                <option value="2">Peso ideal</option>
                <option value="3">Levemente acima do Peso</option>
                <option value="4">Obesidade grau I</option>
                <option value="5">Obesidade grau II (Severa)</option>
                <option value="6">Obesidade grau III (Morbida)</option>
            </select>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-4">
                <label for="">Exercicios</label>
                <textarea name="exercicio" id="" cols="20" rows="5" class="form-control"></textarea>
            </div>
            <div class=" form-group col-sm-4">
                <label for="">Alimentação:</label>
                <textarea name="alimentacao" id="" cols="20" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group col-sm-4">
                <label for="">Medicamento:</label>
                <textarea name="medicamento" id="" cols="20" rows="5" class="form-control"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="enviart">Cadastrar</button>
    </form>
</div>