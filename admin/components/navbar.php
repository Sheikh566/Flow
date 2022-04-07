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
        <a class="navbar-brand" href="http://<?php echo $_SERVER['SERVER_NAME']?>/flow/admin/index.php">
            <!-- Logo icon -->
            <b class="logo-icon">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img src="http://<?php echo $_SERVER['SERVER_NAME']?>/flow/admin/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                <!-- Light Logo icon -->
                <img src="http://<?php echo $_SERVER['SERVER_NAME']?>/flow/admin/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
            </b>
            <!--End Logo icon -->
            <!-- Logo text -->
            <span class="logo-text">
                <!-- dark Logo text -->
                <img src="http://<?php echo $_SERVER['SERVER_NAME']?>/flow/admin/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                <!-- Light Logo text -->
                <img src="http://<?php echo $_SERVER['SERVER_NAME']?>/flow/admin/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
            </span>
        </a>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <!-- This is for the sidebar toggle which is visible on mobile only -->
        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                class="mdi mdi-menu"></i></a>
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
                Welcome, Sheikh Abdullah
            </li>
            <li class="nav-item d-flex align-items-center mx-3 fs-4">
               <a href="#"><b>Logout</b></a>
            </li>
        </ul>
    </div>
  </nav>
</header>