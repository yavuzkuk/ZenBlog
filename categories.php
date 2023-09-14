<?php
    include "functions/functions.php";
    session_start();
    $mainPage = "index.php";
    $categories = "category.php";
    $about = "about.php";
    $contact = "contact.php";
    $login = "login/login.php";
    $logOut = "login/logout.php";
    $adminPanel = "AdminLTE";

    // $_SESSION["login"] = "false";
    $mainResult = getMainId();
    $navbarCategories = navbarCategories();

    $first = array_slice($mainResult,1,1);
    $firstInfo = getBlogsById($first["first"]);
    $second = array_slice($mainResult,2,3);
    $third = array_slice($mainResult,-3,3);
    // echo "<pre>";
    // print_r($result);
    // echo "</pre>";
    // die();
    
    if(isset($_GET["p"]))
    {
        $categories = $_GET["p"];
        $result = getBlogCategory($categories)[0];
        $number = getBlogCategory($categories)[1];
        // echo "<pre>";
        // print_r($result);
        // echo "<br>";
        // print_r($number);
        // echo "</pre>";
        // die();
    }
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ZenBlog Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS Files -->
  <link href="assets/css/variables.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: ZenBlog
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/zenblog-bootstrap-blog-template/
  * Author: BootstrapMade.com
  * License: https:///bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include "parts/navbar.php"?>
  <!-- End Header -->

  <main id="main">
    <?php include "parts/message.php"?>
    <!-- ======= Hero Slider Section ======= -->
    <section id="posts" class="posts">
      <div class="container" data-aos="fade-up">
        <?php if($number == 0):?>
          <div class="alert alert-warning">
            Bu kategoriye özel içerik bulunamadı
          </div>
        <?php endif?>
        <?php foreach($result as $res):?>
        <div class="col-11 row mb-3">
            <div class="col-3  p-3">
                <a href="blog.php?p=<?php echo $res["id"]?>">
                    <img src="./AdminLTE/pages/uploadImages/<?php echo $res["blogPic"]?>" alt="" class="img-fluid">
                </a>
            </div>
            <div class="col-9 p-3">
                <div class="">
                    <a href="">
                        <h3><?php echo $res["blogTitle"]?></h3>
                    </a>
                    <div class="post-meta"><span class="date"><?php echo $res["categoryName"]?></span> <span class="mx-1">&bullet;</span> <span><?php echo $res["date"]?></span></div>
                </div>
                <?php echo $res["blogContent"]?>
            </div>
        </div>
        <hr>
        <?php endforeach?>
      </div>
    </section> <!-- End Post Grid Section -->

    <!-- ======= Culture Category Section ======= -->
    
    </section><!-- End Business Category Section -->

    <!-- ======= Lifestyle Category Section ======= -->
    <!-- End Lifestyle Category Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "parts/footer.php"?>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>