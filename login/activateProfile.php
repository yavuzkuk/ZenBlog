<?php
    $mainPage = "../index.php";
    $categories = "../category.php";
    $about = "../about.php";
    $contact = "../contact.php";
    $login = "login.php";
    $logOut = "logout.php";
    include "../functions/functions.php";
    
    session_start();
    include "activateProcess.php";

    if($_SESSION["active"])
    {
        header("Location:../index.php");
        exit();
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <title>ZenBlog Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    
    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    
    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    
    <!-- Template Main CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/variables.css" rel="stylesheet">
    <link href="../assets/css/main.css" rel="stylesheet">
    
</head>

<body>
    <?php include "../parts/navbar.php" ?>
    
    <main id="main">
        <?php include "../parts/message.php"?>
        <div style="height: 500px;background-image: url(../assets/img/loginPanel.jpg)" class="mx-auto text-success d-flex justify-content-center align-items-center">
            <div >
                <div class="row">
                    <div class="card mx-2" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Activate</h5>
                            <form method="post">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="me-2">
                                        <input type="number" class="form-control" min=100 max=999 name="first">
                                    </div>
                                    <div class="me-2">
                                        <input type="number" class="form-control" min=100 max=999 name="second">
                                    </div>
                                </div>
                                <input type="submit" value="Activate" class="btn" style="background-color: white; border: 1px solid black" name="activate">
                            </form>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </main>

    <?php include "../parts/footer.php"?>

</body>

</html>