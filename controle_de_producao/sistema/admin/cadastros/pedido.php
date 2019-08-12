<?php
 //verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";
    $idcliente          = "";
    $nome_cliente       = "";
    $nome_produto       = "";
    $prioridade         = "";
    $data_ent           = "";
    $qtde               = "";
    $valor              = "";
    $idpedido           = "";
    $idproduto          = "";
    $barra              = "";
    if (isset($p[2])) {
        $idpedido = (int) $p[2];
        $idproduto = (int) $p[3];

        $sql = "SELECT 
        item_pedido.qtde,item_pedido.valor,item_pedido.prioridade
        ,pedido.data_entrega,pedido.id
        ,cliente.nome as nome_cliente, cliente.id as idcliente
        ,produto.nome as nome_produto, produto.id as idproduto
        FROM item_pedido
        INNER JOIN  pedido on pedido.id = item_pedido.idpedido
        INNER JOIN  cliente on cliente.id = pedido.idcliente
        INNER JOIN  produto on produto.id = item_pedido.idproduto
        WHERE pedido.id = ?
        AND   produto.id = ? 
        LIMIT 1
        ";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1,$idpedido);
        $consulta->bindParam(2,$idproduto);
        if ($consulta->execute()) {
            $dados = $consulta->fetch(PDO::FETCH_OBJ);
            $idcliente                = $dados->idcliente;
            $nome_cliente             = $dados->nome_cliente;
            $idproduto                = $dados->idproduto;
            $nome_produto             = $dados->nome_produto;
            $prioridade               = $dados->prioridade;
            $data_ent                 = $dados->data_entrega;
            $qtde                     = $dados->qtde;
            $valor                    = $dados->valor;
            $barra                    = "|";
        }else {
            print_r($consulta->errorInfo());
        }

    }
?>
<div>
    <div class="card stacked-form">
        <div class="card-header pd-15-3-t">
            <h4 class="card-title">Novo Pedido:</h4>
        </div>
        <div class="card-body pd-15">
            <form method="POST" action="salvar/pedido">
                <div class="form-group">
                    <label for="id">IDPEDIDO|IDPRODUTO</label>
                    <input 
                        name  = "idpedido" 
                        type  = "text" 
                        class = "form-control" 
                        readonly
                        value = "<?=$idpedido?><?=$barra;?><?=$idproduto;?>"
                    >
                </div>
                <div class="form-group">
                    <label>Cliente:</label>
                    <select 
                        name    = "idcliente" 
                        class   = "form-control" 
                        required= ""
                    >
                        <option value="<?=$idcliente;?>"><?=$nome_cliente;?></option>
                        <?php
                            carregarOpcoes("id","cliente","nome");
                        ?>
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Produto:</label>
                        <select 
                            name        = "idproduto" 
                            class       = "form-control" 
                            required    = ""
                        >
                            <option value="<?=$idproduto;?>"><?=$nome_produto;?></option>
                            <?php
                                carregarOpcoes("id","produto","nome");
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Prioridade do pedido:</label>
                        <select 
                            name        = "prioridade" 
                            class       = "form-control" 
                            required    = ""
                        >
                            <option value= "<?=$prioridade;?>"><?=$prioridade;?></option>
                            <option value= "Baixa">Baixa</option>
                            <option value= "Média">Media</option>
                            <option value= "Alta">Alta</option>
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-grop">
                    <label for="">Data de entrega do pedido:</label>
                    <input 
                        name        = "data_ent"
                        type        = "date" 
                        class       = "form-control" 
                        required    = "required" 
                        value       = "<?=$data_ent?>"
                    >
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="">Quatidade do pedido:</label>
                        <input 
                            name        = "qtde"
                            type        = "number" 
                            class       = "form-control" 
                            required    = "required" 
                            value       = "<?=$qtde;?>"
                        >
                    </div>
                </div>
        </div>
        <div class="card-footer pd-15">
            <button type="submit" class="btn btn-fill btn-success">Cadastrar</button>
        </div>
        </form>
    </div>
</div>