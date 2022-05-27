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
                                <li><a href="#">Music</a>
                                    <ul class="dropdown">
                                        <li><a href="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] ?>/flow/music/music.php">Audio</a></li>
                                        <li><a href="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] ?>/flow/music/video.php">Video</a></li>
                                    </ul>
                                </li>
                                <li><a href="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] ?>/flow/artists.php">Artists</a></li>
                                <li><a href="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] ?>/flow/browse.php">Browse</a></li>
                            </ul>

                            <div class="login-register-cart-button d-flex align-items-center">
                                <div class="login-register-btn">
                                    <?php
                                    if (isset($_SESSION['user'])) {
                                    ?>
                                        <div class="dropdown">
                                            <button class="dropbtn"><?php echo $_SESSION['user'] ?></button>
                                            <div class="dropdown-content">
                                                <a href="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . '/flow/helpers/logout.php?lastPage=' . $_SERVER['REQUEST_URI'] ?>">
                                                    <i class="fa fa-sign-out"></i>
                                                    <span>Signout</span>
                                                </a>
                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                              <a href="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] ?>/flow/login.php">Login / Signup</a>
                                    <?php
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
    .mt-5 {
        margin-top: 2px;
    }

    .dropbtn {
        background-color: rgba(43, 43, 43, 0.5);
        color: white;
        padding: 16px;
        font-size: 16px;
        font-weight: 900;
        border: none;
        cursor: pointer;
        transition: all 0.5s ease-out;
    }

    .dropdown {
        position: relative;
        display: inline-block;
        
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
      

    }

    .dropdown-content a {
        color: black !important;
        padding: 12px 16px !important;
        text-decoration: none;
        display: block;
    }


    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown:hover .dropbtn {
        background-color: #212529;
    }
</style>