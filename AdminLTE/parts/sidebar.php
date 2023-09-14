<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo $mainPage?>" class="brand-link">
        <span class="brand-text font-weight-light"><b>Kuk</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo $adminPic?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?php echo $profilePage?>" class="d-block"><?php echo $adminName?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php echo $mainPanel?>" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Ana Panel
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                <li class="nav-header">Contact</li>
                    <li class="nav-item">
                        <a href="<?php echo $inbox?>" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Inbox</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../mailbox/compose.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Compose</p>
                        </a>
                    </li>
                </li>
                <li class="nav-item menu">
                <li class="nav-header">Pages</li>
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="<?php echo $profilePage?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $usersTable?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users Table</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $mainSet?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Main Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $projectPage?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blogs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $projectAdd?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blog Add</p>
                            </a>
                        <li class="nav-item">
                            <a href="<?php echo $contact?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contact us</p>
                            </a>
                        </li>
                    </ul>
                </li>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>