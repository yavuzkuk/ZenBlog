<?php
  session_start();
  include "../../../functions/functions.php";

  $id = $_GET["p"];
  $result = getBlogsMemberCategory($id);
  $adminId = $_SESSION["id"];
  $comments = getComments($id);
  $admin = getCurrentAdminUser($adminId); 

  $adminName = $admin["userName"];
  $adminPic ="../../../assets/img/".$admin["userPic"];
  $projectPage = "projects.php";
  $profilePage = "profile.php";
  $projectAdd = "project-add.php";
  $contact = "contact-us.php";
  $mainSet = "mainSettings.php";
  $siteIndex = "../../../index.php";
  $usersTable = "usersTable.php";
  $inbox = "../mailbox/mailbox.php";
  $categoryAdd = "categoryAdd.php";


  
 



?>



<!DOCTYPE html>
<html lang="en">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Project Detail</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

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
                <h1>Project Detail</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Project Detail</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"> </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                  <div class="row">
                    <div class="col-12">
                      <h4><?php echo $result["blogTitle"] ?></h4>
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="../../../assets/img/<?php echo $result["memberPic"] ?>" alt="user image">
                          <span class="username">
                            <a href="#"><?php echo $result["memberName"] ?></a>
                          </span>
                          <span class="description"><?php echo $result["date"] ?></span>
                        </div>
                        <!-- /.user-block -->
                        <p>

                          <?php echo $result["blogSummary"] ?>
                        </p>
                        <hr>
                        <p>
                          <?php echo $result["blogContent"] ?>
                        </p>
                      </div>


                    </div>
                  </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                  <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Summary</h3>
                  <p class="text-muted"><?php echo $result["blogSummary"] ?></p>
                  <br>
                  <div class="text-muted">
                    <p class="text-sm">Author
                      <b class="d-block"><?php echo $result["memberName"] ?></b>
                    </p>
                  </div>

                  <h5 class="mt-5 text-muted">Project files</h5>
                  <ul class="list-unstyled">
                    <li>
                      <a href="" class="btn-link text-secondary"><i class="fa fa-thumbs-up"></i> <?php echo $result["likeNumber"] ?></a>
                    </li>
                    <li>
                      <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-eye"></i> Görüntülenme</a>
                    </li>
                    <li>
                      <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i><?php echo $result["categoryName"] ?></a>
                    </li>
                  </ul>
                  <div class="text-center mt-5 mb-3">
                    <a href="#" class="btn btn-sm btn-primary">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                  </div>
                </div>
              </div>
              <a href="" class="btn-link text-secondary"><i class="fa fa-comment"></i></a><sup><?php echo $comments[1] ?></sup>
            </div>
            <hr>
            <div class="row">
              <?php foreach($comments[0] as $comment):?>
                <div class="user-block mb-2">
                  <div class="d-flex align-items-center ml-1">
                    <?php echo $comment["userName"]?>
                  </div>
                  <div class="ml-1">
                    <img class="img-circle img-bordered-sm" src="../../../assets/img/<?php echo $comment["userPic"]?>" alt="">
                  </div>
                  <div class="d-flex align-items-center ml-5">
                    <?php echo $comment["blogComment"]?>
                  </div>
                </div>
              <?php endforeach?>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

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