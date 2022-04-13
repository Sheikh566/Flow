<?php
    include 'helpers/database.php';
    $db = new Database();

    if($db->conn){
              if(isset($_POST['btn-register'])){

                $data =[
                    'name' => mysqli_real_escape_string($db->conn,$_POST['u_name']),
                    'email' => mysqli_real_escape_string($db->conn,$_POST['u_email']),
                    'pass' => mysqli_real_escape_string($db->conn,$_POST['u_pass']),
                    'confirm_pass' => mysqli_real_escape_string($db->conn,$_POST['c_pass']),

                     'name_error' => '',
                     'email_error' => '',
                     'password_error' => '',
                     'confirm_error' => '',
  
                ];
                 
                  /////Name validate/////
                  if(empty($data['name'])){
                      $data['name_error'] = "Name is required";
                  }elseif(!preg_match("/^[a-zA-Z ]+$/",$data['name_error'])){
                      $data['name_error'] = "Name must contain only alphabets and space";
                  }
               
                  ////email validate////


                  ////////Password validate/////////

                           
              }
            }else{
                echo "Connection Failed";
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
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="form-group">
                                    <label for="exampleInputText1">Name</label>
                                    <input type="text" class="form-control" name="u_name" value="<?php if(!empty($data['name'])): echo $data['name'];  endif;?>" 
                                        maxlength="50">
                                    <span class="text-danger">
                                      <?php if(!empty($data['name_error'])):  ?>
                                        <?php echo $data['name_error'] ?>
                                      <?php endif;?>
                                    </span>
                                    <!-- <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>We'll never share your email with anyone else.</small> -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control"  name="u_email">
                                    <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="u_pass">
                                    <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Comfirm Password</label>
                                    <input type="password" class="form-control" name="c_pass">
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