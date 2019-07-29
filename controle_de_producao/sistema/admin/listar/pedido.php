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
            <h4 class="title">Pedido a serem feitos:</h4>
        </div>
        <div class="content table-responsive  table-full-width">
            <table class="table table-hover  ">
                <thead>
                    <tr>
                        <th>Login</th>
                        <th>Produto</th>
                        <th>cliente</th>
                        <th>Quatidade</th>
                        <th>Valor</th>
                        <th>Data de entrega</th>
                        <th>Data de Lançamento</th>
                        <th>Prioridade</th>
                        <th>Status</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    //selecionar os dados do tipo do quadrinhos
                $sql =
               "SELECT 
                    item_pedido.qtde,item_pedido.valor,item_pedido.prioridade
                    ,pedido.data_entrega,pedido.data_lancamento,pedido.status,pedido.id
                    ,cliente.nome as nome_cliente
                    ,produto.nome as nome_produto
                    ,funcionario.login
                FROM item_pedido
                INNER JOIN  pedido on pedido.id = item_pedido.idpedido
                INNER JOIN  cliente on cliente.id = pedido.idcliente
                INNER JOIN  produto on produto.id = item_pedido.idproduto
                INNER JOIN funcionario on funcionario.id = pedido.idfuncionario
                
               ";
                
                $consulta = $pdo->prepare($sql);
                $consulta->execute();
                //laço de repetição para separar  as Linhas
                while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) {
                    //separar os dados 
                    $id            = $linha->id;
                    $login         = $linha->login;
                    $nomeCliente   = $linha->nome_cliente;
                    $nomeProduto   = $linha->nome_produto;
                    $qtde          = $linha->qtde;
                    $valor         = $linha->valor;
                    $dataEnt       = $linha->data_entrega;
                    $dataLan       = $linha->data_lancamento;
                    $prioridade    = $linha->prioridade;
                    $status        = $linha->status;
                    //montar linhas e colunas das tabelas
                    $valor = formataValor($valor);
                    $dataEnt = date('d/m/Y', strtotime($dataEnt));
                    $dataLan = date('d/m/Y', strtotime($dataLan));
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
                                <td>$login</td>
                                <td>$nomeCliente</td>
                                <td>$nomeProduto</td>
                                <td>$qtde</td>
                                <td>$valor</td>
                                <td>$dataEnt</td>
                                <td>$dataLan</td>
                                <td>$prioridade</td>
                                <td>$status</td>
                                <td>
                                    <a href='javascript:excluir($id)' class='btn btn-fill btn-success'>Finalizar Pedido</a> 
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
            if (confirm("Deseja Finalizar esse pedido? Tem certeza?")) {
                location.href = "excluir/pedido/" + id;
            }
        }
    </script>