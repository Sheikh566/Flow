<?php
include $_SERVER['DOCUMENT_ROOT'] . '/flow/helpers/database.php';
$db = new Database();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db->select('artists', '*', "artist_id = $id");
    $artist = mysqli_fetch_assoc($db->res);
    $db->select('albums', '*', "album_artist = $id ORDER BY album_year DESC");
    $albums = $db->res;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/file.php' ?>

    <style>
        .rounded-circle {
            height: 225px;
            margin: auto;
            display: block;
        }
    .photo>img {
      border: 5px solid #efefef;
    }
    .text{
        text-align: center;
    }

    .col-md-4{
        border: 1px solid black;
    }
    </style>
</head>

<body>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/nav.php' ?>
<div style="height: 100px;"></div>
    <div class="container my-5 p-10">
        <div class="row">
            <div class="col-12 col-md-4">
            <div class="photo m-3">
                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($artist['artist_photo']); ?>" class="rounded-circle" alt="Artist Photo" style="object-fit: cover;" />
                    <h2 class="text"><?php echo $artist['artist_name'] ?></h2>
                </div>

            </div>

            <div class="col-12 col-md-8">
            <h3 class="text-center mb-4">L A T E S T &nbsp; A L B U M S</h3>
            <section class="latest-albums-area" data-aos="fade-up" data-aos-duration="3000">
            <div class="albums-slideshow owl-carousel">

            <?php while ($row = mysqli_fetch_assoc($albums)) { ?>
                            <div class="single-album">
                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['album_thumbnail']); ?>" alt="Album Photo" style="height:170px" />
                                <div class="album-info">
                                    <a href="#">
                                        <h5 class="text-dark"><?php echo $row['album_title'] ?></h5>
                                    </a>
                                    <p><?php echo $row['album_year'] ?></p>
                                </div>
                            </div>
                        <?php } ?>
            </div>
            </section>

            <!----FOR MUSIC ----->
            <div>
            <h3 class="text-center mb-4">L A T E S T &nbsp; MUSIC</h3>
            </div>


            </div>

        </div>

        </div>

    </div>





    <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/footer.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/flow/components/scripts_file.php'
    ?>
</body>

</html>