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

    <!-- ##### Events Area Start ##### -->
    <section class="events-area section-padding-100">
        <div class="container">
            <div class="row">
            
                <?php
                foreach(range('A', 'Z') as $alpha) {
                    $db->select('artists', 'artist_name, artist_photo', "artist_name LIKE '$alpha%' ORDER BY artist_name");
                    if (mysqli_num_rows($db->res) > 0) echo "<h1>$alpha</h1>";
                    while ($row = mysqli_fetch_assoc($db->res)) {
                
                ?>
                    
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="single-event-area mb-30">
                            <div class="event-thumbnail">
                                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['artist_photo']); ?>" alt="artists_photos" style="object-fit: cover" height="150px" width="150px"">
                            </div>
                            <div class="event-text">
                                <h4><?php echo $row["artist_name"]; ?></h4>
                                <a href="#" class="btn see-more-btn">&nbsp;Listen</a>
                            </div>
                        </div>
                    </div>
                <?php
                } }
                ?>
            </div>
        </div>
    </section>


    <?php
    include 'components/footer.php';
    include  'components/scripts_file.php';
    ?>
</body>

</html>