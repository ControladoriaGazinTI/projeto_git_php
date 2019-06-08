<?php
 //verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";
  
    $id       = ""; 
    $nome     = "";
    $data_nasc= "";
    $cpf      = "";
    $carteira = "";
    $telefone = "";
    $cidade   = "";
    $bairro   = "";
    $rua      = "";
    $numero   = "";
    $login    = "";
    $senha    = "";
    $email    = "";
    $idfuncao = "";
    $nome_fun = "";
//$p =[1]  index.php (id-cadastro)
if (isset($p[2])) {
    //selecioar os dados  conforme o id
    $sql =
               "SELECT funcionario.* , funcao.nome as nome_fun 
               FROM funcionario
               INNER JOIN funcao ON funcao.id =  funcionario.idfuncao
               WHERE funcionario.id = ? LIMIT 1 ";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(1, $p[2]);
    $consulta->execute();
    //recuperar dados
    $dados = $consulta->fetch(PDO::FETCH_OBJ);

    $id       = $dados->id; 
    $nome     = $dados->nome;
    $data_nasc= $dados->data_nasc;
    $cpf      = $dados->cpf;
    $carteira = $dados->carteira;
    $telefone = $dados->telefone;
    $cidade   = $dados->cidade;
    $bairro   = $dados->bairro;
    $rua      = $dados->rua;
    $numero   = $dados->numero;
    $login    = $dados->login;
    $senha    = $dados->senha;
    $email    = $dados->email;
    $idfuncao = $dados->idfuncao;
    $nome_fun = $dados->nome_fun;

}
?>
<div>
    <div class="card stacked-form">
        <div class="card-header pd-15-3-t">
            <h4 class="card-title">Cadastro do Funcionário:</h4>
        </div>
        <div class="card-body pd-15">
            <h5>Infomações sobre o funcionario:</h5>
            <form method="POST" action="salvar/funcionario">
                <div class="form-group ">
                    <label>ID:</label>
                    <input 
                        type        = "text" 
                        name        = "id" 
                        class       = "form-control" 
                        value       = "<?= $id; ?>"
                        readonly 
                    >
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Nome:</label>
                        <input 
                            type            = "text" 
                            name            = "nome" 
                            class           = "form-control" 
                            maxlength       = "100" 
                            placeholder     = "Digite o nome do Funcionario:" 
                            value           = "<?= $nome; ?>"
                            required        = "" 
                        >
                    </div>
                    <div class="form-group col-md-6">
                        <label>Data de nascimento:</label>
                        <input 
                            type            ="date" 
                            name            ="data"
                            class           ="form-control"
                            value           ="<?= $data_nasc; ?>"
                            require 
                            value           ="<?= $data_nasc ?>"
                        >
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>CPF:</label>
                        <input 
                            type            = "text" 
                            name            = "cpf" 
                            class           = "form-control" 
                            maxlength       = "14"
                            placeholder     = "Ex:000.000.000-00" 
                            require 
                            value           = "<?= $cpf; ?>"
                            onkeypress      = "$(this).mask('000.000.000-00')"
                            onblur          = "validaCpf(this.value)"
                        >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Numero da PIS/PASEP</label>
                        <input 
                            type            ="text" 
                            name            ="carteira" 
                            class           ="form-control" 
                            maxlength       ="14" 
                            placeholder     ="EX:000.00000.00-0" 
                            onkeypress      ="$(this).mask('000.00000.00-0')"
                            value           ="<?= $carteira; ?>"
                            require 
                        >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Telefone:</label>
                        <input 
                            type            ="text" 
                            name            ="telefone" 
                            class           ="form-control" 
                            maxlength       = "14" 
                            placeholder     ="EX:(00)00000-0000" 
                            onkeypress      ="$(this).mask('(00)00000-0000')"
                            value           ="<?= $telefone; ?>"
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label>Função:</label>
                    <select name="funcao" id="" class="form-control" required="" >
                        <option  value ="<?= $idfuncao; ?>"><?= $nome_fun; ?></option>
                        <?php
                             //selecionar os dados do tipo do quadrinhos
                        $sql = "SELECT nome,id FROM funcao ORDER BY nome";
                        $consulta = $pdo->prepare($sql);
                        $consulta->execute();
                        //laço de repetição para separar  as Linhas
                        while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) {
                            //separar os dados 
                            $id = $linha->id;
                            $nome  = $linha->nome;
                            
                            //montar linhas e colunas das tabelas
                            echo 
                                "
                                    <option value='$id'>$nome</option>   
                                ";
                        }
                        ?>
                    </select>
                </div>
                <h5>Endereço:</h5>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Cidade:</label>
                        <input 
                            type        = "text"
                            placeholder = "Cidade:" 
                            class       = "form-control"
                            require     = "" 
                            name        = "cidade" 
                            maxlength   = "50" 
                            value       = "<?= $cidade; ?>"
                         >
                    </div>
                    <div class="form-group col-md-3">
                        <label>Bairro:</label>
                        <input 
                            type            = "text" 
                            placeholder     = "Bairro:" 
                            class           = "form-control" 
                            require 
                            name            = "bairro" 
                            maxlength       = "50" 
                            value           = "<?= $bairro; ?>"
                        >
                    </div>
                    <div class="form-group col-md-3">
                        <label>Rua:</label>
                        <input 
                            type            ="text" 
                            placeholder     ="Rua:" 
                            class           ="form-control" 
                            require 
                            name            ="rua" 
                            maxlength       ="100" 
                            value           ="<?= $rua; ?>"
                        >
                    </div>
                    <div class="form-group col-md-3">
                        <label>Numero da casa:</label>
                        <input 
                            type            ="number" 
                            placeholder     ="numero:" 
                            class           ="form-control" 
                            require 
                            name            ="numero" 
                            maxlength       ="5" 
                            value           ="<?= $numero; ?>"
                        >
                    </div>
                </div>
                <h5>Login do funcionario:</h5>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Login:</label>
                        <input 
                            type            ="text" 
                            placeholder     ="Login:" 
                            class           ="form-control" 
                            require 
                            name            ="login" 
                            maxlength       ="20" 
                            value           ="<?= $login; ?>"
                        >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Senha:</label>
                        <input 
                            type            ="password" 
                            placeholder     ="senha:" 
                            class           ="form-control" 
                            require 
                            name            ="senha" 
                            maxlength       ="20" 
                            value           ="<?= $senha; ?>"
                        >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Email:</label>
                        <input 
                            type                ="email" 
                            placeholder         ="email:" 
                            class               ="form-control" 
                            require 
                            name                ="email" 
                            maxlength           ="100" 
                            value               ="<?= $email; ?>"
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
