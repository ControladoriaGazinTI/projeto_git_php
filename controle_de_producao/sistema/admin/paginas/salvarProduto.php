<pre>
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
	if ( isset ( $_GET["idpedido"] ) ) 
		$id = trim( $_GET["idpedido"] );

	if ( $_POST ){
		print_r($_POST);
		$idpedido  	   = "";
		$idproduto 	   = "";
		$qtde	   	   = "";
		$valor	   	   = "";
		$prioridade	   = "";
		$status		   = 0 ;
		foreach ($_POST as $key => $value) {
			//echo "<p>$key $value</p>";
			//$key - nome do campo
			//$value - valor do campo (digitado)
			if (isset($_POST[$key])) {
				$$key = trim($value);
			}
		}
		//verificar se existe este personagem no quadrinho
		$sql = "SELECT * FROM item_pedido
			where idpedido = ?
			and   idproduto = ?
			limit 1";
		$consulta = $pdo->prepare($sql);
		$consulta->bindValue(1, $idpedido);
		$consulta->bindValue(2, $idproduto);
		$consulta->execute();
		//pegar os dados
		$dados = $consulta->fetch(PDO::FETCH_OBJ);
		//verificar se trouxe algum dado
		if ( !empty($dados->idproduto ) ) {
			mensagem("Já existe um personagem cadastrado neste quadrinho");
		} else {
			//gravar o personagem e o quadrinho no banco
			$sql = "INSERT into item_pedido values (?,?,?,?,?,?)";
			$consulta = $pdo->prepare($sql);
			$consulta->bindValue(1, $idpedido);
			$consulta->bindValue(2, $idproduto);
			$consulta->bindValue(3, $qtde);
			$consulta->bindValue(4, $valor);
			$consulta->bindValue(5, $prioridade);
			$consulta->bindValue(6, $status);
			
			if ( $consulta->execute()) {
				$link = "salvarProduto.php?idpedido=$idpedido";
				sucesso("Inserido com sucesso!!!",$link);
			} else {
				$erro = $consulta->errorInfo();
				print_r( $erro );
				$link = "salvarProuduto.php?idpedido=$idpedido";
		
				
			}
		}
	}
	//selecionar todos os personagens deste quadrinho
	$sql = "SELECT *
		from item_pedido
		where idpedido = ?
		order by idproduto";
	$consulta = $pdo->prepare($sql);
	$consulta->bindValue(1,$idpedido,PDO::PARAM_INT);
	$consulta->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Adicionar Personagens</title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/all.min.css">
</head>
<body>
<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<td>IDpedido</td>
			<td>IDproduto</td>
			<td>qtde</td>
			<td>valor</td>
			<td>prioridade</td>
			<td>status</td>
		</tr>
	</thead>

	<?php
	//mostrar os resultados
	while ( $dados = $consulta->fetch(PDO::FETCH_OBJ) ) {
		$idpedido 		= $dados->idpedido;
		$idproduto 		= $dados->idproduto;
		$qtde			= $dados->qtde;
		$valor			= $dados->valor;
		$prioridade	    = $dados->prioridade;
		$status		    = $dados->status;
		echo "<tr>
			<td>$idpedido</td>
			<td>$idproduto</td>
			<td>$qtde</td>
			<td>$valor</td>
			<td>$prioridade</td>
			<td>$status</td>
			<td>
				<a href='javascript:excluir($quadrinho_id,$personagem_id)'
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
	function excluir(quadrinho_id,personagem_id){
		if ( confirm ( "Deseja mesmo excluir?" ) ){
			//enviar para uma página para excluir
			location.href='../excluir/quadrinho-personagem/'+quadrinho_id+'/'+personagem_id;
		}
	}
</script>
</body>
</html>