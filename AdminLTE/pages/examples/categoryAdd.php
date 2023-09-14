<?php

    include "../../../functions/functions.php";

    session_start();
    // print_r($_SESSION);
    if ($_SESSION["admin"] == "false" || $_SESSION["active"] == 0 || $_SESSION["login"] == "false") {
    header("Location:../../about.php");
    exit();
    }
    $blogTitleErr = $blogContentErr = $CategoryErr = $statusErr = $picErr = "";
    
    
    $id = $_SESSION["id"];

    $result = getAdminUser($_SESSION["id"]);

    $mainPanel = "../../index.php";
    $author = $result[0]["memberName"];
    $adminPic = "../../../assets/img/" . $result[0]["userPic"];
    $projectPage = "projects.php";
    $adminName = $result[0]["userName"];
    $profilePage = "profile.php";
    $projectAdd = "project-add.php";
    $contact = "contact-us.php";
    $mainSet = "mainSettings.php";
    $siteIndex = "../../../index.php";
    $usersTable = "usersTable.php";
    $inbox = "../mailbox/mailbox.php";
    $categoryAdd = "categoryAdd.php";



    $category = getCategory();
    $categoryErr = "";
    include "categoryAddProcess.php";



?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Project Add</title>

  <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <?php include "../../parts/navbar.php"?>

    <?php include "../../parts/sidebar.php" ?>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?php include "../../../parts/message.php"?>
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Project Add</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Project Add</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <form method="post">
          <div class="row">
            <div class="col-md-8">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Category</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputName">Blog Title</label>
                    <input type="text" id="inputName" class="form-control" name="categoryName">
                    <div class="text-danger"><?php echo $categoryErr ?></div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <button class="btn btn-primary" name="submitButton">Submit</button>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </form>

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include "../../parts/footer.php" ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
</body>

</html>

<script>
  ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
      console.error(error);
    });
</script>