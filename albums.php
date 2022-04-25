<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      include 'components/file.php';
   ?>
   <style>
     .lanuage-box{
       border: 1px solid black;
       margin-top: 50px;
       padding: 40px;
     }

     .lanuage-box h4{
       text-align: center;
     }
   </style>
</head>
<body>
<?php
  include 'components/nav.php';
?>

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(dist/img/bg-img/album-bg.jpg);">
        <div class="bradcumbContent">
            <h2>ALbums</h2>
        </div>
    </section>

  <div class="container">
  <div class="row">
    <div class="col-md-6">
          <div class="lanuage-box">
            <h4>Language : Regional : </h4>
          </div>
    </div>

    <div class="col-md-6">
    <div class="lanuage-box">
    <h4>Language : English : </h4>
            </div>
    </div>
  </div>
  </div>

<?php
  // include 'components/footer.php';
  include 'components/scripts_file.php';
?>
</body>
</html>