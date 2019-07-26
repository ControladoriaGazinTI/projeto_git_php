<pre>
<?php
 //verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";
if ($_POST) {
    $id             = "";
    $data_ent       = "";
    $data_lan       = "";
    $status         = false;
    $idFuncionario  = $_SESSION["banco_tcc"]["id"];
    $cliente        = "";
    $produto        = "";
    $prioridade     = "";
    $qtde           = "";
    $valor          = "";

    foreach ($_POST as $key => $value) {
        //echo "<p>$key $value</p>";
        //$key - nome do campo
        //$value - valor do campo (digitado)
        if ( isset ( $_POST[$key] ) ) {
            $$key = trim ( $value );
        } 
       
    }
    if (empty($id)) {
        $pdo->beginTransaction();
        $sql = "INSERT INTO pedido VALUES (NULL,?,?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1,$data_ent);
        $consulta->bindParam(2,$data_lan);
        $consulta->bindParam(3,$status);
        $consulta->bindParam(4,$cliente);
        $consulta->bindParam(5,$idFuncionario);
        if ($consulta->execute()) {
            $pdo->lastInsertId();
            $sql = "INSERT INTO item_pedido VALUES (?,?,?,?,?)";
            $consulta = $pdo->prepare($sql);
            $consulta->bindValue(1,$pdo->lastInsertId());
            $consulta->bindParam(2,$produto);
            $consulta->bindParam(3,$qtde);
            $consulta->bindParam(4,$valor);
            $consulta->bindParam(5,$prioridade);
            if($consulta->execute()){
                $pdo->commit();
                sucesso("Cadastrado com sucesso!!!","listar/pedido");
            }else{
                $pdo->rollBack();
                mensagem("ERRO ao inserir no banco de dados!!!");
            }

        }else {
            $pdo->rollback();
            mensagem("ERRO ao inserir no banco de dados!!!");
        }
    }
}
 