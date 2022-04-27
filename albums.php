<?php
include $_SERVER['DOCUMENT_ROOT'] . '/flow/helpers/database.php';
$db = new Database();
?>

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
 <section class="album-catagory section-padding-100-0">
        <div class="container">
            <div class="col-md-12">
                <div class="browse-by-catagories catagory-menu d-flex justify-content-center flex-wrap mb-70">
                    <a href="#" data-filter="*">Browse All</a>
                    <a href="#" data-filter=".a" class="active">A</a>
                    <a href="#" data-filter=".b">B</a>
                    <a href="#" data-filter=".c">C</a>
                    <a href="#" data-filter=".d">D</a>
                    <a href="#" data-filter=".e">E</a>
                    <a href="#" data-filter=".f">F</a>
                    <a href="#" data-filter=".g">G</a>
                    <a href="#" data-filter=".h">H</a>
                    <a href="#" data-filter=".i">I</a>
                    <a href="#" data-filter=".j">J</a>
                    <a href="#" data-filter=".k">K</a>
                    <a href="#" data-filter=".l">L</a>
                    <a href="#" data-filter=".m">M</a>
                    <a href="#" data-filter=".n">N</a>
                    <a href="#" data-filter=".o">O</a>
                    <a href="#" data-filter=".p">P</a>
                    <a href="#" data-filter=".q">Q</a>
                    <a href="#" data-filter=".r">R</a>
                    <a href="#" data-filter=".s">S</a>
                    <a href="#" data-filter=".t">T</a>
                    <a href="#" data-filter=".u">U</a>
                    <a href="#" data-filter=".v">V</a>
                    <a href="#" data-filter=".w">W</a>
                    <a href="#" data-filter=".x">X</a>
                    <a href="#" data-filter=".y">Y</a>
                    <a href="#" data-filter=".z">Z</a>
                    <a href="#" data-filter=".number">0-9</a>
                </div>
            </div>

            <div class="oneMusic-albums">
                <?php
                $db->select('albums', '*');
                while ($row = mysqli_fetch_assoc($db->res)) {
                    $firstLetters = ""; // Get first letter of each word of artist name
                    foreach (explode(' ', strtolower($row['album_title'])) as $word) {
                        $firstLetters .= "$word[0] ";
                    }
                ?>
                    <a href="./sub-show/album_page.php?id=<?php echo $row['album_id'] ?>" class="single-album-item ms-4 <?php echo $firstLetters ?>">
                        <div class="single-album">
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['album_thumbnail']); ?>" alt="Album Thumbnail" style="object-fit: cover; min-width: 200px; height: 200px;">
                            <div class="album-info">
                                <h5><?php echo $row['album_title'] ?></h5>
                                <p>S E E &nbsp; A L B U M</p>
                            </div>
                        </div>
                    </a>
                <?php } ?>

            </div>


        </div>
    </section>

<?php
  include 'components/footer.php';
  include 'components/scripts_file.php';
?>
</body>
</html>