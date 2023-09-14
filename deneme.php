<?php

    include "functions/functions.php";

    include "functions/db.php";

    session_start();


    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";


    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";

    $result = checkActive(1);

    print_r($result)


?>