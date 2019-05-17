<?php
	//verificar se o arquivo existe
	if ( file_exists ( "verificalogin.php" ) )
		include "verificalogin.php";
	else
		include "../verificalogin.php";
?>
<div class="container">
	<div class="coluna">
		<h1 class="float-left">Cadastro de Clientes</h1>

		<div class="float-right">
			<a href="cadastros/cliente" class="btn btn-success">
				<i class="fas fa-file"></i> Novo
			</a>

			<a href="listar/cliente" class="btn btn-info">
				<i class="fas fa-search"></i> Listar
			</a>
		</div>

		<div class="clearfix"></div>

