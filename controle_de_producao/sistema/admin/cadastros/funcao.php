<?php
//verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";

$id       = " ";
$nome     = " ";

//$p =[1]  index.php (id-cadastro)
if (isset($p[2])) {
    //selecioar os dados  conforme o id
    $sql = "SELECT * FROM funcao WHERE id = ? limit 1";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(1, $p[2]);
    $consulta->execute();
    //recuperar dados
    $dados = $consulta->fetch(PDO::FETCH_OBJ);

    $id         = $dados->id;
    $nome       = $dados->nome;
}
?>
<div>
    <div class="card stacked-form">
        <div class="card-header pd-15-3-t">
            <h4 class="card-title">Cadastro de Função:</h4>
        </div>
        <div class="card-body pd-15">
            <form method="POST" action="salvar/funcao">
                <div class="form-group">
                    <label for="id">ID:</label>
                    <input type="text" class="form-control" name="id" readonly value="<?= $id; ?>">
                </div>
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" placeholder="Digite o nome da função:" class="form-control" maxlength="50" required name="nome_fc" value="<?= $nome; ?>" >
                </div>
        </div>
        <div class="card-footer pd-15">
            <button type="submit" class="btn btn-fill btn-info">Enviar</button>
            <button type="reset" class="btn btn-fill btn-danger">Cancelar</button>
        </div>
        </form>
    </div>
</div>