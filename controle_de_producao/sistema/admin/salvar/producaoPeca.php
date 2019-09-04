<pre>
<?php
//verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";
if ($_POST) {
    $idproducao             = "";
    $idFuncionarioLogado    = $_SESSION["banco_tcc"]["id"];
    $statusProducao_peca    = 0;
    $data_ent               = "";
    $data_lan               = date('Y/m/d');

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
            $last = $pdo->lastInsertId();
            $pdo->commit();
           sucesso("Inserido com sucesso!!","cadastros/producaoPeca/".$last);
        } else {
            print_r($insert->errorInfo());
            $pdo->rollBack();
            mensagem("ERRO ao inserir no banco de dados!!!");
        }
    }
}else {
    
}