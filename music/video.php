<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
include $_SERVER['DOCUMENT_ROOT'] . '/flow/helpers/database.php';
$db = new Database();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/file.php' ?>
  <link href="https://unpkg.com/video.js@7/dist/video-js.min.css" rel="stylesheet" />

  <!-- City -->
  <link href="https://unpkg.com/@videojs/themes@1/dist/city/index.css" rel="stylesheet" />

  <style>
    .rounded-circle {
      width: 80px;
      height: 70px;
    }

    .bg-img {
      background-position: center;
      height: 70vh;
      background-size: cover;
    }

    .video-js {
      transition: transform .3s;
    }

    .video-js:hover {
      transform: scale(1.2);
    }

    .artist-img>img {
      height: 85px;
      object-fit: cover;
    } 
    .video-box {
      border: 2px solid #444;
      padding: 5px;
    }
  </style>
</head>

<body>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/nav.php' ?>
  <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(../dist/img/bg-img/bg-video.jpg);">
    <div class="bradcumbContent">
      <h2>Video Songs</h2>
    </div>
  </section>

  <section class="my-5 mx-5">
    <div class="container">
      <div class="row">
        <?php
        $db->selectJoin('music', 'artists', 'music.*, artists.artist_name , artists.artist_photo', "artists.artist_id = music.music_artist", "music.music_format = 'Video'");
        while ($video_music = mysqli_fetch_assoc($db->res)) {
        ?>
          <div class="col-md-4 video-box">
            <div class="card border-0">
              <video id="my_video_1" class="video-js vjs-default-skin" width="680px" height="400px" controls preload="none" poster='data:image/jpg;charset=utf8;base64,<?php echo base64_encode($video_music['music_thumbnail']); ?>' data-setup='{ "aspectRatio":"680:400"}'>
                <source src="../<?php echo $video_music['music_path'] ?>" type='video/mp4' />
              </video>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-7 mt-2">
                    <h3><?php echo $video_music['music_title'] ?></h3>
                    <h5><?php echo $video_music['artist_name'] ?></h5>
                    <p class="mb-0"><?php echo $video_music['music_year'] ?></p>
                  </div>
                  <div class="col-sm-5 my-2 artist-img d-flex justify-content-end">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($video_music['artist_photo']); ?>" alt="artist_photo" class="rounded-circle">
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>

      </div>

    </div>

  </section>







  <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/footer.php';
  include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/scripts_file.php'
  ?>

  <script src="https://vjs.zencdn.net/7.18.1/video.min.js"></script>
</body>

</html>