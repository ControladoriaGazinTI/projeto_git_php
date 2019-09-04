<?php
 //verificar se a sessão esta ativa
 if (file_exists("verificalogin.php"))
 include "verificalogin.php";
 else
 include "../verificalogin.php";
    $idproducao_peca     = "";
    if (isset($p[2])) {
        $idproducao_peca = (int) $p[2];
    }
?>
<?=print_r($idproducao_peca);?>
            <?=print_r($idproducao_peca);?>
<div class="card stacked-form">
    <div class="card-header pd-15-3-t">
        <h4 class="card-title">Cadastro de produção de peça:</h4>
    </div>
    <div class="card-body pd-15">
        <form method="POST" action="salvar/producaoPeca" enctype="multipart/form-data">
            <div class="form-group">
                <label for="id">IDPRODUCÃO DE PEÇA</label>
                <input 
                    name  = "idproducao" 
                    type  = "text" 
                    class = "form-control" 
                    readonly
                    value ="<?=$idproducao_peca;?>"
                >
            </div>
            <div class="form-group">
                    <label>Data entrega:</label>
                    <input 
                        name        ="data_ent"
                        type        ="date"
                        class       ="form-control"
                        required
                    >
                </div>
                <div class="form-group">
            <label for="descricao">Observação sobre a produção de peça:</label>
                <textarea 
                    id              ="descricao"
                    name            ="observacao" 
                    class           ="form-control"
                    cols            ="1" 
                    rows            ="1"
                    maxlength       ="100"
                >
                </textarea>
            </div>
    </div>
    <div class="card-footer pd-15">
        <button type="submit" class="btn btn-fill btn-success">Cadastrar</button>
        <?php
            if (isset($p[2])) {
                echo
                "<button type='button' class='btn btn-fill btn-success' data-toggle='modal' data-target='#exampleModalCenter'>
                + Produto
                </button>";
            }
            ?>
        </form>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Adicionar produto a essa produção:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formulario"  action="paginas/salvarProducaoPeca.php" method = "post" target = "frame">
            <div class="form-group">
                <label for="id">IDPRODUCÃO DE PEÇA</label>
                <input 
                    name  = "idproducao_peca" 
                    type  = "text" 
                    class = "form-control" 
                    readonly
                    value ="<?=$idproducao_peca;?>"
                >
            </div>
            <div class="form-group">
                <label>Funcionario:</label>
                <select 
                        name        ="idfuncionario" 
                        class       ="form-control" 
                        required    =""
                >
                <option value=""></option>
                <?php
                        carregarOpcoes("id","funcionario","nome");
                    ?>
                </select>
            </div>
                <div class="form-group">
                <label>Peça:</label>
                <select 
                    name        = "idpeca" 
                    class       = "form-control" 
                    required    = ""
                >
                    <option value=""></option>
                    <?php
                        carregarOpcoes("id","peca","nome");
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Prioridade do pedido:</label>
                <select 
                    name        = "prioridade" 
                    class       = "form-control" 
                    required    = ""
                >
                    <option value= "">Selecione uma prioridade:</option>
                    <option value= "Baixa">Baixa</option>
                    <option value= "Media">Media</option>
                    <option value= "Alta">Alta</option>
                    ?>
                </select>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Quatidade de Produçao:</label>
                    <input 
                        name        ="qtde"
                        type        ="number" 
                        class       ="form-control" 
                        required    ="required"
                    >
                </div>
                <div class="form-grop col-md-6">
                    <label for="">Quantidade de Perdas:</label>
                    <input
                        name        ="qtde_perdas" 
                        type        ="number" 
                        class       ="form-control" 
                        required    ="required"
                    >
                </div>
            </div>
            <div class="form-group">
            <label for="descricao">Observação sobre a produção de peça:</label>
                <textarea 
                    id              ="descricao"
                    name            ="observacao" 
                    class           ="form-control"
                    cols            ="1" 
                    rows            ="1"
                    maxlength       ="100"
                >
                </textarea>
            </div>
            
        <iframe src="salvarProuducaoPeca.php?idproducao_peca=11" width="100%" height="300px" name="frame"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" id="idteste" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="receita1" class="btn btn-fill btn-success">Cadastrar</button>
        </form>  
    </div>
    </div>
  </div>
</div>
<?php
      if (isset($p[2])) {
            echo "<script>
            $('#exampleModalCenter').modal({
                show: true
                })
            </script>";
        }
?>
