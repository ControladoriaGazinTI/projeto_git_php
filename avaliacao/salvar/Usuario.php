<?php
 //verificar se a sessão esta ativa
 require_once 'Usuario.php';
 var_dump($_POST);

	$pdo->beginTransaction();
	//se os dados vieram por POST
	if ( $_POST ) {
		//iniciar as variaveis
        $id             = "";
        $data_nasc      = "";
        $data_test      = "";
        $sexo           = "";
        $cpf            = "";
        $altura         = "";
        $peso           = "";
        $rusultado      = "";
		//recuperar as variaveis
		foreach ($_POST as $key => $value) {
			//echo "<p>$key $value</p>";
			//$key - nome do campo
			//$value - valor do campo (digitado)
			if ( isset ( $_POST[$key] ) ) {
				$$key = trim ( $value );
			} 
        }
    }