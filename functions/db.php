<?php

    try 
    {
        $connect = new PDO("mysql:host=localhost;dbname=web","root","");
        $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
?>