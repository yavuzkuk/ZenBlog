<?php

    session_start();

    include "../../../functions/functions.php";

    $result = getAdminUser($_SESSION["id"]);

    // echo "<pre>";
    // print_r($result["id"]);
    // echo "</pre>";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <a href="likeProcess.php?p=<?php echo $result["id"]?>"><?php echo $result["likeNumber"]?></a>

    
</body>
</html>