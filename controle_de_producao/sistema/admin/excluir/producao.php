<?php
//verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";
//verificar se esta sendo enviado o id
if (isset($p[2])) {
    $id = (int) $p[2];
    //echo"<pre>";
    //var_dump($id);
    //var_dump($p);
    //excluir o quadrinho
    $pdo->beginTransaction();
    $sql = "SELECT 
            item_producao.qtde
            ,item_producao.qtde_perda
            FROM 
            item_producao
            WHERE 
            item_producao.idproducao =  ?
            ";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(1, $id);
     if ($consulta->execute()) {
        $linha = $consulta->fetch(PDO::FETCH_OBJ);
        $qtde = $linha->qtde;
        $qtdePerda = $linha->qtde_perda;
        $conta = $qtde - $qtdePerda;
        $sql = "UPDATE item_producao SET status = 1 WHERE idproducao = ?";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1,$id);
        if($consulta->execute()){
            $pdo->commit();
            mensagem("Produção finalizada!!");
        }else {
            $pdo->rollBack();
            print_r($consulta->errorInfo());
        }
    } else {
        $msg = "ERRO ao Finalizar o pedido!!!";
        mensagem($msg);
    }
} else {
    $msg = "Ocorreu um erro ao atualizar!!!";
    mensagem($msg);
}
