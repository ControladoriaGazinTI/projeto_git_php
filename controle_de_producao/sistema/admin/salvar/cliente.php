<?php
 //verificar se a sessão esta ativa
if(file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";
    var_dump($_POST["id"]);
    if($_POST){
        if(isset ($_POST["id"])){
            $id = trim ($_POST["id"]);
        }
        if(isset ($_POST["nome_cli"])){
            $nome = trim ($_POST["nome_cli"]);
        }
        if(isset ($_POST["cpf"])){
            $cpf = trim ($_POST["cpf"]);
        }
        if(isset ($_POST["cnpj"])){
            $cnpj = trim ($_POST["cnpj"]);
        }
          //validar para ver se nao  existe nenhun tipo de quadrinho com o nome que sera inserido
        if(empty($id)){
            $sql = "SELECT cpf FROM cliente WHERE cpf = ? limit 1";
            $consulta = $pdo->prepare($sql);
            $consulta->bindParam(1,$cpf);
        }else{
            $sql = "SELECT cpf,idcliente from cliente where cpf = ? and idcliente <> ? limit 1";
            $consulta = $pdo->prepare($sql);
            $consulta->bindParam(1,$cpf);
            $consulta->bindParam(2,$id);
        }
        //executar
        $consulta->execute();
        $dados = $consulta->fetch(PDO::FETCH_OBJ);
        //verificar se o dado trouxe algum resultado
        if(isset($dados->cpf)){
            $msg = "Já existe um CPF: $cpf cadastrado na sua base de dados!!!";
            menssagem($msg);
        }
        //se id estiver vazio - insert
        //se não estiver vazio - update
        if(empty($id)){
            $sql = "INSERT INTO cliente values (null,?,?,?)";
            //instanciar o sql na conexao  (pdo) e preparar o sql para ser executado
            $consulta = $pdo->prepare($sql);
            $consulta->bindParam(1,$nome);
            $consulta->bindParam(2,$cpf);
            $consulta->bindParam(3,$cnpj);
        }else{
            $sql = "UPDATE cliente SET nome_cli = ? , cpf = ? , cnpj = ? WHERE idcliente = ? LIMIT 1";
            $consulta = $pdo->prepare($sql);
            $consulta->bindParam(1,$nome);
            $consulta->bindParam(2,$cpf);
            $consulta->bindParam(3,$cnpj);
            $consulta->bindParam(4,$id);
        }//verificar para que serve esse update
        //verifica se o comando sera executado corretamente
        if($consulta->execute()){
            $msg = "Inserido com sucesso!!";
            $link = "listar/cliente";
            sucesso($msg,$link);
        }
    }else{
        //erro
        $msg ="erro ao efuetuar requisição";
        menssagem($msg);
    }
?>