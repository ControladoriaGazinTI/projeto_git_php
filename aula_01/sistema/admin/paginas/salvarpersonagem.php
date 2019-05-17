<?php
	//iniciar a sessao
	session_start();

	//verificar se o arquivo existe
	if ( file_exists ( "verificalogin.php" ) )
		include "verificalogin.php";
	else
		include "../verificalogin.php";

	$id = "";
	if ( isset ( $_GET["id"] ) ) 
		$id = trim( $_GET["id"] );
	if(isset($_POST["id"])){
		$id = trim($_POST["id"]);
	}
	if(empty($id)){
		echo "<script>alert('Erro ao gravar informação');</script>";
	}
	//incluir a conexao com o banco de dados
	include "../config/conexao.php";
	include "../config/funcoes.php";
	//verificar se foi enviado  algo por post
	//salvar o registro no banco de dados
	if($_POST){
		$personagem_id = trim($_POST["personagem_id"]);
		$sql ="SELECT * FROM quadrinho_personagem 
			   WHERE quadrinho_id = :quadrinho 
			   AND personagem_id = :personagem 
			   LIMIT 1";
			   $consulta = $pdo->prepare($sql);
			   $consulta->bindValue(":quadrinho",$id);
			   $consulta->bindValue(":personagem",$personagem_id);
			   $consulta->execute();
			   //pegar os dados
			   $dados = $consulta->fetch(PDO::FETCH_OBJ);
			   //VERIFICAR SE TROUXE algum dado
			   if(!empty($dados->personagem_id)){
				   mensagem("Já existe um personagem cadastrado neste quadrinho");
			   }else{
				   //gravar o personagem e o quadrinho no banco
				   $sql = "INSERT INTO quadrinho_personagem (quadrinho_id,personagem_id) values (:quadrinho,:personagem)";
				   $consulta = $pdo->prepare($sql);
				   $consulta->bindValue(":quadrinho",$id);
				   $consulta->bindValue(":personagem",$personagem_id);
				   if($consulta->execute()){
						$link = "salvarpersonagem.php?id=$id";
						
						sucesso("Personagem salvo",$link);
				   }else{
						$link = "salvarpersonagem.php?id=$id";
						//$erro = $consulta->errorInfo();
						//print_r($erro);
						//exit;
						mensagem("Erro ao inserir personagem");
						
				   }
				}

	}
	//selecionar todos os personagens deste quadrinho
	$sql = "SELECT p.nome,qp.quadrinho_id,qp.personagem_id
			FROM quadrinho_personagem p ON (p.id = qp.personagem_id) WHERE qp.quadrinho_id = :quadrinho ORDER BY p.nome";
			$consulta = $pdo->prepare($sql);
			$consulta->bindValue(":quadrinho",$id,PDO::PARAM_INT);
			$consulta-excute();

