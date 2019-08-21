<pre>
<?php
//verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";
   
if ($_POST) {
    $idpedido                   = "";
    $data_ent                   = "";
    $data_lan                   = date('Y/m/d');
    $status                     = 0;
    $idcliente                  = "";
    $idfuncionario              = $_SESSION["banco_tcc"]["id"];
    $idproduto                  = "";
    $qtde                       = "";
    $valor                      = "";   
    $prioridade                 = "";
    $statusItemPedido         = 0;
    foreach ($_POST as $key => $value) {
        //echo "<p>$key $value</p>";
        //$key - nome do campo
        //$value - valor do campo (digitado)
        if (isset($_POST[$key])) {
            $$key = trim($value);
        }
    }

    $pdo->beginTransaction();
    if (empty($idpedido)) {
        
        $sql = "INSERT INTO pedido VALUES (NULL,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1, $data_ent);
        $consulta->bindParam(2, $data_lan);
        $consulta->bindParam(3, $status);
        $consulta->bindParam(4, $idcliente);
        $consulta->bindParam(5, $idfuncionario);
        if ($consulta->execute()) {
            $last = $pdo->lastInsertId();
            
            if ($qtde_pdt_estoque >= $qtde) {
                $qtde_pdt_estoque -= $qtde;
                $msg = "pedido Finalizado temos em estoque!!";
                $status = true;
                $sql = "UPDATE produto SET qtde = ? WHERE id = ?  ";
                $consulta = $pdo->prepare($sql);
                $consulta->bindParam(1, $qtde_pdt_estoque);
                $consulta->bindParam(2, $idproduto);
                $consulta->execute();
            } else {
                $msg = "Você não tem produto em estoque !!!";
            }
           
            $sql = "INSERT INTO item_pedido VALUES (?,?,?,?,?,?)";
            $consulta = $pdo->prepare($sql);
            $consulta->bindValue(1, $last);
            $consulta->bindParam(2, $idproduto);
            $consulta->bindParam(3, $qtde);
            $consulta->bindParam(4, $valor);
            $consulta->bindParam(5, $prioridade);
            $consulta->bindParam(6, $status);
            $consulta->execute();
            $pdo->commit();
            sucesso("Inserido com sucesso","listar/pedido");
           
        } else {
            print_r($consulta->errorInfo());
            $pdo->rollBack();
            mensagem("ERRO ao inserir no banco de dados!!!");
        }
    }else {
        $sql = "UPDATE pedido 
                SET data_entrega        = ?
                    ,data_lancamento    = ?
                    ,status             = ?
                    ,idcliente          = ?
                    ,idfuncionario      = ?
                WHERE id = ?
                LIMIT 1
                ";
        $update = $pdo->prepare($sql);
        $update->bindParam(1,$data_ent);
        $update->bindParam(2,$data_lan);
        $update->bindParam(3,$status);
        $update->bindParam(4,$idcliente);
        $update->bindParam(5,$idfuncionario);
        $update->bindParam(6,$idpedido);
        if ($update->execute()) {
            $id = explode('|',$idpedido);
            print_r($id);
            $sql = "UPDATE item_pedido
                    SET idpedido         = ? 
                        ,idproduto       = ?
                        ,qtde            = ?
                        ,valor           = ?
                        ,prioridade      = ?
                        ,status          = ?
                    WHERE idpedido       = ?
                    AND   idproduto      = ?
                    LIMIT 1             
                    ";
            $update = $pdo->prepare($sql);
            print_r($id[0]);
            print_r($idproduto);
            $update->bindParam(1,$id[0]); 
            $update->bindParam(2,$idproduto);
            $update->bindParam(3,$qtde);
            $update->bindParam(4,$valor);
            $update->bindParam(5,$prioridade);
            $update->bindParam(6,$status);
            $update->bindParam(7,$id[0]);
            $update->bindParam(8,$id[1]);
            if ($update->execute()) {
                $pdo->commit();
                $msg = "Atualizado com sucesso!!";
                $link = "listar/pedido";
                sucesso($msg,$link);
                
            }else {
                print_r($update->errorInfo());
                $update->errorInfo();
                $pdo->rollBack();
                echo "erro";
            }

        }else {
            print_r($update->errorInfo());
            $update->errorInfo();
        }

    }
}
