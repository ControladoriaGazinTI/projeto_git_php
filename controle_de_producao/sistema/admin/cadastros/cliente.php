<?php
 //verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";

$id     = "";
$cpf    = "";
$nome   = "";
$cnpj   = "";

//$p =[1]  index.php (id-cadastro)
if (isset($p[2])) {
    //selecioar os dados  conforme o id
    $sql = "SELECT * FROM cliente WHERE idcliente = ? limit 1";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(1, $p[2]);
    $consulta->execute();
    //recuperar dados
    $dados = $consulta->fetch(PDO::FETCH_OBJ);

    $id      = $dados->idcliente;
    $cpf     = $dados->cpf;
    $cnpj    = $dados->cnpj;
    $nome    = $dados->nome_cli;
}
?>

<div>
    <div class="card stacked-form">
        <div class="card-header pd-15-3-t">
            <h4 class="card-title">Cadastro do Cliente:</h4>
        </div>
        <div class="card-body pd-15">
            <form method="POST" action="salvar/cliente">
                <div class="form-group">
                    <label for="id">ID:</label>
                    <input type="text" class="form-control" name="id" readonly value="<?= $id; ?>">
                </div>
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" placeholder="Digite o nome do cliente:" class="form-control" maxlength="100" required="" name="nome_cli" value="<?= $nome; ?>">
                </div>
                <div class="form-group">
                    <label>CPF:</label>
                    <input type="text" placeholder="Digite o CPF:" class="form-control" maxlength="14" name="cpf" value="<?= $cpf; ?>">
                </div>
                <div class="form-group">
                    <label for="id">CNPJ:</label>
                    <input type="text" placeholder="Digite o CNPJ:" class="form-control" maxlength="18" name="cnpj" value="<?= $cnpj; ?>">
                </div>
        </div>
        <div class="card-footer pd-15">
            <button type="submit" class="btn btn-fill btn-info">Enviar</button>
            <button type="reset" class="btn btn-fill btn-danger">Cancelar</button>
        </div>
        </form>
    </div> 
</div>