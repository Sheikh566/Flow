<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
include $_SERVER['DOCUMENT_ROOT'] . '/flow/helpers/database.php';
$db = new Database();
if (!isset($_SESSION['user'])) {
  header("location:http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/flow/login.php");
} else {
  $db->select('reviews', '*', "`music_id` = " . $_GET['id'] . " AND `user_id` = " . $_SESSION['user_id']);
  $my_review = mysqli_fetch_assoc($db->res);
}
// if (!isset($_GET['id'])) {
//   header("location:http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] . "/flow/music.php");
// }



if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $db->selectJoin('music', 'artists', 'music.*, artists.artist_name', "artists.artist_id = music.music_artist", "music_id = $id");
  $music = mysqli_fetch_assoc($db->res);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/file.php' ?>
  <link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] ?>/flow/dist/css/music_page.css">

  <style>
    :root {
      background: rgb(2, 0, 36);

      overflow: hidden;

    }

    .bg-image {
      /* The image used */
      background-image: url("data:image/jpg;charset=utf8;base64,<?php echo base64_encode($music['music_thumbnail']); ?>");
      position: absolute;
      width: 110%;

      /* Add the blur effect */
      filter: blur(8px);
      -webkit-filter: blur(50px);

      /* Full height */
      height: 110%;

      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    .container {
      font-family: 'Quicksand', sans-serif;
    }

    .music-player {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: #ffffff12;
      width: 70%;
      height: 340px;
      border-radius: 15px;
      padding-left: 40px;
      box-shadow: 0px 17px 118px 7px rgb(0 0 0 / 40%);
      display: flex;
      align-items: center;

    }

    .music-player::before {
      box-shadow: inset 0 0 2000px rgba(255, 255, 255, .5);
      filter: blur(10px);
    }

    #music-icon {
      height: 160px;
      width: 160px;
      border-radius: 50%;
      object-fit: cover;
    }

    .info {
      margin-left: 40px;
      width: 100%;
      box-shadow: -3px -1px 81px -2px;
      padding: 40px;
      background: white;
      border-radius: 10px;
    }

    .info h3 {
      margin-bottom: 10px;
    }

    .music-player img {
      margin-top: 8px;
    }

    div.classy-nav-container {
      background-color: black !important;
    }

    .audioplayer {
      border: none;
    }

    .review i {
      color: #444;
    }

    .modal-backdrop {
      z-index: -1;
    }
  </style>
</head>

<body>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/nav.php' ?>
  <div class="bg-image"></div>

  <div class="container">
    <div class="music-player">
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($music['music_thumbnail']); ?>" alt="music-icon" id="music-icon">
      <div class="info">
        <h1><?php echo $music['music_title']; ?></h1>
        <h3><?php echo $music['artist_name']; ?></h3>
        <audio controls>
          <source src="../<?php echo $music['music_path']; ?>">
        </audio>
        <a href="#" class="d-flex justify-content-between mx-4 review" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          <div class="fs-6 mt-2">
            <?php if (isset($my_review)) { ?>
              <div>
                Your Comment: <span id="message"><?php echo $my_review['review_message'] ?></span>
              </div>
              <div>
                Your Rated: <span id="rating"><?php echo $my_review['review_rating'] ?></span>/5
              </div>
            <?php } ?>
          </div>
          <i class="mdi mdi-star-half-full fs-3">Review</i>
        </a>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form id="review">
              <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
              <input type="hidden" name="music_id" value="<?php echo $_GET['id'] ?>">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Write a review</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="d-flex justify-content-center">
                    <div class="ratingControl mb-2">
                      <input id="score100" class="ratingControl__radio" type="radio" name="rating" value="5.0" />
                      <label for="score100" class="ratingControl__star" title="Five Stars"></label>
                      <input id="score90" class="ratingControl__radio" type="radio" name="rating" value="4.5" />
                      <label for="score90" class="ratingControl__star" title="Four & Half Stars"></label>
                      <input id="score80" class="ratingControl__radio" type="radio" name="rating" value="4.0" />
                      <label for="score80" class="ratingControl__star" title="Four Stars"></label>
                      <input id="score70" class="ratingControl__radio" type="radio" name="rating" value="3.5" />
                      <label for="score70" class="ratingControl__star" title="Three & Half Stars"></label>
                      <input id="score60" class="ratingControl__radio" type="radio" name="rating" value="3.0" />
                      <label for="score60" class="ratingControl__star" title="Three Stars"></label>
                      <input id="score50" class="ratingControl__radio" type="radio" name="rating" value="2.5" />
                      <label for="score50" class="ratingControl__star" title="Two & Half Stars"></label>
                      <input id="score40" class="ratingControl__radio" type="radio" name="rating" value="2.0" />
                      <label for="score40" class="ratingControl__star" title="Two Stars"></label>
                      <input id="score30" class="ratingControl__radio" type="radio" name="rating" value="1.5" />
                      <label for="score30" class="ratingControl__star" title="One & Half Star"></label>
                      <input id="score20" class="ratingControl__radio" type="radio" name="rating" value="1.0" />
                      <label for="score20" class="ratingControl__star" title="One Star"></label>
                      <input id="score10" class="ratingControl__radio" type="radio" name="rating" value="0.5" />
                      <label for="score10" class="ratingControl__star" title="Half Star"></label>
                    </div>
                    <h4 id="rating-number"></h4>
                  </div>
                  <div class="input-group comment-box">
                    <span class="input-group-text">Your Comment</span>
                    <textarea type="text" class="form-control" name="message" value="<?php echo $my_review['review_message'] ?>" id="comment-txt"></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outlined-dark" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-warning">Send</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
  </div>
  </div>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/scripts_file.php' ?>
  <script>
    $(document).ready(function() {




      $('#review').submit(function(e) {
        event.preventDefault();

        let myUrl = 'http://<?php echo $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'] ?>/flow/sub-show/review_submit.php';
        let form = $(this);
        let serializedData = $(this).serialize();
        request = $.ajax({
          url: myUrl,
          type: "POST",
          data: serializedData
        });

        var createURL = new URL("http://www.example.com/a.html?" + serializedData);
        request.done(function() {
          $(".modal").modal().hide();
          myComment = createURL.searchParams.get('message');
          myRating = createURL.searchParams.get('rating');
          $('#message').text(myComment);
          $('#rating').text(myRating);
        });

        request.fail(function() {
          alert("Review didn't added");
        })
      })
    })
  </script>

</body>

</html>