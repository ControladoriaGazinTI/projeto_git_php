<div>
    <div class="card stacked-form">
        <div class="card-header pd-15-3-t">
            <h4 class="card-title">Cadastro do Cliente:</h4>
        </div>
        <div class="card-body pd-15">
            <form method="POST" action="cad_cliente.php">
                <div class="form-group">
                    <label>Cliente:</label>
                    <select name="" id="" class="form-control" required="">
                        <option value="">Selecione um cliente:</option>
                        <option value="">joas</option>
                        <option value="">romulo</option>
                        <option value="">natiara</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Prioridade do pedido:</label>
                    <select name="" id="" class="form-control" required="">
                        <option value="">Selecione uma prioridade:</option>
                        <option value="">baixa</option>
                        <option value="">media</option>
                        <option value="">alta</option>
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="">Data de lançamento do Pedido:</label>
                        <input type="date" class="form-control" required="required">
                    </div>
                    <div class="form-grop col-md-5">
                        <label for="">Data de entrega do pedido:</label>
                        <input type="date" class="form-control" required="required">
                    </div>
                </div>
                <div class="form-group">
                        <label for="">Quatidade do pedido:</label>
                        <input type="number" class="form-control" required="required">
                </div>
            </div>
        <div class="card-footer pd-15">
            <button type="submit" class="btn btn-fill btn-info">Enviar</button>
            <button type="reset" class="btn btn-fill btn-danger">Cancelar</button>
        </div>
        </form>
    </div>
</div> 