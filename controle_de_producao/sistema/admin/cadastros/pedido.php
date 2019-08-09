<?php
 //verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";
    $id                 = "";
    $cliente            = "";
    $produto            = "";
    $prioridade         = "";
    $data_ent           = "";
    $qtde               = "";
    $valor              = "";

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
           while ($linha =  $consulta->fetch(PDO::FETCH_OBJ)) {
               # code...
           }
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
                    <label for="id">ID:</label>
                    <input 
                        name  = "id" 
                        type  = "text" 
                        class = "form-control" 
                        readonly
                    >
                </div>
                <div class="form-group">
                    <label>Cliente:</label>
                    <select 
                        name    = "cliente" 
                        class   = "form-control" 
                        required= ""
                    >
                        <option value="">Selecione um cliente:</option>
                        <?php
                            carregarOpcoes("id","cliente","nome");
                        ?>
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Produto:</label>
                        <select 
                            name        = "produto" 
                            class       = "form-control" 
                            required    = ""
                        >
                            <option value="">Selecione um Produto:</option>
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
                            <option value= "">Selecione uma prioridade:</option>
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
                    >
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Quatidade do pedido:</label>
                        <input 
                            name        = "qtde"
                            type        = "number" 
                            class       = "form-control" 
                            required    = "required" 
                        >
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Valor:</label>
                        <input 
                            name        = "valor"
                            type        = "number" 
                            class       = "form-control" 
                            required    = "required" 
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