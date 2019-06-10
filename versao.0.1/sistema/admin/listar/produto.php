<?php
 //verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";
?>
<div class="col-md-12">
    <div class="card pd-15">
        <div class="header">
            <h4 class="title">Produto</h4>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Valor</th>
                        <th>Quatidade</th>
                        <th>Categoria</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    //selecionar os dados do tipo do quadrinhos
                $sql =
               "SELECT produto.* , nome_cat
               FROM produto 
               INNER JOIN categoria ON categoria.idcategoria =  produto.id";
                
                $consulta = $pdo->prepare($sql);
                $consulta->execute();
                //laço de repetição para separar  as Linhas
                while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) {
                    //separar os dados 
                    $id          = $linha->idproduto;
                    $nome        = $linha->nome;
                    $valor       = $linha->valor;
                    $valor  = number_format($valor,2,',','.');
                    $qtde        = $linha->qtde;
                    $categoria   = $linha->nome_cat;
                    //montar linhas e colunas das tabelas
                   
                    echo
                        "
                            <tr>
                                <td>$id</td>
                                <td>$nome</td>
                                <td  class ='text-right'>R$ $valor</td>
                                <td>$qtde</td>
                                <td>$categoria</td>
                                <td>
                                    <a href='cadastros/produto/$id' class='btn btn-success'><i class='pe-7s-pen'></i>Editar</a>
                                    <a href='javascript:excluir($id)' class='btn btn-danger'><i class='pe-7s-trash'>Apagar</i></a> 
                                </td>
                            </tr>
                         ";
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div> 
<script type="text/javascript">
        //funçao em java script para perguntar se que mesmo exluir
        function excluir(id) {
            if (confirm("Deseja mesmo excluir? Tem certeza?")) {
                location.href = "excluir/produto/" + id;
            }
        }
    </script>