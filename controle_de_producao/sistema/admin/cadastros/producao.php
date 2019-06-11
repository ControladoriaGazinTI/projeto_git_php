<div>
    <div class="card stacked-form">
        <div class="card-header pd-15-3-t">
            <h4 class="card-title">Cadastro de produção:</h4>
        </div>
        <div class="card-body pd-15">
            <form method="POST" action="cad_cliente.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Funcionario:</label>
                    <select name="" id="" class="form-control" required="">
                        <option value="">Selecione um Funcionario:</option>
                        <option value="">joas</option>
                        <option value="">romulo</option>
                        <option value="">natiara</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Produto:</label>
                    <select name="" id="" class="form-control" required="">
                        <option value="">Selecione um Produto:</option>
                        <option value="">cadeira</option>
                        <option value="">mesa</option>
                        <option value="">rack</option>
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="">Quatidade de Produçao:</label>
                        <input type="number" class="form-control" required="required">
                    </div>
                    <div class="form-grop col-md-5">
                        <label for="">Quantidade de Perdas:</label>
                        <input type="number" class="form-control" required="required">
                    </div>
                </div>
                <div class="form-group">
                        <label for="">Data de produção:</label>
                        <input type="date" class="form-control" required="required">
                </div>
            </div>
        <div class="card-footer pd-15">
            <button type="submit" class="btn btn-fill btn-info">Enviar</button>
            <button type="reset" class="btn btn-fill btn-danger">Cancelar</button>
        </div>
        </form>
    </div>
</div> 