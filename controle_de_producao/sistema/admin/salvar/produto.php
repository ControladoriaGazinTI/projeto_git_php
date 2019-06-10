<?php
 //verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";
if ($_POST) {
    if (isset($_POST["id"])) {
        $id = trim($_POST["id"]);
    }
    if (isset($_POST["nome"])) {
        $nome = trim($_POST["nome"]);
    }
    if (isset($_POST["valor"])) {
        $valor = trim($_POST["valor"]);
    }
    if (isset($_POST["qtde"])) {
        $qtde = trim($_POST["qtde"]);
    }
    if (isset($_POST["idcategoria"])){
        $idcategoria = trim($_POST["idcategoria"]);
    }
    if (isset($_POST["cor"])){
        $cor = trim($_POST["cor"]);
    }
    if (isset($_POST["foto"])){
        $foto = trim($_POST["foto"]);
    }
    if (isset($_POST["descricao"])){
        $descricao = trim($_POST["descricao"]);
    }
    
    if (empty($id)) {
        $sql = "INSERT INTO produto values (
                                                null,
                                                    ?,
                                                    ?,
                                                    ?,
                                                    ?,
                                                    ?,
                                                    ?,
                                                    ?
                                           )";
        //instanciar o sql na conexao  (pdo) e preparar o sql para ser executado
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1, $nome);
        $consulta->bindParam(2, $qtde);
        $consulta->bindParam(3, $valor);
        $consulta->bindParam(4, $foto);
        $consulta->bindParam(5, $descricao);
        $consulta->bindParam(6, $cor);
        $consulta->bindParam(7, $idcategoria);
    } else {
        $sql = "UPDATE produto SET nome         = ? 
                                 , qtde         = ?
                                 , valor        = ? 
                                 , foto         = ? 
                                 , descricao    = ? 
                                 , cor          = ? 
                                  idcategoria   = ? 
                                  WHERE id = ? LIMIT 1";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1, $nome);
        $consulta->bindParam(2, $qtde);
        $consulta->bindParam(3, $valor);
        $consulta->bindParam(4, $foto);
        $consulta->bindParam(5, $descricao);
        $consulta->bindParam(6, $cor);
        $consulta->bindParam(7, $idcategoria);
        $consulta->bindParam(8, $id);
    } //verificar para que serve esse update
    //verifica se o comando sera executado corretamente
    //executar
		if ( $consulta->execute() ) {


			

			//se a capa não estiver vazio - copiar
			if ( !empty ( $_FILES["foto"]["name"] ) ) {
				echo $_FILES["foto"]["name"];
				//copiar o arquivo para a pasta

				if ( !copy( $_FILES["capa"]["tmp_name"], 
					"../fotos/".$_FILES["capa"]["name"] )) {

					$msg = "Erro ao copiar foto";
					mensagem( $msg );
				}

				//echo $capa;

				$pastaFotos = "../fotos/";
				$imagem = $_FILES["capa"]["name"];

				redimensionarImagem($pastaFotos,$imagem,$capa);
			}
			
			//salvar no banco
			$pdo->commit();

			$msg = "Registro inserido com sucesso!";
			sucesso( $msg, "listar/quadrinho" );

		} else {
			//erro do sql
			echo $consulta->errorInfo()[2];
			exit;
			$msg = "Erro ao salvar quadrinho";
			mensagem( $msg );
		}


	} else {
		//se não foi veio do formulario
		$msg = "Requisição inválida";
		mensagem( $msg );
	}

	
 