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
    $idproducao             = "";
    $statusProducao         = false;
    $statusItemProducao     = false;
    $idproduto              = "";
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
        $sql = "INSERT INTO producao VALUES (NULL,?,?,?,?)";
        $insert = $pdo->prepare($sql);
        $insert->bindParam(1, $idFuncionarioLogado);
        $insert->bindParam(2, $data_ent);
        $insert->bindValue(3, $data_lan);
        $insert->bindParam(4, $statusProducao);
        if ($insert->execute()) {
            $idproducao = $pdo->lastInsertId();

            $sql = "INSERT INTO item_producao VALUES (?,?,?,?,?,?,?,?)";
            $insert = $pdo->prepare($sql);
            $insert->bindParam(1, $idproduto);
            $insert->bindParam(2, $idproducao);
            $insert->bindParam(3, $idfuncionario);
            $insert->bindParam(4, $prioridade);
            $insert->bindParam(5, $qtde);
            $insert->bindParam(6, $qtde_perdas);
            $insert->bindParam(7, $statusItemProducao);
            $insert->bindParam(8, $observacao);


            if ($insert->execute()) {
                $pdo->commit();
                sucesso("Cadastratado com sucesso!!!", "listar/producao");
            } else {
                $pdo->rollBack();
                print_r($insert->errorInfo());
            }
        }else {
            $pdo->rollBack();
            print_r($insert->errorInfo());
        }
    }else {
        # code...
    }
}
