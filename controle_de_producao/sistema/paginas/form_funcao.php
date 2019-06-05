<div>
    <div class="card stacked-form">
        <div class="card-header pd-15-3-t">
            <h4 class="card-title">Cadastro de Função:</h4>
        </div>
        <div class="card-body pd-15">
            <form method="POST" action="cad_cliente.php">
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" placeholder="Digite o nome da função:" class="form-control" maxlength="50" required=""
                     name="nome_cliente">
                </div>
                <div class="form-group">
                    <label>Descrição da função:</label>
                    <textarea name="" cols="10" rows="3" class="form-control" maxlength="200" placeholder="Digite a descrição da função:"></textarea>
                </div>
        </div>
        <div class="card-footer pd-15">
            <button type="submit" class="btn btn-fill btn-info">Enviar</button>
            <button type="reset" class="btn btn-fill btn-danger">Cancelar</button>
        </div>
        </form>
    </div>
</div> 