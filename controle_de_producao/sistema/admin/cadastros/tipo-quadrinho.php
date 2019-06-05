<?php
 //verificar se a sessão esta ativa
if(file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php"
?>
<div class="container">
    <div class="coluna">
        <h1 class="float-left">
            Cadastro de tipo de quandrinhos
        </h1>
        <div class="float-right">
            <a href="cadastros/tipo-quadrinho" class="btn btn-success">Novo</a>
            <a href="listar/tipo-quadrinho" class="btn btn-info">Lista</a>
        </div> 
        <div class="clearfix"></div>
        <form action="salvar/tipo-quadrinho" name="cadastro" method="POST" data-parsley-validate>
            <label for="id">ID:</label>
            <input type="text" class="form-control" name="id" readonly>
            <br>
            <label for="tipo">
                Tipo de quadrinho:
            </label>
            <input type="text" class="form-control" name="tipo" required="required" data-parsley-required-message="<i class='fas fa-info-circle'></i>Por favor preencha este campo">
            <br>
            <button class="btn btn-success float-right" type="submit"><i class="fas fa-check"></i> Gravar</button>
            <div class="clearfix"></div>
        </form>
    </div>
</div>
 