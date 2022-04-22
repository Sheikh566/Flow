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
                                        <li><a href="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] ?>/flow/music/audio.php">Audio</a></li>
                                        <li><a href="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] ?>/flow/music/video.php">Video</a></li>
                                    </ul>
                                </li>
                                <li><a href="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] ?>/flow/artist.php">Artist</a></li>
                                <!-- <li><a href="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] ?>/flow/contact.php">About us</a></li> -->
                            </ul>

                            <!-- Login/Register-->
                            <div class="login-register-cart-button d-flex align-items-center">
                                <!-- Login/Register -->

                                <div class="login-register-btn mr-50">

                                    <!----Login with Sessions----->
                                    <?php
                                    if (!isset($_SESSION['user'])) {
                                        echo "<a href='http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/flow/login.php' id='loginBtn'>Login / Signup</a>";
                                    } else {
                                    ?>
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php
                                                if ($_SESSION['user_img'] == null) {
                                                    echo '<img class="img-circle" style="width:40px;height:40px;border-radius:50%;" src="dist/img/core-img/avatar.png">';
                                                } else {
                                                    echo ' <img class="img-circle" style="width:40px;height:40px;border-radius:50%;" src="">';
                                                }
                                                ?>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                                <a  href="#" class="text-dark">Profile</a>
                                                <hr />
                                                <?php echo "<a href='helpers/logout.php?lastPage=" . $_SERVER['REQUEST_URI'] . "' class='text-dark'>Logout</a>"; ?>
                                            </div>
                                        </li>

                                    <?php } ?>

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
    li.dropdown::marker{
      display: none;
    }
.img-circle{
    border-radius: 50%;
}
    hr{
        margin: 0px;
        display: none;
    }
</style>