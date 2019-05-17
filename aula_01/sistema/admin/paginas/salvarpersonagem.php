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

	echo $id; 

