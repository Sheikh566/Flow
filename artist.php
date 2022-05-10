<?php
include $_SERVER['DOCUMENT_ROOT'] . '/flow/helpers/database.php';
$db = new Database();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'components/file.php';
    ?>

    <style>
        .album-info {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Main aspect ratio of artist image*/
        .single-album>img {
            width: 100%;
            height: 100%;
            object-fit: contain;

        }

        .single-album-item {
            display: block;
            padding: 0;
            min-width: 250px;
        }

        @media screen and (max-width: 480px) {
            .single-album-item {
                display: block;
                padding: 5px;
                width: 90%;
            }
        }

        @media screen and (max-width: 768px) {
            .single-album-item {
                display: block;
                padding: 0;
                min-width: 150px;
            }
        }

    </style>
</head>

<body>
    <?php
    include 'components/nav.php';
    ?>

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(dist/img/bg-img/breadcumb2.jpg);">
        <div class="bradcumbContent">
            <h2>Artists</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->
    <section class="album-catagory section-padding-100-0">
        <div class="container">
            <div class="col-md-12">
                <div class="browse-by-catagories catagory-menu d-flex justify-content-center flex-wrap mb-70">
                    <a href="#" data-filter="*">Browse All</a>
                    <a href="#" data-filter=".a" class="active">A</a>
                    <a href="#" data-filter=".b">B</a>
                    <a href="#" data-filter=".c">C</a>
                    <a href="#" data-filter=".d">D</a>
                    <a href="#" data-filter=".e">E</a>
                    <a href="#" data-filter=".f">F</a>
                    <a href="#" data-filter=".g">G</a>
                    <a href="#" data-filter=".h">H</a>
                    <a href="#" data-filter=".i">I</a>
                    <a href="#" data-filter=".j">J</a>
                    <a href="#" data-filter=".k">K</a>
                    <a href="#" data-filter=".l">L</a>
                    <a href="#" data-filter=".m">M</a>
                    <a href="#" data-filter=".n">N</a>
                    <a href="#" data-filter=".o">O</a>
                    <a href="#" data-filter=".p">P</a>
                    <a href="#" data-filter=".q">Q</a>
                    <a href="#" data-filter=".r">R</a>
                    <a href="#" data-filter=".s">S</a>
                    <a href="#" data-filter=".t">T</a>
                    <a href="#" data-filter=".u">U</a>
                    <a href="#" data-filter=".v">V</a>
                    <a href="#" data-filter=".w">W</a>
                    <a href="#" data-filter=".x">X</a>
                    <a href="#" data-filter=".y">Y</a>
                    <a href="#" data-filter=".z">Z</a>
                    <a href="#" data-filter=".number">0-9</a>
                </div>
            </div>

            <div class="oneMusic-albums">
                <?php
                $db->select('artists', '*');
                while ($row = mysqli_fetch_assoc($db->res)) {
                    $firstLetters = ""; // Get first letter of each word of artist name
                    foreach (explode(' ', strtolower($row['artist_name'])) as $word) {
                        $firstLetters .= "$word[0] ";
                    }
                ?>
                    <a href="sub-show/artist_page.php?id=<?php echo $row['artist_id'] ?>" class="single-album-item ms-4 <?php echo $firstLetters ?>">
                        <div class="single-album">
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['artist_photo']); ?>" alt="Artist Photo" style="object-fit: cover; min-width: 200px; height: 200px;">
                            <div class="album-info">
                                <h5><?php echo $row['artist_name'] ?></h5>
                                <p>S E E &nbsp; A R T I S T</p>
                            </div>
                        </div>
                    </a>
                <?php } ?>

            </div>


        </div>
    </section>


    <?php
    include 'components/footer.php';
    include  'components/scripts_file.php';
    ?>
</body>

</html>