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
    if (isset($_POST["cliente"])) {
        $nome = trim($_POST["cliente"]);
    }
    if (isset($_POST["prioridade"])) {
        $prioridade = trim($_POST["prioridade"]);
    }
    if (isset($_POST["data_lan"])) {
        $dataLan = trim($_POST["data_lan"]);
    }
    if (isset($_POST["data_ent"])) {
        $dataEnt = trim($_POST["data_ent"]);
    }
    if (isset($_POST["qtde"])) {
        $qtde = trim($_POST["qtde"]);
    }
    if (isset($_POST["produto"])) {
        $produto = trim($_POST["produto"]);
    }
    var_dump($produto);
    var_dump($qtde);
    var_dump($dataEnt);
    var_dump($dataLan);
    var_dump($nome);
    var_dump($prioridade);
    if (empty($id)) {
        $sql = "INSERT INTO pedido values (null,?,?,?,?,?,?)";
        //instanciar o sql na conexao  (pdo) e preparar o sql para ser executado
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1, $qtde);
        $consulta->bindParam(2, $dataEnt);
        $consulta->bindParam(3, $dataLan);
        $consulta->bindParam(4,$nome);
        $consulta->bindParam(5,$prioridade);
        $consulta->bindParam(6,$produto);
    } else {
        $sql = "UPDATE pedido SET qtde_pedido = ? , data_entrega = ? , data_lancamento = ? , idcliente  = ? , id_prioridade = ? , idproduto = ?
        WHERE idpedido = ? LIMIT 1";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1, $qtde);
        $consulta->bindParam(2, $dataEnt);
        $consulta->bindParam(3, $dataLan);
        $consulta->bindParam(4, $nome);
        $consulta->bindParam(5,$prioridade);
        $consulta->bindParam(6,$pro);
    } //verificar para que servpe esse update
    //verifica se o comando sera executado corretamente
    if ($consulta->execute()) {
        $msg = "Inserido com sucesso!!";
        $link = "listar/pedido";
        sucesso($msg,$link);
    }else{
        echo "erroo";
    }
} else {
    //erro
    $msg = "erro ao efuetuar requisição";
    menssagem($msg);
}
 