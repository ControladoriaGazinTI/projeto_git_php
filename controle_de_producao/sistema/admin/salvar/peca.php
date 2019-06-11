<?php
 //verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";

$pdo->beginTransaction();
if($_POST){
    $id         = "";
    $nome       = "";
    $qtde       = "";
    $foto       = "";
    
    foreach ($_POST as $key => $value) {
        //echo "<p>$key $value</p>";
        //$key - nome do campo
        //$value - valor do campo (digitado)
        if ( isset ( $_POST[$key] ) ) {
            $$key = trim ( $value );
        } 
    }
}
if(empty($id)){
    $sql      = "INSERT INTO peca VALUES (NULL,?,?,?)";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(1,$nome);
    $consulta->bindParam(2,$qtde);
    $consulta->bindParam(3,$foto);
}else{
    $sql = "UPDATE peca SET
                        nome = ?,
                        qtde = ?,
                        foto = ?,
            WHERE
                        id   = ?
            LIMIT 1
           ";
    $consulta = $pdo->prepare($sql);
    $consulta->bindParam(1,$nome); 
    $consulta->bindParam(2,$qtde); 
    $consulta->bindParam(3,$foto); 
    $consulta->bindParam(4,$id); 
}