<div>
    <div class="card stacked-form">
        <div class="card-header pd-15-3-t">
            <h4 class="card-title">Cadastro do Cliente:</h4>
        </div>
        <div class="card-body pd-15">
            <form method="POST" action="cad_cliente.php">
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" placeholder="Digite o nome do cliente:" class="form-control" maxlength="100" required=""
                     name="nome_cliente">
                </div>
                <div class="form-group">
                    <label>CPF:</label>
                    <input type="text" placeholder="Digite o CPF:" class="form-control" maxlength="14" 
                    name="cpf_cliente">
                </div>
                <div class="form-group">
                    <label>CNPJ:</label>
                    <input type="text" placeholder="Digite o CNPJ:" class="form-control" maxlength="18" 
                    name="cnpj_cliente">
                </div>
        </div>
        <div class="card-footer pd-15">
            <button type="submit" class="btn btn-fill btn-info">Enviar</button>
            <button type="reset" class="btn btn-fill btn-danger">Cancelar</button>
        </div>
        </form>
    </div>
</div> 