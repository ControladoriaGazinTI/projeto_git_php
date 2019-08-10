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
 
    if (empty($id)) {
        $sql = "INSERT INTO categoria values (null,?)";
        //instanciar o sql na conexao  (pdo) e preparar o sql para ser executado
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1, $nome);
    } else {
        $sql = "UPDATE categoria SET nome = ?  WHERE id = ? LIMIT 1";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1, $nome);
        $consulta->bindParam(2, $id);
    } //verificar para que serve esse update
    //verifica se o comando sera executado corretamente
    if ($consulta->execute()) {
        $msg = "Inserido com sucesso!!";
        $link = "listar/categoria";
        sucesso($msg,$link);
    }else{
        echo "erroo";
    }
} else {
    //erro
    $msg = "erro ao efuetuar requisição";
    mensagem($msg);
}
