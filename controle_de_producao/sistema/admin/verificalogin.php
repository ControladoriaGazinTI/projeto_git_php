<?php
 //verificar se a sessão esta ativa
//verificar se existe id na sessão aula02
//se não existir um  dos dois mostra a mensagem e da exit na pagina
if ((session_status() != PHP_SESSION_ACTIVE) or (!isset($_SESSION["banco_tcc"]["id"])))//verificar oq o id faz
     {
        echo "<p>Esta página não pode ser exibida,
          por favor efetuar login</p>";
        exit;
    }