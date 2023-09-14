<?php
  $mainPage = "index.php";
  $categories = "category.php";
  $about = "about.php";
  $contact = "contact.php";
  $login = "login/login.php";
  $logOut = "login/logout.php";
  $adminPanel = "AdminLTE/";

  session_start();
  // $_SESSION["active"] = 0;
  
  // echo "<pre>";
  // print_r($_SESSION);
  // echo "</pre>";
  // die();

  include "functions/functions.php";
  // $_SESSION["login"] = "false";
  $mainResult = getMainId();
  $navbarCategories = navbarCategories();

  $first = array_slice($mainResult,1,1);
  $firstInfo = getBlogsById($first["first"]);
  $second = array_slice($mainResult,2,3);
  $third = array_slice($mainResult,-3,3);

  // echo "<pre>";
  // print_r($firstInfo);
  // echo "</pre>";
  // die();

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
    <section id="hero-slider" class="hero-slider">
      <div class="container-md" data-aos="fade-in">
        <div class="row">
          <div class="col-12">
            <div class="swiper sliderFeaturedPosts">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <a href="blog.php?p=<?php echo $firstInfo["id"]?>" class="img-bg d-flex align-items-end" style="background-image: url('AdminLTE/pages/uploadImages/<?php echo $firstInfo["blogPic"]?>');">
                    <div class="img-bg-inner">
                      <p><?php echo $firstInfo["categoryName"]?></p>
                      <h2><?php echo $firstInfo["blogTitle"]?></h2>
                    </div>
                  </a>
                </div>
                <?php foreach($second as $firstRe): $firstInfo = getBlogsById($firstRe)?>
                  <div class="swiper-slide">
                      <a href="blog.php?p=<?php echo $firstInfo["id"]?>" class="img-bg d-flex align-items-end" style="background-image: url('AdminLTE/pages/uploadImages/<?php echo $firstInfo["blogPic"]?>');">
                        <div class="img-bg-inner">
                          <p><?php echo $firstInfo["categoryName"]?></p>
                          <h2><?php echo $firstInfo["blogTitle"]?></h2>
                        </div>
                      </a>
                    </div>
                  <?php endforeach?>
              </div>
              <div class="custom-swiper-button-next">
                <span class="bi-chevron-right"></span>
              </div>
              <div class="custom-swiper-button-prev">
                <span class="bi-chevron-left"></span>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Hero Slider Section -->
    <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts">
      <div class="container" data-aos="fade-up">
        <div class="row g-5">
          <div class="col-lg-4">
            <div class="post-entry-1 lg">
              <?php foreach($first as $first):?>
                <?php $results = getBlogsById($first);?>
                <a href="blog.php?p=<?php echo $results["id"]?>"><img src="AdminLTE/pages/uploadImages/<?php echo $results["blogPic"]?>" alt="" class="img-fluid"></a>
                <div class="post-meta"><span class="date"><?php echo $results["categoryName"]?></span> <span class="mx-1">&bullet;</span> <span><?php echo $results["date"]?></span></div>
                <h2><a href="blog.php?p=<?php echo $results["id"]?>"><?php echo $results["blogTitle"]?></a></h2>
                <p class="mb-4 d-block"><?php echo $results["blogContent"]?></p>

                <div class="d-flex align-items-center author">
                  <div class="photo"><img src="assets/img/<?php echo $results["memberPic"]?>" alt="" class="img-fluid"></div>
                  <div class="name">
                    <h3 class="m-0 p-0"><?php echo $results["memberName"]?></h3>
                  </div>
                </div>
              <?php endforeach?>
            </div>
          </div>

          <div class="col-lg-8">
            <div class="row g-5">
              <div class="col-lg-4 border-start custom-border">
                <?php foreach($second as $second):?>
                  <?php $result = getBlogsById($second)?>
                  <div class="post-entry-1">
                    <a href="blog.php?p=<?php echo $result["id"]?>"><img src="AdminLTE/pages/uploadImages/<?php echo $result["blogPic"]?>" alt="" class="img-fluid"></a>
                    <div class="post-meta"><span class="date"><?php echo $result["categoryName"]?></span> <span class="mx-1">&bullet;</span> <span><?php echo $result["date"]?></span></div>
                    <h2><a href="blog.php?p=<?php echo $result["id"]?>"><?php echo $result["blogTitle"]?></a></h2>
                  </div>
                <?php endforeach ?>
              </div>
              <div class="col-lg-4 border-start custom-border">
                <?php foreach($third as $third):?>
                  <?php $result = getBlogsById($third)?>
                  <div class="post-entry-1">
                    <a href="blog.php?p=<?php echo $result["id"]?>"><img src="AdminLTE/pages/uploadImages/<?php echo $result["blogPic"]?>" alt="" class="img-fluid"></a>
                    <div class="post-meta"><span class="date"><?php echo $result["categoryName"]?></span> <span class="mx-1">&bullet;</span> <span><?php echo $result["date"]?></span></div>
                    <h2><a href="blog.php?p=<?php echo $result["id"]?>"><?php echo $result["blogTitle"]?></a></h2>
                  </div>
                <?php endforeach?>
              </div>

              <!-- Trending Section -->
              <div class="col-lg-4">

                <div class="trending">
                  <h3>News</h3>
                  <ul class="trending-post">
                    <?php $newsBlogs = newBlogs() ; foreach($newsBlogs as $newBlog):?>
                      <li>
                        <a href="single-post.html">
                          <span class="number">1</span>
                          <h3><?php echo $newBlog["blogTitle"]?></h3>
                          <span class="author"><?php echo $newBlog["memberName"]?></span>
                        </a>
                      </li>
                    <?php endforeach?>
                  </ul>
                </div>

              </div> <!-- End Trending Section -->
            </div>
          </div>

        </div> <!-- End .row -->
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