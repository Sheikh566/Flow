<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

include $_SERVER['DOCUMENT_ROOT'] . '/flow/helpers/database.php';
$db = new Database();


if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $db->selectJoin('albums', 'artists', 'albums.*, artists.*', "artists.artist_id = albums.album_artist", "album_id = $id");
  $album = mysqli_fetch_assoc($db->res);

  if (!isset($_SESSION['user'])) {
    header("location:http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/flow/login.php");
  } else {
    $db->select('music', '*', "music_album = $id");
    $music = $db->res;
  }
  
 
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include '../components/file.php';
  ?>
  <style>
    .bg-img {
      background-image: url("<?php echo 'data:image/jpg;charset=utf8;base64,' . base64_encode($album['album_thumbnail']) ?>");
    }

    .music-list-wrapper {
      width: 150%;
    }
    .artist > img {
      object-fit: cover;
      width: 70px;
      height: 70px;
      border-radius: 50%;
    }
  </style>
</head>

<body>
  <?php
  include '../components/nav.php';
  ?>

  <!-- ##### Breadcumb Area Start ##### -->
  <?php

  ?>
  <section class="breadcumb-area bg-img bg-overlay">
    <div class="bradcumbContent">
      <h2><?php echo $album['album_title'] ?></h2>
    </div>
  </section>

  <section class="d-flex justify-content-center">
    <div class="" style="width: max-content">
      <div class="image-wrapper d-flex justify-content-center my-5">
        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($album['album_thumbnail']); ?>" alt="Album Thumbnail" class="rounded-circle" style="object-fit: cover" width="200px">
      </div>
  
    </div>
  </section>


  <section class="miscellaneous-area">
        <div class="container">
            <div class="row">


            <div class="col-12 col-lg-12">
                    <div class="new-hits-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($album['artist_photo']); ?>" alt="Album Thumbnail" class="rounded-circle" style="object-fit: cover" width="200px">
                        <h4><?php echo $album['artist_name']?></h4>   
                      </div>

                        <?php while($row = mysqli_fetch_assoc($music)) { ?>
                        <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
                            <div class="first-part d-flex align-items-center">
                                <div class="thumbnail">
                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['music_thumbnail']); ?>" alt="">
                              </div>
                                <div class="content-">
                                <h6><?php echo $row['music_title'] ?></h6>
                                </div>
                            </div>
                            <audio preload="auto" controls>
                                <source src="../<?php echo $row['music_path'] ?>">
                            </audio>
                        </div>

                        <?php } ?>

            </div>
        </div>
  </section>


  <?php
  include '../components/footer.php';
  include  '../components/scripts_file.php';
  ?>
</body>

</html>