<?php
 //verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";
    $idcliente          = "";
    $idpedido           = "";
    $idproduto          = "";
    $nome_cliente       = "";
    $nome_produto       = "";
    $prioridade         = "";
    $data_entrega       = "";
    $qtde               = "";
    $valor              = "";
    
    if (isset($p[2])) {
        $idpedido = (int) $p[2];
        if (isset($p[3])) {
            $idproduto = (int) $p[3];
        }
        $sql = "SELECT 
                    item_pedido.qtde
                    ,item_pedido.valor
                    ,item_pedido.prioridade
                    ,pedido.data_entrega
                    ,pedido.id as idpedido
                    ,cliente.nome as nome_cliente
                    ,cliente.id as idcliente
                    ,produto.nome as nome_produto
                    ,produto.id as idproduto
                FROM item_pedido
                INNER JOIN  pedido  on pedido.id  = item_pedido.idpedido
                INNER JOIN  cliente on cliente.id = pedido.idcliente
                INNER JOIN  produto on produto.id = item_pedido.idproduto
                WHERE item_pedido.idpedido  = ?
                AND   item_pedido.idproduto = ?
                ";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1,$idpedido);
        $consulta->bindParam(2,$idproduto);
        if ($consulta->execute()) {
            while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) {
                $idpedido       = $linha->idpedido;
                $idproduto      = $linha->idproduto;
                $idcliente      = $linha->idcliente;
                $nome_cliente   = $linha->nome_cliente;
                $nome_produto   = $linha->nome_produto;
                $qtde           = $linha->qtde;
                $valor          = $linha->valor;
                $data_entrega   = $linha->data_entrega;
                $prioridade     = $linha->prioridade;
            }
        }else{
            print_r($consulta->errorInfo());
        }

    }
?>
<div class="card stacked-form">
    <div class="card-header pd-15-3-t">
        <h4 class="card-title">Novo Pedido:</h4>
    </div>
    <div class="card-body pd-15">
        <form method="POST" action="salvar/pedido">
            <div class="form-group">
                <label for="id">IDPEDIDO</label>
                <input 
                    name  = "idpedido" 
                    type  = "text" 
                    class = "form-control" 
                    readonly
                    value = "<?=$idpedido?>"
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
            <div class="form-grop">
                <label for="">Data de entrega do pedido:</label>
                <input 
                    name        = "data_ent"
                    type        = "date" 
                    class       = "form-control" 
                    required    = "required" 
                    value       = "<?=$data_entrega?>"
                >
            </div>
            <div class="row card-footer pd-15 ">
                <div class="">
                    <button type="submit" id="receita1" class="btn btn-fill btn-success">Cadastrar</button>
                    <!-- Button trigger modal -->
                    <?php
                    if (isset($p[2])) {
                        echo
                        "<button type='button' class='btn btn-fill btn-success' data-toggle='modal' data-target='#exampleModalCenter'>
                        + Produto
                        </button>";
                    }
                    ?>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Adicionar Produto ao pedido:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formulario"  action="paginas/salvarProduto.php" method = "post" target = "frame">
            <div class="form-group">
                <label for="id">IDPEDIDO</label>
                <input 
                    name  = "idpedido" 
                    type  = "text" 
                    class = "form-control" 
                    readonly
                    value = "<?=$idpedido?>"
                >
            </div>
            <div class="form-group">
                <label>Produto:</label>
                <select 
                    name        = "idproduto" 
                    id          = "idproduto"
                    class       = "form-control" 
                    required    = ""
                >
                    <option value="<?=$idproduto;?>"><?=$nome_produto;?></option>
                    <?php
                        carregarOpcoes("id","produto","nome");
                    ?>
                </select>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Quatidade do produto:</label>
                    <input 
                        name        = "qtde"
                        id          = "qtde"
                        type        = "number" 
                        class       = "form-control" 
                        required    = "required" 
                        value       = "<?=$qtde;?>"
                        onblur      = "calcular_valor_pedido()"
                    >
                </div>
                <div class="form-group col-md-6">
                    <label for="">Valor</label>
                    <input 
                        name        = "valor"
                        class       = "form-control" 
                        readonly
                        id          = "valor"
                        type        = "text"
                        class       = "form-control" 
                        required    = "required" 
                        value       = "<?=$valor;?>"
                    >
                </div>
            </div>
            <div class="form-group ">
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
                </select>
            </div>
        <iframe src="paginas/salvarProduto.php?idpedido=<?=$idpedido?>" width="100%" height="300px" name="frame"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" id="idteste" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="receita1" class="btn btn-fill btn-success">Cadastrar</button>
      </div>
    </div>
    </form>
  </div>
</div>
<script>
  
    function calcular_valor_pedido() {
    var qtde = parseInt(document.getElementById('qtde').value,10);
    var valor = 508 ;
    var resultado = qtde * valor;
   // document.getElementById('valor').value = resultado;
    document.getElementById("valor").value = parseFloat(resultado).toFixed(2);
    }
</script>
<script type="text/javascript">
      $(document).ready(function(){
        $("#idproduto").change(function(){ 
            var idproduto = $(this).val(); 
            console.log(idproduto);       
        });
    });
</script>
<?php
      if (isset($p[2])) {
            echo "<script>
            $('#exampleModalCenter').modal({
                show: true
                })
            </script>";
        }
?>

           