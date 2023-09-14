<?php
    include "../../../functions/functions.php";
    session_start();
    $mainBlogsId = getMainId();

    if(isset($_POST["submitBtn"]))
    {
        $first = (!isset($_POST["first"]) ? $mainBlogsId["first"] : $_POST["first"]);
        $second = (!isset($_POST["second"]) ? $mainBlogsId["second"] : $_POST["second"]);
        $third = (!isset($_POST["third"]) ? $mainBlogsId["third"] : $_POST["third"]);
        $fourth = (!isset($_POST["fourth"]) ? $mainBlogsId["fourth"] : $_POST["fourth"]);
        $fifth = (!isset($_POST["fifth"]) ? $mainBlogsId["fifth"] : $_POST["fifth"]);
        $sixth = (!isset($_POST["sixth"]) ? $mainBlogsId["sixth"] : $_POST["sixth"]);
        $seventh = (!isset($_POST["seventh"]) ? $mainBlogsId["seventh"] : $_POST["seventh"]);

        udapteMainId($first,$second,$third,$fourth,$fifth,$sixth,$seventh);
        $_SESSION["message"] = "Başarı ile güncellendi";
        $_SESSION["color"] = "success";
        header("Location:mainSettings.php");
        exit();
    }



?>