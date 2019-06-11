<?php
//verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";

$id       = "";
$nome     = "";
$foto     = "";

//$p =[1]  index.php (id-cadastro)
if (isset($p[2])) {
    //selecioar os dados  conforme o id
    $sql = "SELECT * FROM peca WHERE id = ? limit 1";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(1, $p[2]);
    $consulta->execute();
    //recuperar dados
    $dados = $consulta->fetch(PDO::FETCH_OBJ);

    $id         = $dados->id;
    $nome       = $dados->nome;
}

?>
<div>
    <div class="card stacked-form">
        <div class="card-header pd-15-3-t">
            <h4 class="card-title">Cadastro de Peças:</h4>
        </div>
        <div class="card-body pd-15">
            <form method="POST" action="salvar/peca" enctype="multipart/form-data" >
                <div class="form-group">
                    <label for="id">ID:</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        name="id" 
                        readonly 
                        value="<?= $id; ?>"
                        >
                </div>
                <div class="form-group">
                    <label>Nome:</label>
                    <input 
                        type="text" 
                        name="nome" 
                        class="form-control" 
                        0placeholder="Digite o nome da função:" 
                        maxlength="50" 
                        required 
                        value="<?= $nome; ?>" 
                        >
                </div>
                <div class="form-group">
                    <label for="">Quatidade em Estoque:</label>
                    <input 
                        type            ="number" 
                        name            ="qtde"
                        class           ="form-control" 
                        required        ="required"
                    >
                </div>
                <?php
                    $r = " required data-parsley-required-message=\"Selecione um arquivo\" ";
                    //se o id nao esta vazio esta editando
                    if ( !empty ( $id ) ) {
                        //zerar o r para o campo não ser requerido
                        $r = "";
                        //montar um input com o numero da foto
                        echo "<input type='hidden' name='foto' value='<?=$foto;?>'>";
                    }
			    ?>

                <label for="foto">Foto da Capa (JPG):</label>
                <input type="file" name="foto"
                class="form-control"
                <?=$r;?>
                accept=".jpg">

                <?php
                    //mostrar a foto se estiver editando
                    if ( !empty ( $id ) ) {
                        // 12345 -> ../fotos/12345p.jpg
                        //muda o nome do arquivo
                        $foto = "../fotos/".$foto."p.jpg";
                        //mostra o arquivo dentro do img
                        echo "<br><img src='$foto' width='80px'><br>";
                    }
                ?>
        </div>
        <div class="card-footer pd-15">
            <button type="submit" class="btn btn-fill btn-success">Cadastrar</button>
        </div>
        </form>
    </div>
</div>