<?php
    session_start();
    include "../../../functions/functions.php";

    if(isset($_GET["p"]))
    {
        $id = $_GET["p"];
        // print_r($id);
        // die();
        deleteBlogs($id);
        $_SESSION["message"] = "Başarılı bir şekilde silindi";
        $_SESSION["color"] = "warning";
        header("Location:projects.php");
        exit();
    }


?>