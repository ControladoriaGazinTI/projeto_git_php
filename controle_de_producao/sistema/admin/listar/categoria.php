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
            <h4 class="title">Categoria de produto:</h4>
        </div>
        <div class="content table-responsive table-full-width">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Data</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    //selecionar os dados do tipo do quadrinhos
                sql = "SELECT * , date_format(data_cat,'%d/%m/%Y')data_cat FROM categoria ORDER BY nome_cat";
                $consulta = $pdo->prepare($sql);
                $consulta->execute();
                //laço de repetição para separar  as Linhas
                while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) {
                    //separar os dados 
                    $id    = $linha->idcategoria;
                    $nome  = $linha->nome_cat;
                    $data  = $linha->data_cat  ;
                    //montar linhas e colunas das tabelas
                    echo
                        "
                            <tr>
                                <td>$id</td>
                                <td>$nome</td>
                                <td>$data</td>
                                <td>
                                    <a href='cadastros/categoria/$id' class='btn btn-success'><i class='pe-7s-pen'></i>Editar</a>
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
                location.href = "excluir/categoria/" + id;
            }
        }
    </script>