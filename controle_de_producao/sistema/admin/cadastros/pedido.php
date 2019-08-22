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
        ,produto.nome as nome_produto, produto.id as idproduto,produto.valor as valor_produto
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
            $valor_produto            = $dados->valor_produto;
            $barra                    = "|";
        }else {
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
                    value       = "<?=$data_ent?>"
                >
            </div>
            <div class="row card-footer pd-15 ">
                <div class="col-md-2">
                    <button type="submit" id="receita1" class="btn btn-fill btn-success">Cadastrar</button>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExemploModalCentralizado">
                        Abrir modal de demonstração
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Botão para acionar modal -->


<!-- Modal -->
<div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalCentralizado">Título do modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="formulario"  action="paginas/salvarProduto.php" method = "post" target = "frame">
                    <div class="form-group col-md-1">
                        <label for="id">IDPRODUTO</label>
                        <input 
                            name  = "idpedido" 
                            type  = "text" 
                            class = "form-control" 
                            readonly
                            value = "<?=$idproduto;?>"
                        >
                    </div>
                    <div class="form-group col-md-11">
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
                            >
                        </div>
                    </div>
                    <div class="form-group col-md-12">
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
                    <div class="card-footer pd-15">
                        <button type="submit" id="receita1" class="btn btn-fill btn-success">Cadastrar</button>
                    </div>
                </form>
                <div id="1" class="escondida"> 
                <h5 class="h4">Adicionar Produto:</h5>
                <!-- INICIO DO FORMULÁRIO -->
                
                <!-- FIM DO FORMULÁRIO -->
                <iframe src="" width="100%" height="300px" name="frame"></iframe>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Salvar mudanças</button>
      </div>
    </div>
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
<script type="text/javascript">
function abrir() {
    var main = document.getElementById("central");
    var iten = main.getElementsByTagName("input");
    if (iten) {
        for (var i=0;i<iten.length;i++) {
            iten[i].onclick = function() {
                var el = document.getElementById(this.id.substr(7,7));
                if (el.style.display == "block")
                    el.style.display = "none";
                else
                    el.style.display = "block";
            }
        }
    }
}
window.onload=abrir;
</script>