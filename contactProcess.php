<?php

    
    if(isset($_POST["sendButton"]))
    {
        $name = (isset($_POST["name"]) && !empty($_POST["name"]) ? filter($_POST["name"]) : $nameErr = "Bu alan boş geçilemez");
        $email = (isset($_POST["email"]) && !empty($_POST["email"]) ? filter($_POST["email"]) : $emailErr = "Bu alan boş geçilemez");
        $subject = (isset($_POST["subject"]) && !empty($_POST["subject"]) ? filter($_POST["subject"]) : $subjectErr = "Bu alan boş geçilemez");
        $message = (isset($_POST["message"]) && !empty($_POST["message"]) ? filter($_POST["message"]) : $messageErr = "Bu alan boş geçilemez");

        if(empty($nameErr) && empty($emailErr) && empty($subjectErr) && empty($messageErr))
        {
            addContact($name,$email,$subject,$message);
            $_SESSION["message"] = "Başarılı bir şekilde gönderildi";
            $_SESSION["color"] = "success";
        }
        else
        {
            $_SESSION["message"] = "Bir hata oluştu";
            $_SESSION["color"] = "danger";
            
        }
    }

?>