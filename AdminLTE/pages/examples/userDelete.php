<?php
    session_start();
    if(isset($_GET["p"]))
    {
        $id = $_GET["p"];

        include "../../../functions/db.php";

        $query = "DELETE FROM users WHERE id = :id";

        $stmt = $connect->prepare($query);
        $stmt->execute([":id"=>$id]);

        $result = $stmt->fetchAll();
        $_SESSION["message"] = "Kullanıcı başarılı bir şekilde silindi";
        $_SESSION["color"] = "success";
        header("Locaiton:usersTable.php");
        exit();
        return $result;

    }







?>