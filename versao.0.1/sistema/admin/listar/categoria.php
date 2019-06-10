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
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    //selecionar os dados do tipo do quadrinhos
                $sql = "SELECT * FROM categoria ORDER BY nome";
                $consulta = $pdo->prepare($sql);
                $consulta->execute();
                //laço de repetição para separar  as Linhas
                while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) {
                    //separar os dados 
                    $id    = $linha->id;
                    $nome  = $linha->nome;
                    //montar linhas e colunas das tabelas
                    echo
                        "
                            <tr>
                                <td>$id</td>
                                <td>$nome</td>
                                <td>
                                    <a href='cadastros/categoria/$id' class='btn btn-fill btn-success'><i class='pe-7s-pen'></i></a>
                                    <a href='javascript:excluir($id)' class='btn btn-fill btn-danger'><i class='pe-7s-trash'></i></a> 
                                </td>
                            </tr>
                         ";
                }
                ?>
                </tbody>
            </table>
            <h5>
                <a href="cadastros/categoria" class="btn btn-fill btn-success"><i class="pe-7s-angle-left"></i>Voltar</a>
            </h5>
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