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
        .single-album > img {
            width: 250px;
            height: 250px;
            object-fit: cover;
        }
        
        @media screen and (max-width: 768px) {
            .single-album-item {
                display: block;
                padding: 0;
                min-width: 150px;
            }
            .single-album > img {
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


        /* @media screen and (max-width: 1440px) {
            .single-album-item {
                display: block;
                padding: 10px;
                width: 10
            }
        } */

     
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
                            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['artist_photo']); ?>" alt="Artist Photo" >
                            <div class="album-info">
                                <h5 class="artist-name"><?php echo $row['artist_name'] ?></h5>
                                <p class="see-artist">S E E &nbsp; A R T I S T</p>
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