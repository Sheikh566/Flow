<?php
include $_SERVER['DOCUMENT_ROOT'] . '/flow/helpers/database.php';
$db = new Database();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $db->select('music', '*', "music_id = $id");
  $music = mysqli_fetch_assoc($db->res);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/file.php' ?>

  <style>
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
  </style>
</head>

<body>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/nav.php' ?>


  <div class="container">
    <div class="music-player">
      <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($music['music_thumbnail']); ?>" alt="music-icon" id="music-icon">
      <div class="info">
        <h1><?php echo $music['music_title']; ?></h1>
        <h3><?php echo $music['music_artist']; ?></h3>
        <audio controls>
          <source src="../<?php echo $music['music_path']; ?>">
        </audio>

      </div>
    </div>
  </div>




  <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/scripts_file.php'
  ?>


</body>

</html>