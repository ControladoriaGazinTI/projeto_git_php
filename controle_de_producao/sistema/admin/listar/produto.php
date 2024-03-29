<?php
 //verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";
?>
    <div class="card pd-15">
        <div class="header">
            <h4 class="title">Produto</h4>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Categoria</th>
                        <th>Nome</th>
                        <th>Valor</th>
                        <th>Quatidade</th>
                        <th>Cor</th>
                        <th>Foto</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    //selecionar os dados do tipo do quadrinhos
                $sql =
               "SELECT produto.* , categoria.nome as nome_cat
               FROM produto 
               INNER JOIN categoria ON categoria.id =  produto.idcategoria";
                
                $consulta = $pdo->prepare($sql);
                $consulta->execute();
                //laço de repetição para separar  as Linhas
                while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) {
                    //separar os dados 
                    $id          = $linha->id;
                    $nome        = $linha->nome;
                    $valor       = $linha->valor;
                    $valor       = number_format($valor,2,',','.');
                    $qtde        = $linha->qtde;
                    $foto        = $linha->foto;
                    $cor         = $linha->cor;
                    $categoria   = $linha->nome_cat;
                    //montar linhas e colunas das tabelas
                    $foto = "../fotos/".$foto."p.jpg";
                    echo
                        "
                            <tr>
                                <td>$id</td>
                                <td>$categoria</td>
                                <td>$nome</td>
                                <td  class ='text-left'>R$ $valor</td>
                                <td>$qtde</td>
                                <td>$cor</td>
                                <td><img src='$foto' width='80px' class='img-thumbnail'></td>
                                <td>
                                    <a href='cadastros/produto/$id' class='btn btn-fill btn-success'><i class='pe-7s-pen'></i></a>
                                    <a href='javascript:excluir($id)' class='btn btn-fill btn-danger'><i class='pe-7s-trash'></i></a> 
                                </td>
                            </tr>
                         ";
                }
                ?>
                </tbody>
            </table>
            <h5>
                <a href="cadastros/produto" class="btn btn-fill btn-success"><i class="pe-7s-angle-left"></i>Voltar</a>
            </h5>
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