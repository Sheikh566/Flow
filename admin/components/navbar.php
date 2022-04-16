<?php 
if (session_status() === PHP_SESSION_NONE) {
session_start();
}
?>

<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
<div class="lds-ripple">
  <div class="lds-pos"></div>
  <div class="lds-pos"></div>
</div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
    data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
<!-- Navbar -->
<header class="topbar" data-navbarbg="skin6">
  <nav class="navbar top-navbar navbar-expand-md navbar-light">
    <div class="navbar-header" data-logobg="skin6">
          <!-- ============================================================== -->
          <!-- Logo -->
          <!-- ============================================================== -->
        <a class="navbar-brand" href="http://<?php echo $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']?>/flow/admin/index.php">
            <!-- Logo icon -->
            <b class="logo-icon">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <img src="http://<?php echo $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']?>/flow/dist/img/core-img/flow-dark.png" width="100px" alt="homepage" class="dark-logo" />
            </b>
        </a>
        <!-- This is for the sidebar toggle which is visible on mobile only -->
        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
            <i class="mdi mdi-menu"></i>
        </a>
    </div>
    <!-- ============================================================== -->
    <!-- End Logo -->
    <!-- ============================================================== -->
    <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
        <!-- ============================================================== -->
        <!-- toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav float-start me-auto">
            <!-- ============================================================== -->
            <!-- Search -->
            <!-- ============================================================== -->
            
            <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                    href="javascript:void(0)"><i class="mdi mdi-magnify me-1"></i> <span class="font-16">Search</span></a>
                <form class="app-search position-absolute">
                    <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                        class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                </form>
            </li>
        </ul>
        <!-- ============================================================== -->
        <!-- Right side toggle and nav items -->
        <!-- ============================================================== -->
        <ul class="navbar-nav float-end">
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <li class="nav-item d-flex align-items-center mx-3 fs-4">
                Welcome, <?php echo $_SESSION['admin'] ?>
            </li>
            <li class="nav-item d-flex align-items-center mx-3 fs-4">
               <a href="http://<?php echo $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']?>/flow/helpers/logout.php"><b>Logout</b></a>
            </li>
        </ul>
    </div>
  </nav>
</header>