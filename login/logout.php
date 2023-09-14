<?php

    session_start();

    $_SESSION["login"] = "false";
    unset($_SESSION["admin"]);
    unset($_SESSION["active"]);
    unset($_SESSION["id"]);

    // print_r($_SESSION);
    // die();

    header("Location:../index.php");
    exit();


?>