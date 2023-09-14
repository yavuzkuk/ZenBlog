<?php


    if(isset($_POST["submitBtn"]))
    {
        if(!empty($_POST["comment"]))
        {
            $comment = filter($_POST["comment"]);
            $userId = $_POST["userId"];
            $blogId = $_POST["blogId"];

            if($_SESSION["id"] == $userId)
            {
                addComment($blogId,$userId,$comment);
            }

        }
        else
        {
            $commentErr = "Boş geçilemez";
        }
    }


?>