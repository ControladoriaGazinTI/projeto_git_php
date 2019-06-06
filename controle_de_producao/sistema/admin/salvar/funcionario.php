<?php
 //verificar se a sessão esta ativa
if (file_exists("verificalogin.php"))
    include "verificalogin.php";
else
    include "../verificalogin.php";
if ($_POST) {
    //recebendo dados do formulario
    if (isset($_POST["id"])) {
        $id = trim($_POST["id"]);
    }
    if (isset($_POST["nome"])) {
        $nome = trim($_POST["nome"]);
    }
    if (isset($_POST["data"])) {
        $data = trim($_POST["data"]);
    }
    if (isset($_POST["cpf"])) {
        $cpf = trim($_POST["cpf"]);
    }
    if (isset($_POST["carteira"])) {
        $carteira = trim($_POST["carteira"]);
    }
    if (isset($_POST["telefone"])) {
        $telefone = trim($_POST["telefone"]);
    }
    if (isset($_POST["cidade"])) {
        $cidade = trim($_POST["cidade"]);
    }
    if (isset($_POST["rua"])) {
        $rua = trim($_POST["rua"]);
    }
    if (isset($_POST["bairro"])) {
        $bairro = trim($_POST["bairro"]);
    }
    if (isset($_POST["numero"])) {
        $numero = trim($_POST["numero"]);
    }
    if (isset($_POST["funcao"])) {
        $funcao = trim($_POST["funcao"]);
    }
    if (isset($_POST["login"])) {
        $login = trim($_POST["login"]);
    }
    if (isset($_POST["senha"])) {
        $senha = trim($_POST["senha"]);
    }
    if (isset($_POST["email"])) {
        $email = trim($_POST["email"]);
    }
    //fim dos dados do formulario
    if (empty($id)) {
        $sql = "INSERT INTO funcionario values (
                                                null,
                                                    ?,
                                                    ?,
                                                    ?,
                                                    ?,
                                                    ?,
                                                    ?,
                                                    ?,
                                                    ?,
                                                    ?,
                                                    ?,
                                                    ?,
                                                    ?,
                                                     null,
                                                    ?)";
        //instanciar o sql na conexao  (pdo) e preparar o sql para ser executado
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1, $nome);
        $consulta->bindParam(2, $data);
        $consulta->bindParam(3, $cpf);
        $consulta->bindParam(4, $carteira);
        $consulta->bindParam(5, $telefone);
        $consulta->bindParam(6, $cidade);
        $consulta->bindParam(7, $bairro);
        $consulta->bindParam(8, $rua);
        $consulta->bindParam(9, $numero);
        $consulta->bindParam(10, $login);
        $consulta->bindParam(11, $senha);
        $consulta->bindParam(12, $email);
        $consulta->bindParam(13, $funcao);
    } else {
        $sql = "UPDATE funcionario 
                    SET nome         = ?,
                        data_nasc    = ?,
                        cpf          = ?,
                        carteira     = ?,
                        telefone     = ?,
                        cidade       = ?,
                        bairro       = ?,
                        rua          = ?,
                        numero       = ?,
                        login        = ?, 
                        senha        = ?, 
                        email        = ?, 
                        tipo_usuario = null, 
                        idfuncao     = ? 
                WHERE id = ? LIMIT 1";
        $consulta = $pdo->prepare($sql);
        $consulta->bindParam(1, $nome);
        $consulta->bindParam(2, $data);
        $consulta->bindParam(3, $cpf);
        $consulta->bindParam(4, $carteira);
        $consulta->bindParam(5, $telefone);
        $consulta->bindParam(6, $cidade);
        $consulta->bindParam(7, $bairro);
        $consulta->bindParam(8, $rua);
        $consulta->bindParam(9, $numero);
        $consulta->bindParam(10, $login);
        $consulta->bindParam(11, $senha);
        $consulta->bindParam(12, $email);
        $consulta->bindParam(13, $funcao);
        $consulta->bindParam(14, $id);
    } //verificar para que serve esse update
    //verifica se o comando sera executado corretamente
    if ($consulta->execute()) {
        $msg = "Inserido com sucesso!!";
        $link = "listar/funcionario";
        sucesso($msg,$link);
    }else{
        echo "erroo";
    }
} else {
    //erro
    $msg = "erro ao efuetuar requisição";
    menssagem($msg);
}
 