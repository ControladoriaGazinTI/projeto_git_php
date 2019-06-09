<?php
 //verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";

    $id        = ""; 
    $nome      = "";
    $categoria = "";
    $valor     = "";
    $qtde      = "";
    $nomeCategoria = "";
//$p =[1]  index.php (id-cadastro)
if (isset($p[2])) {
    //selecioar os dados  conforme o id
    $sql =
               "SELECT produto.* , categoria.nome as nome_cat
               FROM produto 
               INNER JOIN categoria ON categoria.idcategoria =  produto.id
               WHERE idproduto = ? LIMIT 1";
                
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(1, $p[2]);
    $consulta->execute();
    //recuperar dados
    $dados = $consulta->fetch(PDO::FETCH_OBJ);

    $id         = $dados->idproduto;
    $nome       = $dados->nome;
    $valor      = $dados->valor;
    $qtde       = $dados->qtde;
    $nomeCategoria= $dados->nome_cat;
    $idcategoria = $dados->id;
}
?>
<div>
    <div class="card stacked-form">
        <div class="card-header pd-15-3-t">
            <h4 class="card-title">Cadastro de Produto:</h4>
        </div>
        <div class="card-body pd-15">
            <form method="POST" action="salvar/produto">
            <div class="form-group">
                    <label for="id">ID:</label>
                    <input type="text" class="form-control" name="id" readonly value="<?=$id ;?>">
                </div>
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" placeholder="Digite o nome do Produto:" class="form-control" maxlength="50" required=""
                     name="nome_produto" value="<?=$nome;?>">
                </div>
                <div class="form-group">
                    <label>laynara:</label>
                    <input type="text" placeholder="Digite o nome do Produto:" class="form-control" maxlength="50" required=""
                     name="nome_produto" value="<?=$nome;?>">
                </div>
                <div class="form-group">
                    <label>Categoria:</label>
                    <select name="categoria" id="" class="form-control" required="" >
                        <option value=""><?=$nomeCategoria ;?></option>
                        <?php
                             //selecionar os dados do tipo do quadrinhos
                            $sql = "SELECT * FROM categoria";
                            $consulta = $pdo->prepare($sql);
                            $consulta->execute();
                            //laço de repetição para separar  as Linhas
                            while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) {
                                //separar os dados 
                                $id = $linha->idcategoria;
                                $nome  = $linha->nome_cat;
                                
                                //montar linhas e colunas das tabelas
                                echo 
                                    "
                                        <option value='$id'>$nome</option>   
                                    ";
                            }
                        ?>
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="">Valor do produto:</label>
                        <input type="number" class="form-control" required="required" name="valor" value="<?=$valor;?>">
                    </div>
                    <div class="form-grop col-md-5">
                        <label for="">Quantidade em estoque:</label>
                        <input type="number" class="form-control" required="required" name="qtde" value="<?=$qtde ;?>">
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