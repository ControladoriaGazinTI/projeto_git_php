<pre>
<?php
//verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";
if ($_POST) {
    $id                     = "";
    $idfuncionario          = "";
    $idFuncionarioLogado    = $_SESSION["banco_tcc"]["id"];
    $idproducao_peca        = "";
    $statusProducao_peca    = false;
    $statusItemProducao_peca = false;
    $idpeca                 = "";
    $prioridade             = "";
    $qtde                   = "";
    $qtde_perdas            = "";
    $data_ent               = "";
    $data_lan               = date('Y/m/d');
    $observacao             = "";

    foreach ($_POST as $key => $value) {
        if (isset($_POST[$key])) {
            $$key = trim($value);
        }
    }
    if (empty($id)) {
        $pdo->beginTransaction();
        $sql = "INSERT INTO producao_peca VALUES (NULL,?,?,?,?,?)";
        $insert = $pdo->prepare($sql);
        $insert->bindValue(1, $data_lan);
        $insert->bindParam(2, $data_ent);
        $insert->bindParam(3, $statusProducao_peca);
        $insert->bindParam(4, $idFuncionarioLogado);
        $insert->bindParam(5, $observacao);
        if ($insert->execute()) {
            $idproducao_peca = $pdo->lastInsertId();

            $sql = "INSERT INTO item_producao_peca VALUES (?,?,?,?,?,?,?)";
            $insert = $pdo->prepare($sql);
            $insert->bindParam(1, $idpeca);
            $insert->bindParam(2, $idproducao_peca);
            $insert->bindParam(3, $qtde);
            $insert->bindParam(4, $qtde_perdas);
            $insert->bindParam(5, $prioridade);
            $insert->bindParam(6, $idfuncionario);
            $insert->bindParam(7, $statusItemProducao_peca);
            


            if ($insert->execute()) {
                $pdo->commit();
                sucesso("Cadastratado com sucesso!!!", "listar/producaoPeca");
            } else {
                $pdo->rollBack();
                print_r($insert->errorInfo());
            }
        }else {
            $pdo->rollBack();
            print_r($insert->errorInfo());
            echo "erro no primeiro";
        }
    }else {
        # code...
    }
}
