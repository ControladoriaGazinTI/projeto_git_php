<div>
    <div class="card stacked-form">
        <div class="card-header pd-15-3-t">
            <h4 class="card-title">Cadastro de produção:</h4>
        </div>
        <div class="card-body pd-15">
            <form method="POST" action="salvar/producao" enctype="multipart/form-data">
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
                    <label>Produto:</label>
                    <select 
                        name        = "idproduto" 
                        class       = "form-control" 
                        required    = ""
                    >
                        <option value=""></option>
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
                            <option value= "Baixa">Baixa</option>
                            <option value= "Média">Media</option>
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
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Data entrega:</label>
                        <input 
                            name        ="data_ent"
                            type        ="date"
                            class       ="form-control"
                            required
                        >
                    </div>
                    <div class="form-group col-md-6">
                        <label>Data Lançamento:</label>
                        <input
                            name        ="data_lan" 
                            type        ="date"
                            class       ="form-control"
                            required
                        >
                    </div>
                </div>
                <div class="form-group">
                <label for="descricao">Observação sobre a produção:</label>
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
        </div>
        </form>
    </div>
</div> 
<script type="text/javascript">
	$(document).ready(function() {
		//aplicar o summernote
		$("#descricao").summernote({
			height: 200,
            lang: 'pt-BR',
            theme: 'monokai'
		});
    })
    </script>
     <script type="text/javascript">
        $(document).ready(function() {
            //aplica a mascara de valor no campo
            $("#valor").maskMoney({
                thousands: ".",
                decimal: ","
            });
        })
    </script>