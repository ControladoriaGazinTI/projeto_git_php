<?php
    //criar conexao com o servidor com PDO
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "banco_avaliacao";
    try {
        $pdo = new PDO("mysql:host=$servidor;
        dbname=$banco;
        charset=utf8",
        $usuario,
        $senha);
    } catch (PDOException $erro) {
        $msg = $erro ->GetMessage();
        echo "<p> Erro ao conectar no banco de dados: <p>";
    };
    ?>