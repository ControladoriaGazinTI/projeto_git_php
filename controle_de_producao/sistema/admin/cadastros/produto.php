<?php
 //verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";

    $id             = ""; 
    $nome           = "";
    $valor          = "";
    $qtde           = "";
    $foto           = "";
    $cor            = "";
    $descricao      = "";
    $idcategoria    = "";
    $nome_cat       = "";
//$p =[1]  index.php (id-cadastro)
if (isset($p[2])) {
    //selecioar os dados  conforme o id
    $sql =
               "SELECT produto.* , categoria.nome as nome_cat
               FROM produto 
               INNER JOIN categoria ON categoria.id =  produto.idcategoria
               WHERE produto.id = ? LIMIT 1";
                
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(1, $p[2]);
    $consulta->execute();
    //recuperar dados
    $dados = $consulta->fetch(PDO::FETCH_OBJ);

    $id             = $dados->id; 
    $nome           = $dados->nome;
    $valor          = $dados->valor;
    $qtde           = $dados->qtde;
    $foto           = $dados->foto;
    $cor            = $dados->cor;
    $descricao      = $dados->descricao;
    $idcategoria    = $dados->idcategoria;
    $nome_cat       = $dados->nome_cat;
}
?>
<div>
    <div class="card stacked-form">
        <div class="card-header pd-15-3-t">
            <h4 class="card-title">Cadastro de Produto:</h4>
        </div>
        <div class="card-body pd-15">
            <form method="POST" action="salvar/produto" enctype="multipart/form-data" >
            <div class="form-group">
                    <label for="id">ID:</label>
                    <input 
                        type            = "text" 
                        name            = "id" 
                        class           = "form-control" 
                        readonly        =  ""
                        value           = "<?=$id ;?>"
                    >
                </div>
                <div class="form-group">
                    <label>Nome:</label>
                    <input 
                        type            = "text" 
                        name            = "nome" 
                        class           = "form-control" 
                        placeholder     = "Digite o nome do Produto:" 
                        maxlength       = "50" 
                        required        = ""
                        value           = "<?=$nome;?>"
                    >
                </div>
                <div class="form-group">
                    <label>Categoria:</label>
                    <select name="idcategoria" class="form-control" required="" >
                        <option value="<?=$idcategoria ;?>"><?=$nome_cat ;?></option>
                        <?php
                             //selecionar os dados do tipo do quadrinhos
                            $sql = "SELECT * FROM categoria";
                            $consulta = $pdo->prepare($sql);
                            $consulta->execute();
                            //laço de repetição para separar  as Linhas
                            while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) {
                                //separar os dados 
                                $idcategoria = $linha->id;
                                $nome  = $linha->nome;
                                
                                //montar linhas e colunas das tabelas
                                echo 
                                    "
                                        <option value='$idcategoria'>$nome</option>   
                                    ";
                            }
                        ?>
                    </select>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Valor do produto:</label>
                        <input 
                            type            = "number" 
                            name            = "valor" 
                            class           = "form-control" 
                            required        = ""
                            value           = "<?=$valor;?>"
                        >
                    </div>
                    <div class="form-grop col-md-6">
                        <label>Quantidade em estoque:</label>
                        <input 
                            type            = "number" 
                            name            = "qtde" 
                            class           = "form-control" 
                            required        = "required" 
                            value           = "<?=$qtde ;?>"
                        >
                    </div>
                </div>
                    <div class="form-grop">
                        <label>Cor:</label>
                        <input 
                            type            = "text" 
                            name            = "cor" 
                            class           = "form-control" 
                            required        = "required" 
                            maxlength       = "30"
                            value           = "<?=$cor ;?>"
                        >
                    </div>
                    <?php
				$r = " required data-parsley-required-message=\"Selecione um arquivo\" ";
				//se o id nao esta vazio esta editando
				if ( !empty ( $id ) ) {
					//zerar o r para o campo não ser requerido
					$r = "";
					//montar um input com o numero da foto
					echo "<input type='hidden' name='foto' value='$foto'>";
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
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea 
                    id="descricao"
                    name="descricao" 
                    class="form-control"
                    cols="1" 
                    rows="1"
                    maxlength="100"
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
			height: 50,
            lang: 'pt-BR',
            theme: 'monokai'
		});
    })
    </script>