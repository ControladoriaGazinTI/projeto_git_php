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
//$p =[1]  index.php (id-cadastro)
if (isset($p[2])) {
    //selecioar os dados  conforme o id
    $sql = "SELECT * FROM funcionario WHERE id = ? limit 1";
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

}
?>
<div>
    <div class="card stacked-form">
        <div class="card-header pd-15-3-t">
            <h4 class="card-title">Cadastro do Funcionário:</h4>
        </div>
        <div class="card-body pd-15">
            <form method="POST" action="salvar/funcionario">
                <div class="form-group ">
                    <label for="id">ID:</label>
                    <input type="text" class="form-control" name="id" readonly value="<?= $id; ?>">
                </div>
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" placeholder="Digite o nome do Funcionario:" class="form-control" maxlength="100" required="" name="nome" value="<?= $nome; ?>">
                </div>
                <div class="form-group">
                    <label>Data de nascimento:</label>
                    <input type="date" placeholder="Digite data de nascimento do funcionário:" class="form-control" require name="data" value="<?= $data_nasc; ?>">
                </div>
                <div class="form-group">
                    <label>CPF:</label>
                    <input type="text" placeholder="000.000.000-00" class="form-control" require name="cpf" maxlength="14" value="<?= $cpf; ?>"
                     onkeypress="$(this).mask('000.000.000-00');">
                </div>
                <div class="form-group">
                    <label>Numero da carteira de trabalho:</label>
                    <input type="text" placeholder="Digite numero da carteira:" class="form-control" require name="carteira" maxlength="10"value="<?= $carteira; ?>" >
                </div>
                <div class="form-group">
                    <label>Telefone:</label>
                    <input type="text" placeholder="(00)00000-0000" class="form-control" maxlength=14 name="telefone" value="<?= $telefone; ?>" 
                    onkeypress="$(this).mask('(00)00000-0000')">
                </div>
                <div class="form-group">
                    <label>Cidade:</label>
                    <input type="text" placeholder="Cidade:" class="form-control" require name="cidade" maxlength="50"value="<?= $cidade; ?>" >
                </div>
                <div class="form-group">
                    <label>Bairro:</label>
                    <input type="text" placeholder="Bairro:" class="form-control" require name="bairro" maxlength="50" value="<?= $bairro; ?>">
                </div>
                <div class="form-group">
                    <label>Rua:</label>
                    <input type="text" placeholder="Rua:" class="form-control" require name="rua" maxlength="100" value="<?= $rua; ?>">
                </div>
                <div class="form-group">
                    <label>Numero da casa:</label>
                    <input type="number" placeholder="numero:" class="form-control" require name="numero" maxlength="5" value="<?= $numero; ?>">
                </div>
                <div class="form-group">
                    <label>Login:</label>
                    <input type="text" placeholder="Login:" class="form-control" require name="login" maxlength="20" value="<?= $login; ?>">
                </div>
                <div class="form-group">
                    <label>Senha:</label>
                    <input type="password" placeholder="senha:" class="form-control" require name="senha" maxlength="20" value="<?= $senha; ?>">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" placeholder="email:" class="form-control" require name="email" maxlength="100" value="<?= $email; ?>" >
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
        </div>
        <div class="card-footer pd-15">
            <button type="submit" class="btn btn-fill btn-info">Enviar</button>
            <button type="reset" class="btn btn-fill btn-danger">Cancelar</button>
        </div>
        </form>
    </div>
</div> 