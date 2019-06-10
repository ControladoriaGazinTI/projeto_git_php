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
                        <th>Nome cliente</th>
                        <th>Quatidade do Pedido</th>
                        <th>Produto</th>
                        <th>Prioridade</th>
                        <th>Data de entrega</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    //selecionar os dados do tipo do quadrinhos
                $sql =
               "SELECT pedido.*, date_format(data_entrega,'%d/%m/%Y')data_entrega , nome_cli , nome,nome_prio
               FROM pedido
               INNER JOIN cliente ON cliente.idcliente =  pedido.idcliente
               INNER jOIN produto ON produto.idproduto = pedido.idproduto
               INNER JOIN prioridade ON prioridade.idprioridade = pedido.idprioridade";
                
                $consulta = $pdo->prepare($sql);
                $consulta->execute();
                //laço de repetição para separar  as Linhas
                while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) {
                    //separar os dados 
                    $id            = $linha->idpedido;
                    $qtde          = $linha->qtde_pedido;
                    $dataEnt       = $linha->data_entrega;
                    $nomeCliente   = $linha->nome_cli;
                    $nomeProduto   = $linha->nome;
                    $prioridade    = $linha->nome_prio;
                    //montar linhas e colunas das tabelas
                    echo
                        "
                            <tr>
                                <td>$id</td>
                                <td>$nomeCliente</td>
                                <td>$qtde</td>
                                <td>$nomeProduto</td>
                                <td>$prioridade</td>
                                <td>$dataEnt</td>
                                <td>
                                    <a href='cadastros/pedido/$id' class='btn btn-success'><i class='pe-7s-pen'></i></a>
                                    <a href='javascript:excluir($id)' class='btn btn-danger'><i class='pe-7s-trash'></i></a> 
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
                location.href = "excluir/pedido/" + id;
            }
        }
    </script>