<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

include $_SERVER['DOCUMENT_ROOT'] . '/flow/helpers/database.php';
$db = new Database();
$search = '';
if (isset($_GET['search'])) {
  $search = $_GET['search'];

  // Check if search contains only whitespaces
  if (ctype_space($search)) {
    // put random string so LIKE couldn't match anything. :)
    $search = '821ad4ad3das3';
  }
  // removes multiple whitespace, trailing whitespace, and lowers
  $terms = explode(' ', preg_replace('/\s\s+/', ' ', strtolower(trim($search))));

  function search($table, $searchCol, $keywords)
  {
    global $db;
    $where = Helper::conditionsChainer($searchCol, $keywords);
    $db->select($table, '*', $where);
    return $db->res;
  };
  if (isset($_GET['albums'])) {
    $albums = search('albums', 'album_title', $terms);
  }
  if (isset($_GET['music'])) {
    $music = search('music', 'music_title', $terms);
  }
  if (isset($_GET['artists'])) {
    $artists = search('artists', 'artist_name', $terms);
  }
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

    .filterBox {
      border-bottom: 5px solid black;
      border-radius: 5px;
    }

    .oneMusic-btn {
      width: 40px;
      border-radius: 0px;
      border-top: 2px solid black;
      border-left: 2px solid black;
      border-right: 2px solid black;

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

  <section class="album-catagory section-padding-100-0">
    <div class="container">
      <!-- Search Panel -->
      <div class="col-md-12">
        <form action="" method="GET">
          <!-- Filters -->
          <div class="input-group ms-3 mr-5 mb-1 d-flex justify-content-between filterBox">
            <span class="align-bottom ms-2 pt-3 fs-5">FILTERS: </span>
            <div class="mb-0 me-2">
              <input type="checkbox" class="btn-check" id="btn-check-outlined0" autocomplete="off">
              <label class="btn btn-outline-warning oneMusic-btn m-0 fs-4 text-dark" for="btn-check-outlined0">All</label>

              <input type="checkbox" class="btn-check filter" id="btn-check-outlined1" name='music' autocomplete="off">
              <label class="btn btn-outline-warning oneMusic-btn m-0 fs-4 text-dark" for="btn-check-outlined1">Music</label>

              <input type="checkbox" class="btn-check filter" id="btn-check-outlined2" name='artists' autocomplete="off">
              <label class="btn btn-outline-warning oneMusic-btn m-0 fs-4 text-dark" for="btn-check-outlined2">Artists</label>

              <input type="checkbox" class="btn-check filter" id="btn-check-outlined3" name='albums' autocomplete="off">
              <label class="btn btn-outline-warning oneMusic-btn m-0 fs-4 text-dark" for="btn-check-outlined3">Albums</label>
            </div>
          </div>
          <!-- SearchBox -->
          <div class="input-group mb-5 ms-3 mr-5">
            <input type="text" class="form-control input-text" name="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>" placeholder="Search Music, Artists and Albums" aria-describedby="basic-addon2" required>
            <div class="input-group-append">
              <button class="btn btn-outline-warning btn-lg searchBtn" type="submit"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </form>
      </div>

      <?php if (isset($_GET['music'])) {
        echo "<h1 class='text-center mb-3'>M U S I C</h1>";
        if (mysqli_num_rows($music) == 0) {
          echo "<h4 class='text-black-50'>Sorry, no song matched your query</h4>";
        }
      } ?>
      <div class="oneMusic-albums">
        <?php
        if (isset($music)) {
          while ($row = mysqli_fetch_assoc($music)) {
        ?>
            <a href="./sub-show/music_page.php?id=<?php echo $row['music_id'] ?>" class="single-album-item ms-4">
              <div class="single-album">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['music_thumbnail']); ?>" alt="Music Thumbnail">
                <div class="album-info">
                  <h5><?php echo $row['music_title'] ?></h5>
                  <p>L I S T E N</p>
                </div>
              </div>
            </a>
        <?php }
        } ?>
      </div>

      <?php if (isset($_GET['artists'])) {
        echo "<hr><h1 class='text-center mb-3'>A R T I S T S</h1>";
        if (mysqli_num_rows($artists) == 0) {
          echo "<h4 class='text-black-50'>Sorry, no artist matched your query</h4>";
        }
      } ?>
      <div class="oneMusic-albums">
        <?php
        if (isset($artists)) {
          while ($row = mysqli_fetch_assoc($artists)) {
        ?>
            <a href="./sub-show/artist_page.php?id=<?php echo $row['artist_id'] ?>" class="single-album-item ms-4">
              <div class="single-album">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['artist_photo']); ?>" alt="Artist Photo">
                <div class="album-info">
                  <h5><?php echo $row['artist_name'] ?></h5>
                  <p>S E E &nbsp; A R T I S T</p>
                </div>
              </div>
            </a>
        <?php }
        } ?>
      </div>

      <?php if (isset($_GET['albums'])) {
        echo "<hr><h1 class='text-center mb-3'>A L B U M S</h1>";
        if (mysqli_num_rows($albums) == 0) {
          echo "<h4 class='text-black-50'>Sorry, no album matched your query</h4>";
        }
      } ?>
      <div class="oneMusic-albums">
        <?php
        if (isset($albums)) {
          while ($row = mysqli_fetch_assoc($albums)) {
        ?>
            <a href="./sub-show/album_page.php?id=<?php echo $row['album_id'] ?>" class="single-album-item ms-4">
              <div class="single-album">
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['album_thumbnail']); ?>" alt="Album Thumbnail">
                <div class="album-info">
                  <h5><?php echo $row['album_title'] ?></h5>
                  <p>S E E &nbsp; A L B U M</p>
                </div>
              </div>
            </a>
        <?php }
        } ?>
      </div>

    </div>
  </section>

  <?php
  include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/footer.php';
  include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/scripts_file.php';
  ?>
  <script>
    $(document).ready(function() {

      // Checks filter buttons after refresh
      $('#btn-check-outlined1').prop('checked', <?php echo json_encode(isset($_GET['music'])) ?>);
      $('#btn-check-outlined2').prop('checked', <?php echo json_encode(isset($_GET['artists'])) ?>);
      $('#btn-check-outlined3').prop('checked', <?php echo json_encode(isset($_GET['albums'])) ?>);

      // Checks "ALL" button if all filter buttons are checked
      $('#btn-check-outlined0').prop('checked', $('.filter:checked').length == $('.filter').length);
      // Checks all filters when click on 'All' button
      $('#btn-check-outlined0').on('change', function() {
        $('.filter').prop('checked', $(this).prop('checked'));
      })

      // Uncheck 'All' button if any of the filter is unchecked
      $('.filter').on('change', function() {
        $('#btn-check-outlined0').prop('checked', $('.filter:checked').length == $('.filter').length);
      })
      <?php if (!isset($_GET['search'])) { ?>
        $('.btn-check').prop('checked', true);
      <?php } ?>
    })
  </script>
</body>

</html>