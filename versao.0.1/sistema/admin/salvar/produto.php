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
    if (isset($_POST["nome_produto"])) {
        $nome = trim($_POST["nome_produto"]);
    }
    if (isset($_POST["valor"])) {
        $valor = trim($_POST["valor"]);
    }
    if (isset($_POST["qtde"])) {
        $qtde = trim($_POST["qtde"]);
    }
    if (isset($_POST["categoria"])){
        $categoria = trim($_POST["categoria"]);
    }
    if (empty($id)) {
        $sql = "INSERT INTO produto values (null,?,?,?,?)";
        //instanciar o sql na conexao  (pdo) e preparar o sql para ser executado
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1, $nome);
        $consulta->bindParam(2, $valor);
        $consulta->bindParam(3, $qtde);
        $consulta->bindParam(4, $categoria);
    } else {
        $sql = "UPDATE produto SET nome = ? 
                                 , valor = ? 
                                 , qtde = ?,
                                  id = ? 
                                  WHERE idproduto = ? LIMIT 1";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1, $nome);
        $consulta->bindParam(2, $valor);
        $consulta->bindParam(3, $qtde);
        $consulta->bindParam(4, $categoria);
        $consulta->bindParam(5, $id);
    } //verificar para que serve esse update
    //verifica se o comando sera executado corretamente
    if ($consulta->execute()) {
        $msg = "Inserido com sucesso!!";
        $link = "listar/produto";
        sucesso($msg,$link);
    }else{
        echo "erroo";
    }
} else {
    //erro
    $msg = "erro ao efuetuar requisição";
    menssagem($msg);
}
 