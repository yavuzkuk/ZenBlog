<?php
  if(isset($_SESSION["login"]) && $_SESSION["login"] == "true")
  {
    $active = checkActive($_SESSION["id"]);

    if($active["activate"] == 1)
    {
      $_SESSION["active"] = 1;
    }
    else
    {
      $_SESSION["active"] = 0;
    }
  }
  else
  {
    $_SESSION["active"] = 0;
  }
?>



<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="<?php echo $mainPage?>" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>ZenBlog</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?php echo $mainPage?>">Blog</a></li>
          <li class="dropdown"><a href="<?php echo $categories?>"><span>Categories</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <?php foreach($navbarCategories as $categori):?>
                <li><a href="categories.php?p=<?php echo $categori["id"]?>"><?php echo $categori["categoryName"]?></a></li>
              <?php endforeach?>
            </ul>
          </li>

          <li><a href="<?php echo $about?>">About</a></li>
          <li><a href="<?php echo $contact?>">Contact</a></li>
          <?php if(isset($_SESSION["admin"]) && $_SESSION["admin"] == "true"):?>
            <li>
              <a href="<?php echo $adminPanel?>">Admin Paneli</a>
            </li>
          <?php endif;?>
          <?php if(isset($_SESSION["login"]) && $_SESSION["login"] == "true"):?>
            <li>
              <a href="<?php echo $logOut?>">Çıkış</a>
            </li>
            <li>
              <a href="">Hoşgeldin <?php echo $active["userName"]?></a>
            </li>
            <?php elseif(!isset($_SESSION["login"]) || $_SESSION["login"] == "false"):?>
              <li>
                <a href="<?php echo $login?>">Giriş</a>
              </li>
          <?php endif;?>
          <?php if(isset($_SESSION["active"]) && isset($_SESSION["login"]) && $_SESSION["login"] == "true" && $_SESSION["active"] == 0):?>
            <li>
              <a href="login/activateProfile.php">Hesabını aktive et</a>
            </li>
          <?php endif;?>
          


        </ul>
      </nav><!-- .navbar -->

      <div class="position-relative">
        <a href="https://twitter.com/yavuzkukk" class="mx-2"><span class="bi-twitter"></span></a>
        <a href="https://github.com/yavuzkuk" class="mx-2"><span class="bi-github"></span></a>
        <a href="https://www.linkedin.com/in/yavuzkuk/" class="mx-2"><span class="bi-linkedin"></span></a>
        <a href="https://www.instagram.com/yavuzkuk/" class="mx-2"><span class="bi-instagram"></span></a>

        <a href="#" class="mx-2 js-search-open"></a>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form action="search-result.html" class="search-form">
            <span class="icon bi-search"></span>
            <input type="text" placeholder="Search" class="form-control">
            <button class="btn js-search-close"><span class="bi-x"></span></button>
          </form>
        </div><!-- End Search Form -->
      </div>

    </div>

  </header>