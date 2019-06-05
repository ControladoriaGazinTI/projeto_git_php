<div>
    <div class="card stacked-form">
        <div class="card-header pd-15-3-t">
            <h4 class="card-title">Cadastro do Funcionário:</h4>
        </div>
        <div class="card-body pd-15">
            <form method="POST" action="cad_cliente.php">
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" placeholder="Digite o nome do Funcionario:" class="form-control" maxlength="100" required=""
                     name="nome_cliente" >
                </div>
                <div class="form-group">
                    <label>Telefone:</label>
                    <input type="text" placeholder="digite o telefone:" class="form-control" maxlength="20" 
                    name="cpf_cliente">
                </div>
                <div class="form-group">
                    <label>Função:</label>
                    <select name="" id="" class="form-control" required="">
                        <option value="">Selecione uma função:</option>
                        <option value="">auxiliar</option>
                        <option value="">auxiliar</option>
                        <option value="">auxiliar</option>
                    </select>
                </div>
        </div>
        <div class="card-footer pd-15">
            <button type="submit" class="btn btn-fill btn-info">Enviar</button>
            <button type="reset" class="btn btn-fill btn-danger">Cancelar</button>
        </div>
        </form>
    </div>
</div> 