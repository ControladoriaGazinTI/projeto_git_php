<div>
    <div class="card stacked-form">
        <div class="card-header pd-15-3-t">
            <h4 class="card-title">Cadastro do Cliente:</h4>
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
                <div class="form-group">
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
                <div class="form-group">
                    <label>Prioridade do pedido:</label>
                    <select 
                        name        = "prioridade" 
                        class       = "form-control" 
                        required    = ""
                    >
                        <option value= "">Selecione uma prioridade:</option>
                        <option value= "1">Baixa</option>
                        <option value= "2">Media</option>
                        <option value= "3">Alta</option>
                        ?>
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="">Data de lançamento do Pedido:</label>
                        <input 
                            name        = "data_lan"
                            type        = "date" 
                            class       = "form-control" 
                            required    = "required" 
                        >
                    </div>
                    <div class="form-grop col-md-5">
                        <label for="">Data de entrega do pedido:</label>
                        <input 
                            name        = "data_ent"
                            type        = "date" 
                            class       = "form-control" 
                            required    = "required" 
                        >
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Quatidade do pedido:</label>
                    <input 
                        name        = "qtde"
                        type        = "number" 
                        class       = "form-control" 
                        required    = "required" 
                    >
                </div>
                <div class="form-group">
                    <label for="">Valor:</label>
                    <input 
                        name        = "valor"
                        type        = "number" 
                        class       = "form-control" 
                        required    = "required" 
                    >
                </div>
        </div>
        <div class="card-footer pd-15">
            <button type="submit" class="btn btn-fill btn-info">Enviar</button>
            <button type="reset" class="btn btn-fill btn-danger">Cancelar</button>
        </div>
        </form>
    </div>
</div>