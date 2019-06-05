<?php
    session_start();
    unset($_SESSION["banco_fabone"]);
    header("location: index.php");