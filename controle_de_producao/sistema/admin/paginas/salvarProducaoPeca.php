<?php
	//iniciar a sessao
	session_start();
	//verificar se o arquivo existe
	if ( file_exists ( "verificalogin.php" ) )
		include "verificalogin.php";
	else
		include "../verificalogin.php";
	//incluir a conexao com o banco de dados
	include "../config/conexao.php";
	include "../config/funcoes.php";
	//verificar se foi enviado algo por post
	//salvar o registro no banco de dados
	if ( isset ( $_GET["idproducao_peca"] ) ) 
		$idproducao_peca = trim( $_GET["idproducao_peca"] );

	if ( $_POST ){
        $idproducao_peca    = "";
        $idfuncionario = "";
		$idpeca 	   = "";
		$qtde	   	   = "";
		$qtde_perdas   = "";
		$prioridade	   = "";
		$observacao	   = 0 ;
		foreach ($_POST as $key => $value) {
			//echo "<p>$key $value</p>";
			//$key - nome do campo
			//$value - qtde_perdas do campo (digitado)
			if (isset($_POST[$key])) {
				$$key = trim($value);
			}
        }
        
		//verificar se existe este personagem no quadrinho
		$sql = "SELECT * FROM item_producao_peca
			where idproducao_peca = ?
			and   idpeca          = ?
			limit 1";
		$consulta = $pdo->prepare($sql);
		$consulta->bindValue(1, $idproducao_peca);
		$consulta->bindValue(2, $idpeca);
		if($consulta->execute()){

        }else{
            print_r($consulta->errorInfo());
        }
		//pegar os dados
		$dados = $consulta->fetch(PDO::FETCH_OBJ);
		//verificar se trouxe algum dado
		if ( !empty($dados->idpeca ) ) {
			mensagem("Já existe um produto cadastrado!!");
		} else {
			//gravar o personagem e o quadrinho no banco
            $sql = "INSERT into item_producao_peca values (?,?,?,?,?,?,?)";
			$consulta = $pdo->prepare($sql);
			$consulta->bindValue(1, $idpeca);
            $consulta->bindValue(2, $idproducao_peca);
			$consulta->bindValue(3, $qtde);
			$consulta->bindValue(4, $qtde_perdas);
			$consulta->bindValue(5, $prioridade);
            $consulta->bindValue(6, $idfuncionario);
            $consulta->bindValue(7, $observacao);
			
			if ( $consulta->execute()) {
				$link = "salvarProducaoPeca.php?idproducao_peca=$idproducao_peca";
				sucesso("inserido com sucesso!!",$link);
			} else {
				$erro = $consulta->errorInfo();
				print_r( $erro );
				$link = "salvarProuducaoPeca.php?idproducao_peca=$idproducao_peca";
		
				
			}
		}
	}
    //selecionar todos os personagens deste quadrinho
	$sql = "SELECT *
		from item_producao_peca
		where idproducao_peca = ?
		order by idpeca";
	$consulta = $pdo->prepare($sql);
	$consulta->bindValue(1,$idproducao_peca);
	if($consulta->execute()){

	}else{
		print_r($consulta->errorInfo());
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Adicionar peças a Produção:</title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/all.min.css">
</head>
<body>
<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<td>idproducao</td>
			<td>idpeca</td>
			<td>qtde</td>
			<td>qtde_perdas</td>
			<td>prioridade</td>
            <td>idfuncionario</td>
            <td>observação</td>
			<td>Excluir</td>
		</tr>
	</thead>

	<?php
	//mostrar os resultados
	while ( $dados = $consulta->fetch(PDO::FETCH_OBJ) ) {
		$idproducao_peca 		= $dados->idproducao_peca;
		$idpeca 		= $dados->idpeca;
		$qtde			= $dados->qtde;
		$qtde_perdas    = $dados->qtde_perdas;
		$prioridade	    = $dados->prioridade;
        $idfuncionario  = $dados->idfuncionario;
        $observacao     = $dados->observacao;
		echo "<tr>
			<td>$idproducao_peca</td>
			<td>$idpeca</td>
			<td>$qtde</td>
			<td>$qtde_perdas</td>
			<td>$prioridade</td>
            <td>$idfuncionario</td>
            <td>$observacao</td>
			<td>
				<a href='javascript:excluir($idproducao_peca,$idpeca)'
				class='btn btn-danger'>
					<i class='fas fa-trash'></i>
				</a>
			</td>
		</tr>";
	}
	?>
</table>
<script type="text/javascript">
	//funcao para excluir
	function excluir(idproducao,idpeca){
		if ( confirm ( "Deseja mesmo excluir?" ) ){
			//enviar para uma página para excluir
			location.href='../excluir/item_pedido/'+idproducao+'/'+idpeca;
		}
	}
</script>
</body>
</html>