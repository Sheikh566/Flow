<?php
include $_SERVER['DOCUMENT_ROOT'] . '/flow/helpers/database.php';
$db = new Database();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $db->select('artists', '*', "artist_id = $id");
  $artist = mysqli_fetch_assoc($db->res);
  $db->select('albums', '*', "album_artist = $id ORDER BY album_year");
  $albums = $db->res;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include 'components/file.php';
  ?>
  <style>
    body {
      background: black !important;
    }

    .row {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      grid-template-rows: 1fr;
      grid-column-gap: 11px;
      grid-row-gap: 0px;
    }

    .photo {
      grid-area: 1 / 1 / 2 / 2;
    }

    .albums {
      grid-area: 1 / 2 / 2 / 5;
    }

    .photo>img {
      border: 5px solid #efefef;
    }
  </style>
</head>

<body>
  <?php
  include 'components/nav.php';
  ?>
  <div class="container my-5 p-2">
    <div class="col-12">
      <div class="row mt-5">
        <div class="photo">
          <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($artist['artist_photo']); ?>" class="rounded-circle" alt="Artist Photo" style="object-fit: cover;" />
        </div>
        <div class="albums">
          <h3 class="text-center mb-4">L A T E S T &nbsp; A L B U M S</h3>
          <div class="albums-slideshow owl-carousel">
            <?php while ($row = mysqli_fetch_assoc($albums)) { ?>
              <div class="single-album">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['album_thumbnail']); ?>" alt="Album Photo" style="object-fit: cover;" />
                <div class="album-info">
                  <a href="#">
                    <h5 class="text-light"><?php echo $row['album_title'] ?></h5>
                  </a>
                  <p><?php echo $row['album_year'] ?></p>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include 'components/footer.php';
  include  'components/scripts_file.php';
  ?>
  <script>
    $(document).ready(function() {
      var owl = $('.owl-carousel');

      owl.owlCarousel({
        items: 4,
        loop: true,
        margin: 5,
        autoplay: true,
        autoplayTimeout: 100,
        autoplayHoverPause: true
      });
      owl.trigger('play.owl.autoplay',[100])
    });
  </script>
</body>

</html>