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

  $db->select('music', '*', "music_album = $id");
  $music = $db->res;
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
      <div class="col-12 col-lg-4 music-list-wrapper">
        <div class="weeks-top-area mb-100">
          <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
            <div class="artist d-flex justify-content-between">
              <p>Artist: </p>
              <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($album['artist_photo']); ?>" alt="Artist Image">
            </div>
            <h2>This week’s top</h2>
          </div>

          <?php while($row = mysqli_fetch_assoc($music)) { ?>
          <!-- Single Top Item -->
          <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="100ms">
            <div class="thumbnail">
              <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['music_thumbnail']); ?>" alt="">
            </div>
            <div class="content-">
              <h6><?php echo $row['music_title'] ?></h6>
              <p>Underground</p>
            </div>
          </div>
            <?php } ?>
          <!-- Single Top Item -->
          <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="150ms">
            <div class="thumbnail">
              <img src="dist/img/bg-img/wt2.jpg" alt="">
            </div>
            <div class="content-">
              <h6>Power Play</h6>
              <p>In my mind</p>
            </div>
          </div>

          <!-- Single Top Item -->
          <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="200ms">
            <div class="thumbnail">
              <img src="dist/img/bg-img/wt3.jpg" alt="">
            </div>
            <div class="content-">
              <h6>Cristinne Smith</h6>
              <p>My Music</p>
            </div>
          </div>

          <!-- Single Top Item -->
          <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="250ms">
            <div class="thumbnail">
              <img src="dist/img/bg-img/wt4.jpg" alt="">
            </div>
            <div class="content-">
              <h6>The Music Band</h6>
              <p>Underground</p>
            </div>
          </div>

          <!-- Single Top Item -->
          <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="300ms">
            <div class="thumbnail">
              <img src="dist/img/bg-img/wt5.jpg" alt="">
            </div>
            <div class="content-">
              <h6>Creative Lyrics</h6>
              <p>Songs and stuff</p>
            </div>
          </div>

          <!-- Single Top Item -->
          <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="350ms">
            <div class="thumbnail">
              <img src="dist/img/bg-img/wt6.jpg" alt="">
            </div>
            <div class="content-">
              <h6>The Culture</h6>
              <p>Pop Songs</p>
            </div>
          </div>

        </div>
      </div>
    </div>

  </section>



  <?php
  include '../components/footer.php';
  include  '../components/scripts_file.php';
  ?>
</body>

</html>