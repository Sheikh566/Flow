<?php
include $_SERVER['DOCUMENT_ROOT'] . '/flow/helpers/database.php';
$db = new Database();

$db->selectJoin('albums', 'artists', 'albums.*, artists.artist_name', 'albums.album_artist = artists.artist_id');
$albums = $db->res;

$db->selectJoin(
  'artists',
  'music',
  'artists.*, count(music.music_id) as total_tracks',
  'music.music_artist = artists.artist_id',
  "1=1 GROUP BY artists.artist_id ORDER BY total_tracks DESC LIMIT 12",
  "LEFT"
);
$artists = $db->res;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include 'components/file.php';
  ?>
  <style>
    .single-album>img,
    .album-thumb>img {
      object-fit: cover;
      height: 240px;
      width: 240px;

    }

    .album-thumb>img {
      border-radius: 5px;
      width: 290px;
    }

    .thumbnail>img {
      height: 73px;
      width: 73px;
      object-fit: cover;
    }
  </style>
</head>

<body>
  <?php
  include 'components/nav.php';
  ?>

  <!-- ##### Hero Area Start ##### -->
  <section class="hero-area">
    <div class="hero-slides owl-carousel">
      <!-- Single Hero Slide -->
      <div class="single-hero-slide d-flex align-items-center justify-content-center">
        <!-- Slide Img -->
        <div class="slide-img bg-img" style="background-image: url(dist/img/bg-img/young-stunners.jpg);"></div>
        <!-- Slide Content -->
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="hero-slides-content text-center">
                <h6 data-animation="fadeInUp" data-delay="100ms">Latest Release</h6>
                <h2 data-animation="fadeInUp" data-delay="300ms">PHIR MILENGE <span>PHIR MILENGE</span>
                </h2>
                <a data-animation="fadeInUp" data-delay="500ms" href="music/music.php" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Single Hero Slide -->
      <div class="single-hero-slide d-flex align-items-center justify-content-center">
        <!-- Slide Img -->
        <div class="slide-img bg-img" style="background-image: url(dist/img/bg-img/travis-1.jpg);"></div>
        <!-- Slide Content -->
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="hero-slides-content text-center">
                <h6 data-animation="fadeInUp" data-delay="100ms">Upcomming album</h6>
                <h2 data-animation="fadeInUp" data-delay="300ms">UTOPIA<span>UTOPIA</span></h2>
                <a data-animation="fadeInUp" data-delay="500ms" href="albums.php" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Single Hero Slide -->
      <div class="single-hero-slide d-flex align-items-center justify-content-center">
        <!-- Slide Img -->
        <div class="slide-img bg-img" style="background-image: url(dist/img/bg-img/billie.webp);"></div>
        <!-- Slide Content -->
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="hero-slides-content text-center">
                <h6 data-animation="fadeInUp" data-delay="100ms">Latest album</h6>
                <h2 data-animation="fadeInUp" data-delay="300ms">HAPPIER THAN EVER<span>HAPPIER THAN EVER</span></h2>
                <a data-animation="fadeInUp" data-delay="500ms" href="albums.php" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ##### Hero Area End ##### -->

  <!-- ##### Latest Albums Area Start ##### -->
  <section class="latest-albums-area section-padding-100" data-aos="fade-up" data-aos-duration="3000">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-heading style-2">
            <h2>New Albums</h2>
          </div>
        </div>
      </div>

      <div class="row">


        <div class="col-12">
          <div class="albums-slideshow owl-carousel">
            <!-- Single Album -->
            <?php while ($row = mysqli_fetch_assoc($albums)) { ?>
              <div class="single-album">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['album_thumbnail']); ?>" alt="Album Thumbnail">
                <div class="album-info">
                  <a href="sub-show/album_page.php?id=<?php echo $row['album_id'] ?>">
                    <h5><?php echo $row['album_title'] ?></h5>
                  </a>
                  <p><?php echo $row['artist_name'] ?></p>
                </div>
              </div>
            <?php } ?>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ##### Latest Albums Area End ##### -->

  <!-- ##### Buy Now Area Start ##### -->
  <section class="oneMusic-buy-now-area has-fluid bg-gray section-padding-100">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="section-heading style-2">
            <h2>Our Artists</h2>
          </div>
        </div>
      </div>

      <div class="row">

        <!-- Single Album Area -->
        <?php while ($row = mysqli_fetch_assoc($artists)) { ?>
          <div class="col-12 col-sm-6 col-md-4 col-lg-2">
            <div class="single-album-area wow fadeInUp" data-wow-delay="100ms">
              <div class="album-thumb">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['artist_photo']); ?>" alt="Artist Photo">

              </div>
              <div class="album-info" style="text-align: center;">
                <a href="sub-show/artist_page.php?id=<?php echo $row['artist_id']; ?>">
                  <h5><?php echo $row['artist_name'] ?></h5>
                </a>
                <p>Tracks: <?php echo $row['total_tracks'] ?></p>
              </div>
            </div>
          </div>
        <?php } ?>


      </div>

      <div class="row">
        <div class="col-12">
          <div class="load-more-btn text-center wow fadeInUp" data-wow-delay="300ms">
            <a href="./artists.php" class="btn oneMusic-btn">See All Artists <i class="fa fa-angle-double-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ##### Buy Now Area End ##### -->
  <?php
  $db->select('music', 'music_thumbnail, music_path', 'music_id = 1');
  $pasoori = mysqli_fetch_assoc($db->res);
  ?>
  <!-- ##### Featured Artist Area Start ##### -->
  <section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image: url(dist/img/bg-img/bg-4.jpg);">
    <div class="container">
      <div class="row align-items-end">
        <div class="col-12 col-md-5 col-lg-4">
          <div class="featured-artist-thumb">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($pasoori['music_thumbnail']); ?>" alt="Featured Music Thumbnail" data-aos="zoom-in">
          </div>
        </div>
        <div class="col-12 col-md-7 col-lg-8">
          <div class="featured-artist-content">
            <!-- Section Heading -->
            <div class="section-heading white text-left mb-30">
              <p>Trending Now</p>
              <h2>About Pasoori</h2>
            </div>
            <p class="fs-6">
              Pasoori is a Punjabi song released in 2022 in Coke Studio.
              The song was composed by talented musicians such as Ali Sethi and Shae Gill.
            </p>
            <div class="song-play-area" data-aos="fade-bottom">
              <div class="song-name">
                <p>Pasoori | Ali Sethi x Shae Gill</p>
              </div>
              <audio preload="auto" controls>
                <source src=".<?php echo $pasoori['music_path'] ?>">
              </audio>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ##### Featured Artist Area End ##### -->

  <!-- ##### Miscellaneous Area Start ##### -->
  <section class="miscellaneous-area section-padding-100-0">
    <div class="container">
      <div class="row">
        <!-- ***** New Hits Songs ***** -->
        <div class="col-12 col-lg-4">
          <div class="new-hits-area mb-100">
            <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
              <p>Worldwide</p>
              <h2>New Hits</h2>
            </div>
            <?php
            $db->selectJoin('music', 'artists', 'music.*, artists.artist_name', "artists.artist_id = music.music_artist", "1=1 limit 6");
            while ($row = mysqli_fetch_assoc($db->res)) {
            ?>
              <!-- Single Top Item -->
              <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
                <div class="first-part d-flex align-items-center">
                  <div class="thumbnail">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['music_thumbnail']); ?>" alt="">
                  </div>
                  <div class="content-">
                    <h6><?php echo $row['music_title'] ?></h6>
                    <p><?php echo $row['artist_name'] ?></p>
                  </div>
                </div>
              </div>

            <?php } ?>
          </div>
        </div>

        <!-- ***** Weeks Top ***** -->
        <div class="col-12 col-lg-4">
          <div class="weeks-top-area mb-100">
            <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
              <p>Listen</p>
              <h2>This week’s top</h2>
            </div>

            <?php
            $db->selectJoin('albums', 'artists', 'albums.*, artists.artist_name', "artists.artist_id = albums.album_artist", "1=1 limit 6");
            while ($row = mysqli_fetch_assoc($db->res)) {
            ?>
              <!-- Single Top Item -->
              <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="100ms">
                <div class="thumbnail">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['album_thumbnail']); ?>" alt="Album Thumbnail">
                </div>
                <div class="content-">
                  <h6><?php echo $row['album_title'] ?></h6>
                  <p><?php echo $row['artist_name'] ?></p>
                </div>
              </div>
            <?php } ?>

          </div>
        </div>

        <!-- ***** Popular Artists ***** -->
        <div class="col-12 col-lg-4">
          <div class="popular-artists-area mb-100">
            <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
              <p>See what’s new</p>
              <h2>Popular Artist</h2>
            </div>

            <!-- Single Artist -->
            <?php
            // Selects Top 6 artists with most no. of music (in DB)
            $db->selectJoin(
              'artists',
              'music',
              'artists.artist_name, artists.artist_photo',
              'artists.artist_id = music.music_artist',
              '1=1 GROUP BY artists.artist_id, artists.artist_name ORDER BY count(*) DESC LIMIT 6'
            );
            while ($row = mysqli_fetch_assoc($db->res)) {
            ?>
              <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
                <div class="thumbnail">
                  <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['artist_photo']); ?>" alt="Artist Photo">
                </div>
                <div class="content-">
                  <p><?php echo $row['artist_name'] ?></p>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ##### Miscellaneous Area End ##### -->


  <!-- ##### Contact Area Start ##### -->
  <section class="contact-area section-padding-100 bg-img bg-overlay bg-fixed has-bg-img" style="background-image: url(dist/img/bg-img/billie-bg.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-heading white wow fadeInUp" data-wow-delay="100ms">
            <p>See what’s new</p>
            <h2>Get In Touch</h2>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <!-- Contact Form Area -->
          <div class="contact-form-area">
            <form action="#" method="post">
              <div class="row">
                <div class="col-md-6 col-lg-4">
                  <div class="form-group wow fadeInUp" data-wow-delay="100ms">
                    <input type="text" class="form-control" id="name" placeholder="Name">
                  </div>
                </div>
                <div class="col-md-6 col-lg-4">
                  <div class="form-group wow fadeInUp" data-wow-delay="200ms">
                    <input type="email" class="form-control" id="email" placeholder="E-mail">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group wow fadeInUp" data-wow-delay="300ms">
                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group wow fadeInUp" data-wow-delay="400ms">
                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                  </div>
                </div>
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="500ms">
                  <button class="btn oneMusic-btn mt-30" type="submit">Send <i class="fa fa-angle-double-right"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ##### Contact Area End ##### -->



  <?php
  include 'components/footer.php';
  include  'components/scripts_file.php';
  ?>
</body>

</html>