<?php
    if(isset($_POST["submitButton"]))
    {
        //eğer submit butonu post global değeri içinde set edildiyse bloğa giriyor
        if(!empty($_POST["categoryName"]))
        {
            //post globali içinde gelen kategori ismi boş değilse
            //bu kod bloğuna girer
            $categoryName = filter($_POST["categoryName"]);
            // daha önce yazdığım filtreleme fonksiyonundan geçiriyorum.
            addCategory($categoryName);
            $_SESSION["message"] = "Kategori başarılı bir şekilde eklendi";
            $_SESSION["color"] = "success";
        }
        else
        {
            $categoryErr = "Kategoryi alanı boş geçilemez";
        }
    }






    










?>










