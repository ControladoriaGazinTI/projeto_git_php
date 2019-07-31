<?php
//verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";
//verificar se esta sendo enviado o id
if (isset($p[2])) {
    $id = (int) $p[2];
    $idproduto = (int) $p[3];
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
        $sql = "SELECT qtde  from produto where id = ?";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1 ,$idproduto);
        if($consulta->execute()){
        $linha = $consulta->fetch(PDO::FETCH_OBJ);
        $qtde = $linha->qtde;
        $conta = $conta + $qtde;
        }else {
            print_r($consulta->errorInfo());
        }
        $sql = "UPDATE item_producao SET status = 1 WHERE idproducao = ?";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1, $id);
        if ($consulta->execute()) {
            $sql = "UPDATE produto SET qtde = ? WHERE id = ?";
            $consulta = $pdo->prepare($sql);
            $consulta->bindParam(1, $conta);
            $consulta->bindParam(2, $idproduto);
            if ($consulta->execute()) {
                $pdo->commit();
                mensagem("Produção finalizado com sucesso!!!");
            } else {
                $pdo->rollback();
                print_r($consulta->errorInfo());
            }
        } else {
            $pdo->rollBack();
            print_r($consulta->errorInfo());
        }
    } else {
        $pdo->rollBack();
        print_r($consulta->errorInfo());
    }
} else {
    $msg = "Erro parametro!!!";
}
