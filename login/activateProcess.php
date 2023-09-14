<?php

    if(isset($_POST["activate"]))
    {
        (empty($_POST["first"]) ? $activeErr = "Bu alan boş geçilemez" : $first = $_POST["first"]);
        (empty($_POST["second"]) ? $activeErr = "Bu alan boş geçilemez" : $second = $_POST["second"]);

        if(empty($activeErr))
        {
            $code = $first.$second;
            $id = $_SESSION["id"];
            checkActiveCode($code,$id);
        }
        else
        {
            $_SESSION["message"] = "Alanlar boş geçilemez";
            $_SESSION["color"] = "danger";
        }





    }

?>