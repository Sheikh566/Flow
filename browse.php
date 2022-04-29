<?php
if (session_status() === PHP_SESSION_NONE) {
      session_start();
  }
  
include $_SERVER['DOCUMENT_ROOT'] . '/flow/helpers/database.php';
$db = new Database();

if (isset($_GET['search'])) {
     $terms = explode(' ', strtolower($_GET['search']));
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <?php
      include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/file.php';
      ?>
      <style>

            .album-info {
                  text-align: center;
                  white-space: nowrap;
                  overflow: hidden;
                  text-overflow: ellipsis;
            }

            /* Main aspect ratio of artist image*/
            .single-album>img {
                  width: 100%;
                  height: 100%;
                  object-fit: cover;

            }

            .single-album-item {
                  display: block;
                  padding: 0;
                  min-width: 250px;

            }

            p.see-artist {
                  transition: letter-spacing .1s ease-out;
            }

            .single-album-item:hover {
                  transform: scale(1.05);
                  z-index: 99;
            }

            .single-album-item:hover p.see-artist {
                  letter-spacing: .6px;
            }

            .single-album>img {
                  width: 280px;
                  height: 280px;
                  object-fit: cover;
            }

            .input-text {
                  height: 60px;
                  border: 2px solid black !important;
                  border-radius: 2 0px 0px 2px;
                  font-family: "Archivo Narrow";

            }
            .input-text:focus {
                  box-shadow: -2px 2px 5px 2px rgba(0, 0, 0, .3);
                  border: 3px solid black !important;
                  outline: 0px
            }
            .searchBtn {
                  height: 60px;
                  border: 2px solid black !important;
                  border-radius: 0 2px 2px 0;

            }
            .searchBtn:hover {
                  box-shadow: 0px 0px 3px 3px #f8c146 !important;
                  width: 100px;
                  font-size: 20px;
                  color: white;
            }
            .form-control {
                  border: 1px solid #f8c146
            }

            @media screen and (max-width: 768px) {
                  .single-album-item {
                        display: block;
                        padding: 0;
                        min-width: 150px;
                  }

                  .single-album>img {
                        width: 90vw;
                        height: 90vw;
                  }

                  h5.artist-name {
                        font-size: 30px !important;
                  }

                  p.see-artist {
                        font-size: 15px !important;
                  }
            }

            @media screen and (max-width: 480px) {
                  .single-album-item {
                        display: block;
                        padding: 5px;
                        width: 90%;
                  }
            }

            .oneMusic-buy-now-area {
                  margin-top: 5%;
            }
      </style>
      <link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] ?>/flow/dist/css/searchbar.css">

</head>

<body>
      <?php
      include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/nav.php';
      ?>

      <!-- ##### Breadcumb Area Start ##### -->
      <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(../dist/img/bg-img/album-bg.jpg);">
            <div class="bradcumbContent">
                  <h2>Browse</h2>
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
                        <form action="" method="GET">
                        <div class="input-group mb-5 ms-3 mr-5"> 
                              <input type="text" class="form-control input-text fs-5" name="search" placeholder="Search Music, Artists and Albums" aria-describedby="basic-addon2">
                              <div class="input-group-append"> 
                                    <button class="btn btn-outline-warning btn-lg searchBtn" type="button"><i class="fa fa-search"></i></button> 
                              </div>
                        </div>
                        </form>
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
                                          <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['album_thumbnail']); ?>" alt="Album Thumbnail">
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
      include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/footer.php';
      include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/scripts_file.php';
      ?>
</body>

</html>