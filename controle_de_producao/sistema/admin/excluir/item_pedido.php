<?php
	//verificar se o arquivo existe
	if ( file_exists ( "verificalogin.php" ) )
		include "verificalogin.php";
	else
		include "../verificalogin.php";
	//iniciar as variaveis
	$idpedido = $idproduto = "";
	//recuperar as variaveis
	//$p[0] - excluir
	//$p[1] - quadrinho-personagem
	//$p[2] - id do quadrinho
	//$p[3] - id do personagem
	if ( isset ( $p[2] ) )
		$idpedido = trim( $p[2] );
	if ( isset ( $p[3] ) )
		$idproduto = trim( $p[3] );
	//verificar se algum esta em branco
	if ( ( empty ( $idpedido ) ) or ( empty ( $idproduto ) ) ) {
		mensagem("Erro ao excluir");
	} else {
		$sql = "DELETE from item_pedido
		where idpedido = ?
		and   idproduto = ? 
		limit 1";
		$consulta = $pdo->prepare($sql);
		$consulta->bindValue(1,$idpedido);
		$consulta->bindValue(2,$idproduto);
		if ( $consulta->execute() ){
			$link = "paginas/salvarProduto.php?idpedido=$idpedido";
			sucesso("Registro excluido",$link);
		} else {
			mensagem("Erro ao excluir");
		}
	}