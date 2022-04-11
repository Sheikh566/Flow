<?php
     include 'helpers/dbfunction.php';

     $funObj = new dbfunction(); 

     if(isset($_POST['btn-register'])){
        $username = $_POST['username'];  
        $email = $_POST['email'];  
        $password = $_POST['pass'];
        
        $res = $funObj->registration($username,$email,$password);
        if($res){
            echo "<script>alert('Registration Successful')</script>";  
        }else{
            echo "<script>alert('Registration Not Successful')</script>";
        }
     }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'components/file.php';
    ?>
</head>

<body>
    <?php
    include 'components/nav.php';
    ?>

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(dist/img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <p>Hi ! There</p>
            <h2>Create an account</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>New here!!</h3>
                        <!-- Login Form -->
                        <div class="login-form">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control"   name="username">
                                    <!-- <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>We'll never share your email with anyone else.</small> -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control"  name="email">
                                    <!-- <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>We'll never share your email with anyone else.</small> -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="pass">
                                </div>
                                <button type="submit" class="oneMusic-btn mt-30" name="btn-register">Sign up</button>
                                <div class="mt-2">
                                    <p> Already have an account? <a href="login.php">Login</a>.</p>
                                </div>
                            </form>
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