<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html"><?=strtoupper($_SESSION['bu_name']);?> PANEL</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        
        <div class="ml-auto">
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 ">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <!-- <li><a class="dropdown-item" href="#!">Settings</a></li> -->
                        <li><a class="dropdown-item" href="../common/profile.php">Profile</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../common/logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </nav>

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
                        <a class="nav-link" href="../index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Home
                        </a>
                        <?php
                        if($_SESSION['bu_type']=='1'){
                            ?>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <!-- <div class="sb-sidenav-menu-heading">Interface</div> -->
                            <a class="nav-link" href="../admin/users.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Users
                            </a>
                            <!-- <a class="nav-link" href="../admin/categories.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                Categories
                            </a>   -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                Categories
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../admin/categories.php">Categories</a>
                                    <a class="nav-link" href="../admin/sub_category.php">Sub Categories</a>
                                </nav>
                            </div>                          
                            <?php
                        }
                        ?>
                        
                        <?php
                        if($_SESSION['bu_type']=='1' || $_SESSION['bu_type']=='2'){
                            ?>
                            <!-- <div class="sb-sidenav-menu-heading">Interface</div> -->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-th-list"></i></div>
                                Business
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../common/business.php">Business</a>
                                    <a class="nav-link" href="../common/add_business.php">Add Business</a>
                                </nav>
                            </div>

                            <a class="nav-link" href="../common/visitors.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                                Visitors
                            </a>

                            <a class="nav-link" href="../common/likes.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-thumbs-up"></i></div>
                                Liked By Users
                            </a>

                            <?php
                        }
                        ?>

                        <?php
                        if($_SESSION['bu_type']=='3'){
                            ?>
                            <a class="nav-link" href="../investor/int_business.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-money-bill-alt"></i></div>
                                Interested Business
                            </a>
                            <?php
                        }
                        ?>

                        <?php
                        if($_SESSION['bu_type']=='2'){
                            ?>
                            <a class="nav-link" href="../ent/int_users.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-money-bill-alt"></i></div>
                                Interested Investors
                            </a>
                            <?php
                        }
                        ?>

                        <?php
                        if($_SESSION['bu_type']=='1'){
                            ?>
                            <a class="nav-link" href="../admin/interested.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-heart"></i></div>
                                Interested Users
                            </a>
                            <a class="nav-link" href="../admin/queries.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-phone"></i></div>
                                Queries
                            </a>
                            <?php
                        }
                        ?>                        


                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?=strtoupper($_SESSION['bu_name']);?>
                </div>
            </nav>
        </div>

            