<?php
    session_start();
    unset($_SESSION["banco_tcc"]);
    header("location: index.php");