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
    $pdo->beginTransaction();
    // fazer consulta na tabela item de produção 
    // para fazer uma conta que pega a quantidade 
    // produzida menos a quantidade de perdas e
    // salva numa variavel $conta
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
        $linha      = $consulta->fetch(PDO::FETCH_OBJ);
        $qtde       = $linha->qtde;
        $qtdePerda  = $linha->qtde_perda;

        // conta recebe só os produtos que não tiveram problemas
        $conta = $qtde - $qtdePerda;

        // fazer consulta na tabela produto para pegar a qtde de
        // produto atualizado e somar com a quantidade que foi produzida
        $sql = "SELECT qtde  from produto where id = ?";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1, $idproduto);
        if ($consulta->execute()) {
            $linha = $consulta->fetch(PDO::FETCH_OBJ);
            $qtde = $linha->qtde;
            //conta recebe qtde em estoque + a qtde produzida
            $conta = $conta + $qtde;
        } else {
            print_r($consulta->errorInfo());
        }
        // atualizar status de, em andamento vai para comcluido
        $sql = "UPDATE item_producao SET status = 1 WHERE idproducao = ?";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1, $id);
        if ($consulta->execute()) {
            //se excutar o atualizar do status entao 
            //atualiza a quatidade de produto no estoque
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
    $pdo->rollBack();
    print_r($consulta->errorInfo());
}
