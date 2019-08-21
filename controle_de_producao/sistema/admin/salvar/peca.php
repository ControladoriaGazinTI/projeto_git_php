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
    $foto = time();
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
if ( $consulta->execute() ) {

    //se a capa não estiver vazio - copiar
    if ( !empty ( $_FILES["foto"]["name"] ) ) {
        //copiar o arquivo para a pasta
        
        if ( !copy( $_FILES["foto"]["tmp_name"],"../fotos/".$_FILES["foto"]["name"] )) {
            $errors= error_get_last();
            echo "COPY ERROR: ".$errors['type'];
            echo "<br />\n".$errors['message'];
        }
        //echo $capa;
        $pastaFotos = "../fotos/";
        $imagem = $_FILES["foto"]["name"];
        redimensionarImagem($pastaFotos,$imagem,$foto);
    }
    
    //salvar no banco
    $pdo->commit();
    $msg = "Registro inserido com sucesso!";
    sucesso($msg,"listar/peca");
    

} else {
    //erro do sql
    echo $consulta->errorInfo()[2];
    exit;
    $msg = "Erro ao salvar quadrinho";
    mensagem( $msg );
}