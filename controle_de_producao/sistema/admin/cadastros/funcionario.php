<?php
 //verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";

    $id       = ""; 
    $nome     = "";
    $telefone = "";
    $funcao   = "";
//$p =[1]  index.php (id-cadastro)
if (isset($p[2])) {
    //selecioar os dados  conforme o id
    $sql = "SELECT * FROM funcionario WHERE id = ? limit 1";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(1, $p[2]);
    $consulta->execute();
    //recuperar dados
    $dados = $consulta->fetch(PDO::FETCH_OBJ);

    $id         = $dados->id;
    $nome       = $dados->nome;
    $telefone   = $dados->telefone;
    $funcao     = $dados->idfuncao;

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
                <div class="form-group">
                    <label for="id">ID:</label>
                    <input type="text" class="form-control" name="id" readonly value="<?= $id; ?>">
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Nome:</label>
                        <input type="text" placeholder="Digite o nome do Funcionario:" class="form-control" maxlength="100" required="" name="nome" value="<?= $nome; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Data de nascimento:</label>
                        <input type="date" placeholder="Digite data de nascimento do funcionário:" class="form-control" require name="data">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>CPF:</label>
                        <input type="text" placeholder="Digite CPF do funcionario" class="form-control" require name="cpf" maxlength="14" onkeypress="$(this).mask('(00) 0000-00009')">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Numero da carteira de trabalho:</label>
                        <input type="text" placeholder="Digite numero da carteira:" class="form-control" require name="carteira" maxlength="10" >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Telefone:</label>
                        <input type="text" placeholder="digite o telefone:" class="form-control" maxlength=14 name="telefone" value="<?= $telefone; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label>Função:</label>
                    <select name="funcao" id="" class="form-control" required="" >
                        <option value=""></option>
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
                        <input type="text" placeholder="Cidade:" class="form-control" require name="cidade" maxlength="50" >
                    </div>
                    <div class="form-group col-md-3">
                        <label>Bairro:</label>
                        <input type="text" placeholder="Bairro:" class="form-control" require name="bairro" maxlength="50" >
                    </div>
                    <div class="form-group col-md-3">
                        <label>Rua:</label>
                        <input type="text" placeholder="Rua:" class="form-control" require name="rua" maxlength="100" >
                    </div>
                    <div class="form-group col-md-3">
                        <label>Numero da casa:</label>
                        <input type="number" placeholder="numero:" class="form-control" require name="numero" maxlength="5" >
                    </div>
                </div>
                <h5>Login do funcionario:</h5>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Login:</label>
                        <input type="text" placeholder="Login:" class="form-control" require name="login" maxlength="20" >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Senha:</label>
                        <input type="password" placeholder="senha:" class="form-control" require name="senha" maxlength="20" >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Email:</label>
                        <input type="text" placeholder="email:" class="form-control" require name="email" maxlength="100" >
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