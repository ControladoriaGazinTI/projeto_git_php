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
            <h4 class="title">Producões em andamento:</h4>
        </div>
        <div class="content table-responsive  table-full-width">
            <table class="table table-hover  ">
                <thead>
                    <tr>
                        <th>Funcionario</th>
                        <th>Qtde</th>
                        <th>Qtde_perdas</th>
                        <th>Prioridade</th>
                        <th>Observacão</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    //selecionar os dados do tipo do quadrinhos
                $sql =
               "SELECT 
                     item_producao.qtde
                    ,item_producao.qtde_perda
                    ,item_producao.status
                    ,item_producao.prioridade
                    ,item_producao.observacao
                    ,producao.id
                    ,funcionario.nome
                FROM
                    item_producao
                INNER JOIN producao on producao.id = item_producao.idproducao
                INNER JOIN funcionario on funcionario.id = item_producao.idfuncionario  
                WHERE
                    item_producao.status = 0;
                    ,
                
               ";
                
                $consulta = $pdo->prepare($sql);
                $consulta->execute();
                //laço de repetição para separar  as Linhas
                while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) {
                    //separar os dados 
                    $id                 = $linha->id;
                    $nomeFuncionario    = $linha->nome;
                    $qtde               = $linha->qtde;
                    $qtdePerda          = $linha->qtde_perda;
                    $prioridade         = $linha->prioridade;
                    $status             = $linha->status;
                    $observacao         = $linha->observacao;
                    //montar linhas e colunas das tabelas

                    if ($status) {
                        $status = "Concluido";
                        $color = "bg-success";
                    }else{
                        $status = "Em andamento";
                        $color = "light";
                    }
                    echo
                        "
                            <tr class='$color'>
                                <td>$nomeFuncionario</td>
                                <td>$qtde</td>
                                <td>$qtdePerda</td>
                                <td>$prioridade</td>
                                <td>$observacao</td>
                                <td>$status</td>
                                <td>
                                    <a href='javascript:excluir($id)' class='btn btn-fill btn-success'>Finalizar Produção</a> 
                                </td>
                            </tr>
                         ";
                }
                ?>
                </tbody>
            </table>
            <h5>
                <a href="cadastros/cliente" class="btn btn-fill btn-success"><i class="pe-7s-angle-left"></i>Voltar</a>
            </h5>
        </div>
    </div>
</div> 
<script type="text/javascript">
        //funçao em java script para perguntar se que mesmo exluir
        function excluir(id) {
            if (confirm("Deseja Finalizar esse pedido? Tem certeza?")) {
                location.href = "excluir/producao/" + id;
            }
        }
    </script>