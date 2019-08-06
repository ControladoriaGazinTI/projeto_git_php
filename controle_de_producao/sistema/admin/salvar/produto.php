<?php
 //verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";
	$pdo->beginTransaction();

	//se os dados vieram por POST
	if ( $_POST ) {
		//iniciar as variaveis
        $id             = "";
        $nome           = "";
        $idcategoria    = "";
        $valor          = "";
        $qtde           = "";
        $cor            = "";
        $foto           = "";
        $descricao      = "";


		//recuperar as variaveis
		foreach ($_POST as $key => $value) {
			//echo "<p>$key $value</p>";
			//$key - nome do campo
			//$value - valor do campo (digitado)
			if ( isset ( $_POST[$key] ) ) {
				$$key = trim ( $value );
			} 
		}
    if (empty($id)) {

        $foto = time();

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
                                 , idcategoria   = ? 
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
				//copiar o arquivo para a pasta

				if ( !copy( $_FILES["foto"]["tmp_name"], 
					"../fotos/".$_FILES["foto"]["name"] )) {
					$msg = "Erro ao copiar foto";
					mensagem( $msg );
				}
				//echo $capa;
				$pastaFotos = "../fotos/";
				$imagem = $_FILES["foto"]["name"];
				redimensionarImagem($pastaFotos,$imagem,$foto);
			}
			
			//salvar no banco
			$pdo->commit();
			$msg = "Registro inserido com sucesso!";
			

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