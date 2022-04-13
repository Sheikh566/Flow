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
                    <a href="http://<?php echo $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']?>/flow/" class="nav-brand">
                        <img src="http://<?php echo $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']?>/flow/dist/img/core-img/flow.png" alt="">
                    </a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="http://<?php echo $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']?>/flow">Home</a></li>
                                <li><a href="albums.php">Albums</a></li>
                                <li><a href="#">Music</a>
                                    <ul class="dropdown">
                                        <li><a href="http://<?php echo $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']?>/flow/music/audio.php">Audio</a></li>
                                        <li><a href="http://<?php echo $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']?>/flow/music/video.php">Video</a></li>
                                    </ul>
                                </li>
                                <li><a href="http://<?php echo $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']?>/flow/artist.php">Artist</a></li>
                                <li><a href="http://<?php echo $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']?>/flow/contact.php">Contact</a></li>
                            </ul>

                            <!-- Login/Register & Cart Button -->
                            <div class="login-register-cart-button d-flex align-items-center">
                                <!-- Login/Register -->
                                <div class="login-register-btn mr-50">
                                    <a href="http://<?php echo $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']?>/flow/login.php" id="loginBtn">Login / Signup</a>
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