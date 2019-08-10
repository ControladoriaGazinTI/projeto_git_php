<?php
    $cidade = "";
    $estado = "";
    if (isset($_GET["cidade"])) {
        $cidade = trim($_GET["cidade"]);
    }
    if (isset($_GET["estado"])) {
        $estado = trim($_GET["estado"]);
    }
    
    include "config/conexao.php";

    $sql = "SELECT id FROM cidade WHERE cidade = ? AND estado = ? LIMIT 1";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(1,$cidade);
    $consulta->bindParam(2,$estado);
    $consulta->execute();

    $dados = $consulta->fetch(PDO::FETCH_OBJ);

    if (empty($dados->id)) {
        echo "Erro";
    }else {
        echo $dados->id;
    }
