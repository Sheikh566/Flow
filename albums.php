<!DOCTYPE html>
<html lang="en">
<head>
   <?php
      include 'components/file.php';
   ?>
   <style>

     /* .container{
       margin-bottom: 5%;
     }
     .lanuage-box{
       border: 1px solid black;
       margin-top: 50px;
       padding: 40px;
     }

     .lanuage-box h4{
       text-align: center;
     } */

     .album-info{
       text-align: center;
     }
 
     .oneMusic-buy-now-area{
       margin-top: 5%;
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

  <!-- <div class="container">
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
  </div> -->

 <!--ALbums Show-->
 <section class="oneMusic-buy-now-area bg-gray section-padding-100">
        <div class="container">
            <div class="row">

            <div class="section-heading style-2">
                        <h2>Your Favourite's Albums</h2>
                    </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="100ms">
                        <div class="album-thumb">
                            <img src="dist/img/bg-img/b1.jpg" alt="">
                           
                            <!-- Play Icon
                            <div class="play-icon">
                                <a href="#" class="video--play--btn"><span class="icon-play-button"></span></a>
                            </div> -->
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>Albums Title</h5>
                            </a>
                            <p>Release : </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
 </section>

<?php
  include 'components/footer.php';
  include 'components/scripts_file.php';
?>
</body>
</html>