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
            <h4 class="title">Producões de peças em andamento:</h4>
        </div>
        <div class="content table-responsive  table-full-width">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Funcionario</th>
                        <th>Nome peças</th>
                        <th>Qtde</th>
                        <th>Qtde_perdas</th>
                        <th>Prioridade</th>
                        <th>Observacão</th>
                        <th>Status</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    //selecionar os dados do tipo do quadrinhos
                $sql =
               "SELECT 
                     item_producao_peca.qtde
                    ,item_producao_peca.qtde_perda
                    ,item_producao_peca.status
                    ,item_producao_peca.prioridade
                    ,producao_peca.id,producao_peca.observacao
                    ,funcionario.nome
                    ,peca.id as idpeca,peca.nome as nome_peca
                FROM
                    item_producao_peca
                INNER JOIN producao_peca on producao_peca.id = item_producao_peca.idproducao_peca
                INNER JOIN funcionario on funcionario.id = item_producao_peca.idfuncionario  
                INNER JOIN peca on peca.id = item_producao_peca.idpeca
                WHERE
                    item_producao_peca.status = 0;
                    ,
                
               ";
                
                $consulta = $pdo->prepare($sql);
                $consulta->execute();
                //laço de repetição para separar  as Linhas
                while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) {
                    //separar os dados 
                    $idproducao_peca    = $linha->id;
                    $nomepeca           = $linha->nome_peca;
                    $idpeca             = $linha->idpeca;
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
                        $status = "Em Produção";
                        $color = "light";
                    }
                    if ($prioridade == "Média") {
                        $classColor = "bg-warning";
                    }elseif ($prioridade == "Baixa") {
                        $classColor = "bg-success";
                    }elseif ($prioridade == "Alta") {
                        $classColor = "bg-danger";
                    }else {
                        echo "erro";
                    }
                    echo
                        "
                            <tr class='$color'>
                                <td>$nomeFuncionario</td>
                                <td>$nomepeca</td>
                                <td>$qtde</td>
                                <td>$qtdePerda</td>
                                <td class='$classColor'>$prioridade</td>
                                <td>$observacao</td>
                                <td>$status</td>
                                <td>
                                    <a href='cadastros/pedido/$idproducao_peca/$idpeca' class='btn btn-fill btn-success'><i class='pe-7s-pen'></i></a> 
                                    <a href='' class='btn btn-fill btn-primary'><i class='nc-caps-small'></i></a> 
                                    <a href='javascript:excluir($idproducao_peca,$idpeca)' class='btn btn-fill btn-danger'><i class='pe-7s-trash'></i></a> 
                                 </td>
                            </tr>
                         ";
                }
                ?>
                </tbody>
            </table>
            <h5>
                <a href="cadastros/producaoPeca" class="btn btn-fill btn-success"><i class="pe-7s-angle-left"></i>Voltar</a>
            </h5>
        </div>
    </div>
</div> 
<script type="text/javascript">
        //funçao em java script para perguntar se que mesmo exluir
        function excluir(id,idpeca) {
            if (confirm("Deseja Finalizar esse pedido? Tem certeza?")) {
                location.href = "excluir/producao/" + id + "/" + idpeca;
            }
        }
    </script>