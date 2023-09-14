<?php
    if(isset($_SESSION["login"]))
    {
        if($_SESSION["login"] == "true")
        {
            header("Location:../index.php");
            exit();
        }
    }
    
    include "../functions/functions.php";
    $userNickErr = $userPassErr = $userMailErr = "";
    if(isset($_POST["login"]))
    {
        (empty($_POST["userNick"]) ? $userNickErr = "Bu alan boş geçilemez" : "");
        (empty($_POST["userPass"]) ? $userPassErr = "Bu alan boş geçilemez" : "" );

        if(empty($userNickErr) && empty($userPassErr))
        {
            $userNick = filter($_POST["userNick"]);
            $userPass = filter($_POST["userPass"]);

            checkValue($userNick,$userPass);
        }
    }
    else if(isset($_POST["register"]))
    {
        (empty($_POST["userNick"]) ? $userNickErr = "Bu alan boş geçilemez" : "");
        (empty($_POST["userMail"]) ? $userMail = "Bu alan boş geçilemez" : "" );        
        (empty($_POST["userPass"]) ? $userPassErr = "Bu alan boş geçilemez" : "" );        

        if(empty($userNickErr) && empty($userPassErr) && empty($userMail))
        {
            $userNick = filter($_POST["userNick"]);
            $userMail = filter($_POST["userMail"]);
            $userPass = filter($_POST["userPass"]);

            checkValueInfo($userNick,$userPass,$userMail);
        }

    }

?>