<?php
 //verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";
//verificar se esta sendo enviado o id
if(isset($p[2])){
    $id = (int)$p[2];
    $idproduto = (int)[3];
    //echo"<pre>";
    //var_dump($id);
    //var_dump($p);
    //excluir o quadrinho
    $sql = "DELETE FROM funcionario WHERE id = ? limit 1";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(1,$id);
   
    if($consulta->execute()){
        $msg = "Registro excluido com sucesso!!!";
        mensagem($msg);
    }else{
        $msg = "ERRO ao excluir!!!";
        mensagem($msg);
    }
}else{
    $msg = "Ocorreu um erro ao excluir";
    mensagem($msg);
}