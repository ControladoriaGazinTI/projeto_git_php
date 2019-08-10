<?php
 //verificar se a sessão esta ativa
if(file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";
    if($_POST){
        if(isset ($_POST["id"])){
            $id = trim ($_POST["id"]);
        }
        if(isset ($_POST["nome"])){
            $nome = trim ($_POST["nome"]);
        }
        if(isset ($_POST["cpf"])){
            $cpf = trim ($_POST["cpf"]);
        }
        if(isset ($_POST["cnpj"])){
            $cnpj = trim ($_POST["cnpj"]);
        }
        if(isset ($_POST["telefone"])){
            $telefone = trim ($_POST["telefone"]);
        }
        if(isset ($_POST["telefone2"])){
            $telefone2 = trim ($_POST["telefone2"]);
        }
        //se id estiver vazio - insert
        //se não estiver vazio - update
        if(empty($id)){
            $sql = "INSERT INTO cliente values (null,?,?,?,?,?)";
            //instanciar o sql na conexao  (pdo) e preparar o sql para ser executado
            $consulta = $pdo->prepare($sql);
            $consulta->bindParam(1,$nome);
            $consulta->bindParam(2,$cpf);
            $consulta->bindParam(3,$cnpj);
            $consulta->bindParam(4,$telefone);
            $consulta->bindParam(5,$telefone2);
        }else{
            $sql = "UPDATE cliente SET nome = ? , cpf = ? , cnpj = ?, telefone = ?, telefone2 = ? WHERE id= ? LIMIT 1";
            $consulta = $pdo->prepare($sql);
            $consulta->bindParam(1,$nome);
            $consulta->bindParam(2,$cpf);
            $consulta->bindParam(3,$cnpj);
            $consulta->bindParam(4,$telefone);
            $consulta->bindParam(5,$telefone2);
            $consulta->bindParam(6,$id);
        }//verificar para que serve esse update
        //verifica se o comando sera executado corretamente
        if($consulta->execute()){
            $msg = "Inserido com sucesso!!";
            $link = "listar/cliente";
            sucesso($msg,$link);
        }else{
            $msg = "Erro ao inserir!!!";
            mensagem($msg);
        }
    }else{
        //erro
        $msg ="erro ao efuetuar requisição";
        mensagem($msg);
    }
?>