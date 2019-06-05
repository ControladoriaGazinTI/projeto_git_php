<div>
    <div class="card stacked-form">
        <div class="card-header pd-15-3-t">
            <h4 class="card-title">Cadastro de Produto:</h4>
        </div>
        <div class="card-body pd-15">
            <form method="POST" action="cad_cliente.php">
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" placeholder="Digite o nome do Produto:" class="form-control" maxlength="50" required=""
                     name="nome_cliente">
                </div>
                <div class="form-group">
                    <label>Categoria:</label>
                    <select name="" id="" class="form-control" required="">
                        <option value="">Selecione uma categoria:</option>
                        <option value="">cadeira</option>
                        <option value="">mesa</option>
                        <option value="">rack</option>
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="">Valor do produto:</label>
                        <input type="number" class="form-control" required="required">
                    </div>
                    <div class="form-grop col-md-5">
                        <label for="">Quantidade em estoque:</label>
                        <input type="number" class="form-control" required="required">
                    </div>
                </div>
        </div>
        <div class="card-footer pd-15">
            <button type="submit" class="btn btn-fill btn-info">Enviar</button>
            <button type="reset" class="btn btn-fill btn-danger">Cancelar</button>
        </div>
        </form>
    </div>
</div> 