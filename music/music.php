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
      <style>
            .container-fluid {
                  padding: 0px !important;
                  margin: 0px !important;
            }

            #special .card-container {
                  width: 90%;
                  margin: 2rem auto;
                  display: -webkit-box;
                  display: -ms-flexbox;
                  display: flex;
                  -webkit-box-align: center;
                  -ms-flex-align: center;
                  align-items: center;
                  -ms-flex-pack: distribute;
                  justify-content: space-around;
                  -ms-flex-wrap: wrap;
                  flex-wrap: wrap;
            }

            #special .card-container .card {
                  height: 25rem;
                  width: 20rem;
                  background: #f8c146;
                  padding: 1rem;
                  margin: 2rem;
                  text-align: center;
                  transition: 0.6s all ease-in-out;
            }


      #special .card-container .card img{
            height: 180px ;
      }

            #special .card-container .card p {
                  font-size: 1rem;
                  margin-bottom: 4px;
            }

            #special .card-container .card h2 {
                  font-size: 1.5rem;
                  font-weight: bold;
                  margin: 0;
                  margin-top: 20px;
            }


            #special .card-container .card button {
                  outline: none;
                  border: none;
                  border-radius: 5rem;
                  color: black;
                  font-size: 1.6rem;
                  font-weight: bold;
                  margin-bottom: 10rem;
                  text-transform: capitalize;
                  letter-spacing: .2rem;
                  cursor: pointer;
                  position: relative;
                  z-index: 1;
                  overflow: hidden;
                  height: 3.5rem;
                  width: 14rem;
                  background: rgb(0, 0, 0);
                  color: rgba(246, 255, 0, 0.866);
                  margin-top: 5px;
            }

            #special .card-container .card button .btn {

                  padding-bottom: 2rem;
                  margin-left: 2rem;


            }

            #special .card-container .card button::before {
                  content: '';
                  position: absolute;
                  top: 0;
                  left: 0;
                  background: black;
                  height: 100%;
                  width: 0%;
                  -webkit-transition: .2s;
                  transition: .2s;
                  z-index: -1;
            }

            #special .card-container .card button:hover::before {
                  width: 100%;
            }

            #special .card-container .card button:hover {
                  color: #333;
            }

            #special .card-container .card:hover {
                  -webkit-transform: scale(0.9);
                  transform: scale(0.9);
            }
      </style>
</head>

<body>

      <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/nav.php' ?>

      <!-- ##### Breadcumb Area Start ##### -->
      <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(../dist/img/bg-img/simmon.jpg);">
            <div class="bradcumbContent">
                  <h2>All Songs</h2>
            </div>
      </section>

      <section id="special" class="container-fluid">
            <h1 class="mt-5 text-center">REGIONAL SONGS</h1>
            <hr>
            <div class="card-container">
                  <?php
                    $db->selectJoin('music','artists', 'music.*, artists.artist_name', "artists.artist_id = music.music_artist","music.music_language = 'REGIONAL'");

                  while ($row = mysqli_fetch_assoc($db->res)) {
                  ?>
                        <div class="card">
                              <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['music_thumbnail']); ?>" alt="Music Thumbnail" style="object-fit: cover">
                              <h2><?php echo $row['music_title'] ?></h2>
                              <p><?php echo $row['artist_name'] ?></p>
                              <a href="../sub-show/music-info.php?id=<?php echo $row['music_id'] ?>"><button class="btn">Play</button></a>
                        </div>
                  <?php } ?>

            </div>

      </section>


      <section id="special" class="container-fluid">
            <h1 class="mt-5 text-center">ENGLISH SONGS</h1>
            <hr>
            <div class="card-container">
                  <?php
$db->selectJoin('music','artists', 'music.*, artists.artist_name', "artists.artist_id = music.music_artist","music.music_language = 'ENGLISH'");

                  while ($row = mysqli_fetch_assoc($db->res)) {
                  ?>
                        <div class="card">
                              <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['music_thumbnail']); ?>" alt="Music Thumbnail" style="object-fit: cover">
                              <h2><?php echo $row['music_title'] ?></h2>
                              <p><?php echo $row['artist_name'] ?></p>
                              <a href="../sub-show/music-info.php?id=<?php echo $row['music_id'] ?>"><button class="btn">View</button></a>
                        </div>
                  <?php } ?>

            </div>

      </section>



      <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/footer.php';
      include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/scripts_file.php'
      ?>
</body>

</html>