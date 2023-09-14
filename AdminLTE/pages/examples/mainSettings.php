<?php

  session_start();

  include "../../../functions/functions.php";
  
  $admin = getAdminUser($_SESSION["id"]);
  $allBlogs = getAllBlogsWithTeam();
  
  $mainPage = getMainId();
  $mainBlogsId = array_splice($mainPage,1);
  
  $adminName = $admin[0]["userName"];
  $adminPic = "../../../assets/img/".$admin[0]["userPic"];
  $mainPanel = "../../index.php";
  $projectPage = "projects.php";
  $profilePage = "profile.php";
  $projectAdd = "projectAdd.php";
  $contact = "contact-us.php";
  $mainSet = "mainSettings.php";
  $siteIndex = "../../../index.php";
  $usersTable = "usersTable.php";
  $inbox = "../mailbox/mailbox.php";
  $categoryAdd = "categoryAdd.php";


  
  // echo "<pre>";
  // print_r($mainBlogsId);
  // echo "</pre>";
  // die();
  include "../../../parts/message.php";
  
  
  

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Projects</title>

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
  <?php include "../../parts/sidebar.php"?>
  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
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
          <h3 class="card-title">Projects</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          First
                      </th>
                      <th style="width: 30%">
                          Team Members
                      </th>
                      <th>
                          Blog Author
                      </th>
                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <form action="mainSettingProcess.php" method="post">
                <tbody>
                    <?php foreach($mainBlogsId as $key=>$mainBlog):?>
                        <?php $result = getBlogsById($mainBlog);?>
                    <tr>
                        <td>
                            <?php echo $key?>
                        </td>
                        <td>
                            <a>
                                <?php echo $result["blogTitle"]?>
                            </a>
                            <br/>
                            <small>
                                <?php echo $result["date"]?>
                            </small>
                        </td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" src="../../../assets/img/<?php echo $result["memberPic"]?>">
                                </li>
                            </ul>
                        </td>
                        <td class="project_progress">
                            <ul>
                                <li>
                                    <?php echo $result["memberName"]?>
                                </li>
                            </ul>
                        </td>
                        <td class="project-state">
                            <?php if($result["visible"] == 1):?>
                            <span class="badge badge-success">Public</span>
                            <?php elseif($result["visible"] == -1):?>
                            <span class="badge badge-danger">Private</span>
                            <?php endif?>
                        </td>
                        <td class="project-actions text-right">
                            <select name="<?php echo $key?>" id="" class="form-control">
                                <option disabled selected value="0">Select One</option>
                                <?php foreach($allBlogs as $blog):?>
                                    <option value="<?php echo $blog["id"]?>"><?php echo $blog["blogTitle"]?></option>
                                <?php endforeach?>
                            </select>
                        </td>
                    </tr>
                    <?php endforeach?>                  
                </tbody>
            </table>
            <input type="submit" value="Submit" class="col-12 btn btn-primary mt-2" name="submitBtn">
        </form>

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
