<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<!-- Preloader -->
<div class="preloader d-flex align-items-center justify-content-center">
    <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<!-- ##### Header Area Start ##### -->
<header class="header-area">
    <!-- Navbar Area -->
    <div class="oneMusic-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between py-0" id="oneMusicNav">

                    <!-- Nav brand -->
                    <a href="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] ?>/flow/" class="nav-brand">
                        <img src="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] ?>/flow/dist/img/core-img/flow.png" alt="">
                    </a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] ?>/flow">Home</a></li>
                                <li><a href="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] ?>/flow/albums.php">Albums</a></li>
                                <li><a href="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] ?>/flow/artists.php">Artists</a></li>
                                <li><a href="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] ?>/flow/browse.php">Browse</a></li>
                            </ul>

                            <!-- Login/Register-->
                            <div class="login-register-cart-button d-flex align-items-center">
                                <!-- Login/Register -->

                                <div class="login-register-btn mt-2">

                                    <!----Login with Sessions----->
                                    <?php
                                    if (!isset($_SESSION['user'])) {
                                        echo "<a href='http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/flow/login.php' id='loginBtn'>Login / Signup</a>";
                                    } else {
                                       echo '<h6 class="text-white">Hi , ' .$_SESSION["user"] . '
                                       <a href="helpers/logout.php?lastPage=' . $_SERVER['REQUEST_URI'] . '" class="btn btn-dark">
                                           <span class="fa fa-sign-out"></span>Log out
                                       </a>
                                   </h6>';
                                    }
                                    ?>
                                   
                                </div>
                            </div>
                        </div>
                        <!-- Nav End -->

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<style>
 .btn{
     font-size: 12px;
 }
 .mt-5{
   margin-top: 2px;
 }
</style>