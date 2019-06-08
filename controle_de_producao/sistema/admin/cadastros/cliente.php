<?php
 //verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";

$id       = "";
$cpf      = "";
$nome     = "";
$cnpj     = "";
$telefone = "";
$telefone2 = "";

//$p =[1]  index.php (id-cadastro)
if (isset($p[2])) {
    //selecioar os dados  conforme o id
    $sql = "SELECT * FROM cliente WHERE id = ? limit 1";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(1, $p[2]);
    $consulta->execute();
    //recuperar dados
    $dados = $consulta->fetch(PDO::FETCH_OBJ);

    $id       = $dados->id;
    $cpf      = $dados->cpf;
    $cnpj     = $dados->cnpj;
    $nome     = $dados->nome;
    $telefone = $dados->telefone;
    $telefone2 = $dados->telefone2;
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
                    <input 
                        type        = "text" 
                        name        = "id" 
                        class       = "form-control" 
                        readonly    = ""
                        value       = "<?= $id; ?>"
                    >
                </div>
                <div class="form-group">
                    <label>Nome:</label>
                    <input 
                        type            = "text" 
                        name            = "nome" 
                        class           = "form-control" 
                        placeholder     = "Digite o nome do cliente:" 
                        maxlength       = "100" 
                        required        = "" 
                        value           = "<?= $nome; ?>"
                    >
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>CPF:</label>
                        <input 
                            type            = "text" 
                            name            = "cpf" 
                            class           = "form-control" 
                            placeholder     = "Digite o CPF:" 
                            maxlength       = "14" 
                            value           = " <?= $cpf; ?>"
                            onkeypress      = "$(this).mask('000.000.000-00')"
                            onblur          = "validaCpf(this.value)"
                        >
                    </div>
                    <div class="form-group col-md-6">
                        <label>CNPJ:</label>
                        <input 
                            type            = "text" 
                            name            = "cnpj" 
                            class           = "form-control" 
                            placeholder     = "Digite o CNPJ:" 
                            maxlength       = "18" 
                            value           = "<?= $cnpj; ?>"
                            onkeypress      ="$(this).mask('00.000.000/0000-00')"

                        >
                    </div>
                </div>
                <h5>Contatos</h5>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Telefone:</label>
                        <input 
                            type            = "text" 
                            name            = "telefone"
                            class           = "form-control" 
                            placeholder     = "digite o telefone:" 
                            maxlength       = "14" 
                            value           = "<?= $telefone; ?>"
                            onkeypress      ="$(this).mask('(00)00000-0000')"
                        >
                    </div>
                    <div class="form-group col-md-6">
                        <label>Telefone 2:</label>
                        <input 
                            type            = "text" 
                            name            = "telefone2" 
                            class           = "form-control" 
                            placeholder     = "digite o telefone:" 
                            maxlength       = 14 
                            value           = "<?= $telefone2; ?>"
                            onkeypress      ="$(this).mask('(00)00000-0000')"
                        >
                    </div>
                </div>
         </div>
        <div class="card-footer pd-15">
            <button type="submit" class="btn btn-fill btn-info">Enviar</button>
            <button type="reset" class="btn btn-fill btn-danger">Cancelar</button>
        </div>
        </form>
    </div> 
</div>