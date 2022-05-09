<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
include $_SERVER['DOCUMENT_ROOT'] . '/flow/helpers/database.php';
if (!isset($_SESSION['user'])) {
  header("location:http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/flow/login.php");
}
$db = new Database();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $db->selectJoin('music','artists', 'music.*, artists.artist_name', "artists.artist_id = music.music_artist","music_id = $id");
  $music = mysqli_fetch_assoc($db->res);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/file.php' ?>

  <style>
    body {
      background: rgb(2,0,36);
background-image: linear-gradient(140deg, rgba(2,0,36,1) 0%, rgba(3,3,8,1) 40%, rgba(31,75,84,1) 100%);
    }
    .container {
      font-family: 'Quicksand', sans-serif;
    }

    .music-player {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: #fff;
      width: 70%;
      height: 340px;
      border-radius: 15px;
      padding: 10px 18px;
      box-shadow: 0px 17px 118px -37px rgb(0, 0, 0, 0.9);
      display: flex;
      align-items: center;
      
    }
    .music-player::before {
      box-shadow: inset 0 0 2000px rgba(255, 255, 255, .5);
  filter: blur(10px);
    }
    #music-icon {
      height: 150px;
      width: 150px;
      border-radius: 50%;
    }

    .info {
      margin-left: 40px;
      width: 100%;
    }

    .info h3 {
      margin-bottom: 10px;
    }

   .music-player img{
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
  </style>
</head>

<body>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/nav.php' ?>


  <div class="container">
    <div class="music-player">
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($music['music_thumbnail']); ?>" alt="music-icon" id="music-icon">
      <div class="info">
        <h1><?php echo $music['music_title']; ?></h1>
        <h3><?php echo $music['artist_name']; ?></h3>
        <audio controls>
          <source src="../<?php echo $music['music_path']; ?>">
        </audio>
        <a href="#" class="d-flex justify-content-end mx-4 review" >
          <i class="mdi mdi-star-half-full fs-3">Review</i>
        </a>
        
      </div>
    </div>
  </div>




  <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/scripts_file.php'
  ?>


</body>

</html>