<?php

    include "../../../functions/functions.php";

    if(isset($_POST["submitButton"]))
    {
        $blogTitle = (empty($_POST["blogTitle"]) ? $blogTitleErr = "Boş geçilemez" : filter($_POST["blogTitle"]));   
        $blogSum = (empty($_POST["blogSum"]) ? "" : filter($_POST["blogSum"]));   
        $blogContent = (empty($_POST["editor"]) ? $blogContentErr = "Boş geçilemez" : filter($_POST["editor"]));
        $status = (empty($_POST["status"]) ? $statusErr = "Boş geçilemez" : filter($_POST["status"]));
        $category = (empty($_POST["category"]) ? $CategoryErr = "Boş geçilemez" : filter($_POST["category"]));
        $authorId = $_POST["authorId"];
        $picture = ($_FILES["showPic"]["size"] == 0 ? $picErr = "Boş geçilemez" : $_FILES["showPic"]["name"]);

        
        // print_r($_FILES["showPic"]);


        if(empty($blogTitleErr) && empty($blogContentErr) && empty($statusErr) && empty($CategoryErr) && empty($picErr))
        {
            $whiteList = ["jpg","jpeg","png"];
            $result = explode(".",$picture);
            // print_r($result);
            // die();
            $extension = $result[1];
            $name = $result[0];
            
            if($_FILES["showPic"]["size"] != 0 && in_array($extension,$whiteList))
            {

                $from = $_FILES["showPic"]["tmp_name"];
                $picName = md5($_FILES["showPic"]["name"]).".".$extension;
                $to = "../uploadImages/".$picName;
                move_uploaded_file($from,$to);
                addBlogs($blogTitle,$blogSum,$blogContent,$status,$picName,$category,$authorId);
                $_SESSION["message"] = "Başarılı ekleme yapıldı";
                $_SESSION["color"] = "success";
                header("Location:projects.php");
                exit();
            }
        }
        else
        {
            
        }


        // print_r($_POST);



        // print_r($blogTitle);
        // echo "<br>";
        // print_r($blogSum);
        // echo "<br>";
        // print_r($blogContent);
        // echo "<br>";
        // print_r($category);
        // echo "<br>";
        // print_r($status);
        // echo "<br>";

    }


?>