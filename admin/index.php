<?php
include $_SERVER['DOCUMENT_ROOT'] . '/flow/helpers/database.php';
$db = new Database();

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/admin/components/headtag.php' ?>
</head>

<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/admin/components/navbar.php' ?>

  <!-- Left Sidebar - style you can find in sidebar.scss  -->
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/admin/components/sidebar.php' ?>
  <!-- Page wrapper  -->
  <!-- ============================================================== -->
  <div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/admin/components/breadcrumb.php' ?>
    <div class="container-fluid">
      <!-- ============================================================== -->
      <!-- Sales chart -->
      <!-- ============================================================== -->
      <div class="row">
        
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Top Music</h4>
              <h6 class="card-subtitle">Highest Rated</h6>

              <?php 
                $db->selectJoin(
                  'music', 
                  'reviews', 
                  'music.*, avg(reviews.review_rating) as rating, artists.artist_name', 
                  'music.music_id = reviews.music_id join artists on artists.artist_id = music.music_artist', 
                  '1=1 GROUP by music.music_title ORDER BY rating DESC LIMIT 5'
              );
              while($row = mysqli_fetch_assoc($db->res)) {
              ?>
              <div class="py-3 d-flex align-items-center">
   
                  <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['music_thumbnail']); ?>" alt="Music Thumbnail" style="object-fit: cover; border-radius: 50%;" width="50px" height="50px">

                <div class="ms-3">
                  <h5 class="mb-0 fw-bold"><?php echo $row['music_title'] ?></h5>
                  <span class="text-muted fs-6"><?php echo $row['artist_name'] ?></span>
                </div>
                <div class="ms-auto">
                  <span class="badge bg-light text-muted">Rating: <?php echo number_format(round($row['rating'], 2), 2) ?></span>
                </div>
              </div>
                <?php } ?>
            </div>
          </div>
        </div>
    
     
 
        <!-- column -->
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Recent Music Comments</h4>
            </div>
            <div class="comment-widgets scrollable">
              <!-- Comment Row -->
              <?php
              $db->selectJoin(
                'reviews',
                'users',
                'reviews.*, users.*',
                'users.user_id = reviews.user_id',
                '1=1 ORDER BY reviews.review_datetime DESC LIMIT 3'
              );
              while ($row = mysqli_fetch_assoc($db->res)) {
              ?>
                <div class="d-flex flex-row comment-row m-t-0">
                  <div class="p-2"><img src="./assets/images/users/1.jpg" alt="user" width="50" style="object-fit: cover; border-radius: 50%;"></div>
                  <div class="comment-text w-100">
                    <h6 class="font-medium"><?php echo $row['user_name'] ?></h6>
                    <span class="m-b-15 d-block"><?php echo $row['review_message'] ?> </span>
                    <div class="comment-footer">
                      <span class="text-muted float-end"><?php echo $row['review_datetime'] ?></span> <span class="badge bg-primary">Pending</span> <span class="action-icons">
                        <a href="javascript:void(0)"><i class="ti-pencil-alt"></i></a>
                        <a href="javascript:void(0)"><i class="ti-check"></i></a>
                        <a href="javascript:void(0)"><i class="ti-heart"></i></a>
                      </span>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
       
    
      <!-- ============================================================== -->
      <!-- Recent comment and chats -->
      <!-- ============================================================== -->
    </div>

    </div>
    <!-- footer and scripts-->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/admin/components/footer.php' ?>
</body>

</html>