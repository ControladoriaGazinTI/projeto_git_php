<?php
 //verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";
//verificar se esta sendo enviado o id
if(isset($p[2])){
    $id = (int)$p[2];
    //echo"<pre>";
    //var_dump($id);
    //var_dump($p);
    //excluir o quadrinho
    $sql = "UPDATE pedido SET status = 1 WHERE pedido.id = ?";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(1,$id);
   
    if($consulta->execute()){
        $msg = "Pedido finalizado com sucesso!!!";
        mensagem($msg);
    }else{
        $msg = "ERRO ao Finalizar o pedido!!!";
        mensagem($msg);
    }
}else{
    $msg = "Ocorreu um erro ao atualizar!!!";
    mensagem($msg);
}