<?php

session_start();
// print_r($_SESSION);
if ($_SESSION["admin"] == "false" || $_SESSION["active"] == 0 || $_SESSION["login"] == "false") {
  header("Location:../../about.php");
  exit();
}
$blogTitleErr = $blogContentErr = $CategoryErr = $statusErr = $picErr = "";

include "projectAddProccess.php";

$id = $_SESSION["id"];

$result = getAdminUser($_SESSION["id"]);

// echo "<pre>";
// print_r($result);
// echo "</pre>";
// die();

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



$category = getCategory();




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
        <form method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-8">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Blog</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputName">Blog Title</label>
                    <input type="text" id="inputName" class="form-control" name="blogTitle">
                    <div class="text-danger"><?php echo $blogTitleErr ?></div>
                  </div>
                  <div class="form-group">
                    <label for="inputDescription">Blog Summary</label>
                    <input id="inputDescription" class="form-control" rows="4" name="blogSum"></input>
                  </div>
                  <div class="form-group">
                    <label for="inputDescription">Blog Content</label>
                    <textarea name="editor" id="editor" class="form-control"></textarea>
                    <div class="text-danger"><?php echo $blogContentErr ?></div>
                  </div>
                  <div class="form-group">
                    <label for="formFile" class="form-label">Picture</label>
                    <input class="form-control" type="file" id="formFile" name="showPic">
                    <div class="text-danger"><?php echo $picErr ?></div>
                  </div>
                  <div class="form-group">
                    <label for="inputStatus">Status</label>
                    <select id="inputStatus" class="form-control" name="status">
                      <option selected disabled>Select one</option>
                      <option value="1">Visible</option>
                      <option value="-1">Invisible</option>
                    </select>
                    <div class="text-danger"><?php echo $statusErr ?></div>
                  </div>
                  <div class="form-group">
                    <label for="inputStatus">Category</label>
                    <select id="inputStatus" class="form-control" name="category">
                      <option selected disabled>Select one</option>
                      <?php foreach ($category as $cat) : ?>
                        <option value="<?php echo $cat["id"] ?>"><?php echo $cat["categoryName"] ?></option>
                      <?php endforeach ?>
                    </select>
                    <div class="text-danger"><?php echo $CategoryErr ?></div>
                  </div>
                  <div class="form-group">
                    <b>Author: </b><?php echo $author?>
                    <input type="text" hidden value="<?php echo $result[0]["id"]?>" name="authorId">
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