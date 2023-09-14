<?php

  session_start();
  $blogTitleErr = $blogContentErr = $CategoryErr = $statusErr = $authorErr = "";
  include "../../../functions/functions.php";
  include "projectEditProcess.php";

  if(isset($_GET["p"]))
  {
    $id = $_GET["p"];
  }
  $adminId = $_SESSION["id"];

  $blog = getBlogsById($id);
  $category = getCategory();

  $admin = getCurrentAdminUser($adminId);
  $authors = getTeamMember();
  $adminName = $admin["userName"];
  $adminPic = "../../../assets/img/" . $admin["userPic"];
  $projectPage = "projects.php";
  $profilePage = "profile.php";
  $projectAdd = "project-add.php";
  $contact = "contact-us.php";
  $mainSet = "mainSettings.php";
  $siteIndex = "../../../index.php";
  $usersTable = "usersTable.php";
  $inbox = "../mailbox/mailbox.php";


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Project Edit</title>
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
    <!-- /.navbar -->
    <?php include "../../parts/sidebar.php" ?>
    <!-- Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Project Edit</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Project Edit</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-8">
            <form method="post" enctype="multipart/form-data">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">General</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputName">Blog Title</label>
                    <input type="text" id="inputName" class="form-control" value="<?php echo $blog["blogTitle"]?>" name="blogTitle">
                    <div class="text-danger"><?php echo $blogTitleErr?></div>
                  </div>
                  <div class="form-group">
                    <label for="inputDescription">Blog Summary</label>
                    <input type="text" value="<?php echo $blog["blogSummary"]?>" class="form-control" name="blogSum">
                  </div>
                  <div class="form-group">
                    <label for="inputDescription">Blog Content</label>
                    <textarea name="editor" id="editor" class="form-control" name="editor"><?php echo $blog["blogContent"]?></textarea>
                    <div class="text-danger"><?php echo $blogContentErr?></div>
                  </div>
                  <div class="form-group">
                    <label for="formFile" class="form-label">Picture</label>
                    <input class="form-control" type="file" id="formFile" name="showPic">
                  </div>
                  <div class="form-group">
                    <label for="inputStatus">Status</label>
                    <select id="inputStatus" class="form-control custom-select" name="status">
                      <option disabled>Select one</option>
                      <option value="1" <?php echo $blog["visible"] == 1 ? "selected" : ""?>>Visible</option>
                      <option value="-1" <?php echo $blog["visible"] == -1 ? "selected" : ""?>>Invisible</option>
                    </select>
                    <div class="text-danger"><?php echo $statusErr?></div>
                  </div>
                  <div class="form-group">
                    <label for="inputClientCompany">Category</label>
                    <select id="inputStatus" class="form-control custom-select" name="category">
                      <option disabled>Category</option>
                        <?php foreach($category as $cat):?>
                          <option value="<?php echo $cat["id"]?>" <?php echo $cat["id"] == $blog["categoryId"] ? "selected" : "" ?>><?php echo $cat["categoryName"]?></option>
                        <?php endforeach?>
                    </select>
                    <div class="text-danger"><?php echo $CategoryErr?></div>
                  </div>
                  <div class="form-group">
                    <label for="inputProjectLeader">Author:</label>
                    <b><?php echo $admin["memberName"]?></b>
                  </div>
                </div>
                <input type="text" hidden value="<?php echo $id?>" name="id">
                <input type="submit" value="Edit" class="btn btn-success float-right" name="editButton">
              </div>
            </form>
            <!-- /.card -->
          </div>
          <div class="col-md-6">
          </div>
        </div>

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

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