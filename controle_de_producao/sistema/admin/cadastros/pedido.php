<div>
    <div class="card stacked-form">
        <div class="card-header pd-15-3-t">
            <h4 class="card-title">Cadastro do Cliente:</h4>
        </div>
        <div class="card-body pd-15">
            <form method="POST" action="salvar/pedido">
                <div class="form-group">
                    <label for="id">ID:</label>
                    <input type="text" class="form-control" name="id" readonly value="">
                </div>
                <div class="form-group">
                    <label>Cliente:</label>
                    <select name="cliente" id="" class="form-control" required="">
                        <option value="">Selecione um cliente:</option>
                        <?php
                                                                                        //selecionar os dados do tipo do quadrinhos
                                                                                        $sql = "SELECT * FROM cliente ORDER BY nome_cli";
                                                                                        $consulta = $pdo->prepare($sql);
                                                                                        $consulta->execute();
                                                                                        //laço de repetição para separar  as Linhas
                                                                                        while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) {
                                                                                            //separar os dados 
                                                                                            $id = $linha->idcliente;
                                                                                            $nome  = $linha->nome_cli;

                                                                                            //montar linhas e colunas das tabelas
                                                                                            echo
                                                                                                "
                                       <option value='$id'>$nome</option>   
                                   ";
                                                                                        }
                                                                                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Produto:</label>
                    <select name="produto" id="" class="form-control" required="">
                        <option value="">Selecione um cliente:</option>
                        <?php
                                                                                        //selecionar os dados do tipo do quadrinhos
                                                                                        $sql = "SELECT * FROM produto ORDER BY nome";
                                                                                        $consulta = $pdo->prepare($sql);
                                                                                        $consulta->execute();
                                                                                        //laço de repetição para separar  as Linhas
                                                                                        while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) {
                                                                                            //separar os dados 
                                                                                            $id = $linha->idproduto;
                                                                                            $nome  = $linha->nome;

                                                                                            //montar linhas e colunas das tabelas
                                                                                            echo
                                                                                                "
                                       <option value='$id'>$nome</option>   
                                   ";
                                                                                        }
                                                                                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Prioridade do pedido:</label>
                    <select name="prioridade" id="" class="form-control" required="">
                        <option value="">Selecione uma prioridade:</option>
                        <?php
                                                                                        //selecionar os dados do tipo do quadrinhos
                                                                                        $sql = "SELECT * FROM prioridade ORDER BY nome_prio";
                                                                                        $consulta = $pdo->prepare($sql);
                                                                                        $consulta->execute();
                                                                                        //laço de repetição para separar  as Linhas
                                                                                        while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) {
                                                                                            //separar os dados 
                                                                                            $id = $linha->idprioridade;
                                                                                            $nome  = $linha->nome_prio;

                                                                                            //montar linhas e colunas das tabelas
                                                                                            echo
                                                                                                "
                                       <option value='$id'>$nome</option>   
                                   ";
                                                                                        }
                                                                                        ?>
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="">Data de lançamento do Pedido:</label>
                        <input type="date" class="form-control" required="required" name="data_lan">
                    </div>
                    <div class="form-grop col-md-5">
                        <label for="">Data de entrega do pedido:</label>
                        <input type="date" class="form-control" required="required" name="data_ent">
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Quatidade do pedido:</label>
                    <input type="number" class="form-control" required="required" name="qtde">
                </div>
        </div>
        <div class="card-footer pd-15">
            <button type="submit" class="btn btn-fill btn-info">Enviar</button>
            <button type="reset" class="btn btn-fill btn-danger">Cancelar</button>
        </div>
        </form>
    </div>
</div>