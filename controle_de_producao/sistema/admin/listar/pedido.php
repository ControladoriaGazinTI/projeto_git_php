
<meta http-equiv="refresh" content="5">
<?php
//verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";
   
?>
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
                        <th>Quantidade</th>
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
                    item_pedido.qtde,item_pedido.valor,item_pedido.prioridade,item_pedido.status
                    ,pedido.data_entrega,pedido.data_lancamento,pedido.id
                    ,cliente.nome as nome_cliente
                    ,produto.nome as nome_produto, produto.qtde as qtde_produto, produto.id as idproduto
                    ,funcionario.login
                FROM item_pedido
                INNER JOIN  pedido on pedido.id = item_pedido.idpedido
                INNER JOIN  cliente on cliente.id = pedido.idcliente
                INNER JOIN  produto on produto.id = item_pedido.idproduto
                INNER JOIN funcionario on funcionario.id = pedido.idfuncionario
                WHERE item_pedido.status = ?
               ";
                $status = 0;
                    $consulta = $pdo->prepare($sql);
                    $consulta->bindParam(1,$status);
                    $consulta->execute();
                    //laço de repetição para separar  as Linhas
                    while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) {
                        //separar os dados 
                        $id            = $linha->id;
                        $idproduto     = $linha->idproduto;
                        $login         = $linha->login;
                        $nomeCliente   = $linha->nome_cliente;
                        $nomeProduto   = $linha->nome_produto;
                        $qtde_pdt_estoque  = $linha->qtde_produto;
                        $qtde          = $linha->qtde;
                        $valor         = $linha->valor;
                        $dataEnt       = $linha->data_entrega;
                        $dataLan       = $linha->data_lancamento;
                        $prioridade    = $linha->prioridade;
                        $status        = $linha->status;
                        //montar linhas e colunas das tabelas
                        $valor         = number_format($valor,2,',','.');
                        $dataEnt = date('d/m/Y', strtotime($dataEnt));
                        $dataLan = date('d/m/Y', strtotime($dataLan));
                        
                        if ($qtde_pdt_estoque >= $qtde) {
                            $pdo->beginTransaction();
                            $conta = $qtde_pdt_estoque - $qtde;  
                            $status = true;
                            $sql = "UPDATE produto SET qtde = ? WHERE produto.id = ?";
                            $update = $pdo->prepare($sql);
                            $update->bindParam(1,$conta);
                            $update->bindParam(2,$idproduto);
                            if($update->execute()){
                                $sql = "UPDATE item_pedido SET status = ? WHERE item_pedido.idpedido = ? AND item_pedido.idproduto = ?";
                                $update = $pdo->prepare($sql);
                                $update->bindParam(1,$status);
                                $update->bindParam(2,$id);
                                $update->bindParam(3,$idproduto);
                                if ($update->execute()) {
                                    $pdo->commit();
                                }else {
                                    $pdo->rollBack();
                                    print_r($update->errorInfo());
                                }
                                
                            }else{
                                $pdo->rollBack();
                                print_r($update->errorInfo());
                            }
                        }else {
                            $conta =  $qtde - $qtde_pdt_estoque;  
                        }
                       
                        if ($status) {
                            $status = "Concluido";
                            $color = "bg-success";
                            $info  = "";
                        } else {
                            $status = "Falta para fechar o pedido: ".$conta;
                            $info = "text-danger";
                            $color = "light ";
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
                                <td>$login</td>
                                <td>$nomeProduto</td>
                                <td>$nomeCliente</td>
                                <td>$qtde</td>
                                <td class ='text-left'>R$ $valor</td>
                                <td>$dataEnt</td>
                                <td>$dataLan</td>
                                <td class='$classColor'>$prioridade</td>
                                <td class='$info'>$status</td>
                                <td>
                                    <a href='cadastros/pedido/$id/$idproduto' class='btn btn-fill btn-success'><i class='pe-7s-pen'></i></a> 
                                    <a href='' class='btn btn-fill btn-primary'><i class='nc-caps-small'></i></a> 
                                    <a href='javascript:excluir($id,$idproduto)' class='btn btn-fill btn-danger'><i class='pe-7s-trash'></i></a> 
                                </td>
                            </tr>
                         ";
                    }
                    ?>
                </tbody>
            </table>
            <h5>
                <a href="cadastros/cliente" class="btn btn-fill btn-success"><i class="pe-7s-angle-left"></i>Voltar</a>
                <a type="submit" name="mudar" href="cadastros/cliente" class="btn btn-fill btn-success">Pedidos Finalizados</a>
            </h5>
        </div>
    </div>
<script type="text/javascript">
    //funçao em java script para perguntar se que mesmo exluir
    function excluir(id,idproduto) {
        if (confirm("Deseja Finalizar esse pedido? Tem certeza?")) {
            location.href = "excluir/pedido/" + id + "/" + idproduto;
        }
    }
</script>