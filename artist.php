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

                <!-- Single Event Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-event-area mb-30">
                        <div class="event-thumbnail">
                            <img src="img/bg-img/e1.jpg" alt="">
                        </div>
                        <div class="event-text">
                            <h4>Dj Night Party</h4>
                            <div class="event-meta-data">
                                <a href="#" class="event-place">VIP Sala</a>
                                <a href="#" class="event-date">June 15, 2018</a>
                            </div>
                            <a href="#" class="btn see-more-btn">See Event</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>


    <?php
         include 'components/footer.php';
         include  'components/scripts_file.php';
    ?>
    </body>

</html>