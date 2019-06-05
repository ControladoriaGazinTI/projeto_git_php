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
    $sql = "DELETE FROM categoria WHERE idcategoria = ? limit 1";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(1,$id);
   
    if($consulta->execute()){
        $msg = "Registro excluido com sucesso!!!";
        menssagem($msg);
    }else{
        $msg = "ERRO ao excluir!!!";
        menssagem($msg);
    }
}else{
    $msg = "Ocorreu um erro ao excluir";
    menssagem($msg);
}