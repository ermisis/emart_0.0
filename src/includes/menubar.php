<div class="navbar-collapse collapse" id="navbarSupportedContent">
<div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <div class="customize-input float-left">
                    <h4>Date/Time: <span class="page-title text-truncate text-dark font-weight-medium mb-1"
                            id="datetime"></span></h4>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- toggle and nav items -->
    <!-- ============================================================== -->
    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
        <!-- Notification -->
        <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)" id="bell"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span><i data-feather="bell" class="svg-icon"></i></span>
                <span class="badge badge-primary notify-no rounded-circle">5</span>
            </a>
            <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                <ul class="list-style-none">
                    <li>
                        <div class="message-center notifications position-relative"> -->
                            <!-- Message -->
                            <!-- <a href="javascript:void(0)"
                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                <div class="btn btn-danger rounded-circle btn-circle"><i data-feather="airplay"
                                        class="text-white"></i></div>
                                <div class="w-75 d-inline-block v-middle pl-2">
                                    <h6 class="message-title mb-0 mt-1">Luanch Admin</h6>
                                    <span class="font-12 text-nowrap d-block text-muted">Just see
                                        the my new
                                        admin!</span>
                                    <span class="font-12 text-nowrap d-block text-muted">9:30 AM</span>
                                </div>
                            </a> -->
                            <!-- Message -->
                            <!-- <a href="javascript:void(0)"
                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                <span class="btn btn-success text-white rounded-circle btn-circle"><i
                                        data-feather="calendar" class="text-white"></i></span>
                                <div class="w-75 d-inline-block v-middle pl-2">
                                    <h6 class="message-title mb-0 mt-1">Event today</h6>
                                    <span class="font-12 text-nowrap d-block text-muted text-truncate">Just
                                        a reminder that you have event</span>
                                    <span class="font-12 text-nowrap d-block text-muted">9:10 AM</span>
                                </div>
                            </a> -->
                            <!-- Message -->
                            <!-- <a href="javascript:void(0)"
                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                <span class="btn btn-info rounded-circle btn-circle"><i data-feather="settings"
                                        class="text-white"></i></span>
                                <div class="w-75 d-inline-block v-middle pl-2">
                                    <h6 class="message-title mb-0 mt-1">Settings</h6>
                                    <span class="font-12 text-nowrap d-block text-muted text-truncate">You
                                        can customize this template
                                        as you want</span>
                                    <span class="font-12 text-nowrap d-block text-muted">9:08 AM</span>
                                </div>
                            </a> -->
                            <!-- Message -->
                            <!-- <a href="javascript:void(0)"
                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                <span class="btn btn-primary rounded-circle btn-circle"><i data-feather="box"
                                        class="text-white"></i></span>
                                <div class="w-75 d-inline-block v-middle pl-2">
                                    <h6 class="message-title mb-0 mt-1">Pavan kumar</h6> <span
                                        class="font-12 text-nowrap d-block text-muted">Just
                                        see the my admin!</span>
                                    <span class="font-12 text-nowrap d-block text-muted">9:02 AM</span>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <a class="nav-link pt-3 text-center text-dark" href="javascript:void(0);">
                            <strong>Check all notifications</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </li> -->
        <!-- End Notification -->
        <!-- ============================================================== -->
        <!-- create new -->
        <!-- ============================================================== -->
    </ul>
    <!-- ============================================================== -->
    <!-- Right side toggle and nav items -->
    <!-- ============================================================== -->
    <ul class="navbar-nav float-right">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <img src="/emart/src/assets/images/users/profile-pic.jpg" alt="user" class="rounded-circle" width="40">
                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,<span class="page-title text-truncate text-dark font-weight-medium mb-1">
                    <?php echo $_SESSION['selectedRole']?> </span></span> <span
                        class="text-dark"><?php echo $_SESSION['userFirstName']." ".$_SESSION['userLastName']?></span>
                    <i data-feather="chevron-down" class="svg-icon"></i></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                <a class="dropdown-item" href="profile_mgt.php"><i data-feather="user"
                        class="svg-icon mr-2 ml-1"></i>
                    My Profile</a>
                <!-- <a class="dropdown-item" href="javascript:void(0)"><i data-feather="credit-card"
                        class="svg-icon mr-2 ml-1"></i>
                    My Balance</a>
                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="mail"
                        class="svg-icon mr-2 ml-1"></i>
                    Inbox</a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="settings"
                        class="svg-icon mr-2 ml-1"></i>
                    Account Setting</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal"><i data-feather="power"
                        class="svg-icon mr-2 ml-1"></i>
                    Logout</a>
            </div>
        </li>
        <!-- ============================================================== -->
        <!-- User profile and search -->
        <!-- ============================================================== -->
    </ul>
</div>
</nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="index.php" aria-expanded="false"><i
                            data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Administration</span></li>

                <li class="sidebar-item"> <a class="sidebar-link" href="purchase.php" aria-expanded="false"><i
                            data-feather="tag" class="feather-icon"></i><span class="hide-menu">Purchase
                        </span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="sales.php" aria-expanded="false"><i
                            data-feather="message-square" class="feather-icon"></i><span
                            class="hide-menu">Sales</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="accounting.php"
                                aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span
                                    class="hide-menu">Accounting</span></a></li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Inventory</span></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                            class="hide-menu">Manage Products</span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="product_mgt.php" class="sidebar-link"><span
                                    class="hide-menu">Products Stock
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="product_history.php" class="sidebar-link"><span
                                    class="hide-menu">Products History
                                </span></a>
                        </li>
                        <!-- <li class="sidebar-item"><a href="product_report.php" class="sidebar-link"><span
                                    class="hide-menu"> Reports
                                </span></a>
                        </li> -->
                    </ul>
                </li>
                <!-- <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                            class="hide-menu">Suppliers </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="supplier_mgt.php" class="sidebar-link"><span
                                    class="hide-menu"> Manage Suppliers
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="supplier_report.php" class="sidebar-link"><span
                                    class="hide-menu"> Reports
                                </span></a>
                        </li>
                    </ul>
                </li> -->

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Authentication</span></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                            class="hide-menu">Manage User</span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="user_mgt.php" class="sidebar-link"><span
                                    class="hide-menu">User Access
                                </span></a>
                        </li>
                        <!-- <li class="sidebar-item"><a href="user_report.php" class="sidebar-link"><span
                                    class="hide-menu"> User Reports
                                </span></a>
                        </li> -->
                        <li class="sidebar-item"><a href="user_history.php" class="sidebar-link"><span
                                    class="hide-menu"> History
                                </span></a>
                        </li>
                    </ul>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Extra</span></li>
                <!-- <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="crosshair" class="feather-icon"></i><span
                            class="hide-menu">Configurations</span></a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item"><a href="config_product.php" class="sidebar-link"><span
                                    class="hide-menu"> Product Configurations</span></a>
                        </li>
                        <!-- <li class="sidebar-item"> <a class="has-arrow sidebar-link" href="javascript:void(0)"
                                aria-expanded="false"><span class="hide-menu">Reports</span></a>
                            <ul aria-expanded="false" class="collapse second-level base-level-line">
                                <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span
                                            class="hide-menu">Sales Report</span></a></li>
                            </ul>
                        </li> -->
                        <!-- <li class="sidebar-item"><a href="javascript:void(0)" class="sidebar-link"><span
                                    class="hide-menu"> item
                                    1.4</span></a></li> -->
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" data-toggle="modal" data-target="#logoutModal"
                        aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span
                            class="hide-menu">Logout</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <?php
          if (isset($_SESSION['userId'])) {
              echo '<div class="modal-footer">
                <form class="modal-footer" action="processphp/logout.php" method="POST">
                <button class="btn btn-dark" type="button" data-dismiss="modal">Cancel</button>
                <button type="submit" name="logout_btn" id="logout_btn" class="btn btn-info">Logout</button>
                </form>
                </div>';
          } else {
              
            echo '<div class="modal-footer">
                <div class="modal-body"><h4> Sorry You Do Not Have A Session, Log in First.</h4></div>
                </div>';

          }
          ?>
        </div>
    </div>
</div>