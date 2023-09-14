<?php



    if(isset($_POST["editButton"]))
    {
        $blogTitle = (empty($_POST["blogTitle"]) ? $blogTitleErr = "Boş geçilemez" : filter($_POST["blogTitle"]));   
        $blogSum = (empty($_POST["blogSum"]) ? "" : filter($_POST["blogSum"]));   
        $blogContent = (empty($_POST["editor"]) ? $blogContentErr = "Boş geçilemez" : filter($_POST["editor"]));
        $status = (empty($_POST["status"]) ? $statusErr = "Boş geçilemez" : filter($_POST["status"]));
        $category = (empty($_POST["category"]) ? $CategoryErr = "Boş geçilemez" : filter($_POST["category"]));
        $filePic = (($_FILES["showPic"]["size"] == 0 ? "" : $_FILES["showPic"]["name"]));
        $id = $_POST["id"];

        // print_r($_FILES);
        // echo($filePic);
        // die();

        $whiteList = ["jpg","jpeg","png"];
        if(!empty($filePic))
        {
            $extens = explode(".",$filePic)[1];
            $name = explode(".",$filePic)[0];
            // print_r($extens);
            // print_r($name);
            // die();

            if(!in_array($extens,$whiteList))
            {
                $fileErr = "Hata";
            }
        }

        if(empty($blogTitleErr) && empty($blogContentErr) && empty($statusErr) && empty($CategoryErr) && empty($fileErr))
        {
            $name = md5($name);
            $name = $name.".".$extens;
            if(empty($blogTitleErr) && empty($blogContentErr) && empty($statusErr) && empty($CategoryErr) && empty($authorErr))
            {
                move_uploaded_file($_FILES["showPic"]["tmp_name"],"../uploadImages/".$name);
                updateBlogs($id,$blogTitle,$blogSum,$blogContent,$status,$name,$category);
                $_SESSION["message"] = "Başarı ile güncellediniz";
                $_SESSION["color"] = "success";
                header("Location:projects.php");
            }
            else
            {
                $_SESSION["message"] = "Hata gerçekleşti";
                $_SESSION["color"] = "danger";
            }
        }



    }






?>