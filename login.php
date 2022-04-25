<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include $_SERVER['DOCUMENT_ROOT'] . '/flow/helpers/database.php';

$db = new Database();
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $db->select('users', '*', "user_email = '$email' AND user_password = '$password'");
    if (mysqli_num_rows($db->res) > 0) {
        $user = mysqli_fetch_array($db->res);
        $_SESSION['user'] = $user['user_name'];
        $_SESSION['user_img']=$user['user_img'];
        header('location:./index.php');
    } else{
        $db->select('admins', "*", "admin_email = '$email' AND admin_password = '$password'");
        if(mysqli_num_rows($db->res) > 0) {
            $admin = mysqli_fetch_array($db->res);
            $_SESSION['admin'] = $admin['admin_name'];
            header('location:./admin/');
        }
        else {
            echo "<script>alert('Invalid Email or Password!')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'components/file.php' ?>
</head>

<body>
    <?php include 'components/nav.php' ?>

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(dist/img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <p>We missed you!</p>
            <h2>Login</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>Welcome Back</h3>
                        <!-- Login Form -->
                        <div class="login-form">
                            <form method="post">
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                    <!-- <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>We'll never share your email with anyone else.</small> -->
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                                </div>
                                <button type="submit" name="submit" class="oneMusic-btn mt-30">Login</button>

                            </form>
                            <div class="mt-2">
                                <a href="#">Forgot Password?</a>
                            </div>

                            <div class="mt-2">
                                <p>Not have an account? <a href="signup.php">Sign up</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Login Area End ##### -->

    <?php
    include 'components/footer.php';
    include 'components/scripts_file.php';
    ?>

</body>

</html>