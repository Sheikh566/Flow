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
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <div class="d-md-flex align-items-center">
                <div>
                  <h4 class="card-title">Sales Summary</h4>
                  <h6 class="card-subtitle">Ample admin Vs Pixel admin</h6>
                </div>
                <div class="ms-auto d-flex no-block align-items-center">
                  <ul class="list-inline dl d-flex align-items-center m-r-15 m-b-0">
                    <li class="list-inline-item d-flex align-items-center text-info"><i class="fa fa-circle font-10 me-1"></i> Ample
                    </li>
                    <li class="list-inline-item d-flex align-items-center text-primary"><i class="fa fa-circle font-10 me-1"></i> Pixel
                    </li>
                  </ul>
                </div>
              </div>
              <div class="amp-pxl mt-4" style="height: 350px;">
                <div class="chartist-tooltip"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
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
      </div>
      <!-- ============================================================== -->
      <!-- Sales chart -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Table -->
      <!-- ============================================================== -->
      <div class="row">
        <!-- column -->
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <!-- title -->
              <div class="d-md-flex">
                <div>
                  <h4 class="card-title">Top Selling Products</h4>
                  <h5 class="card-subtitle">Overview of Top Selling Items</h5>
                </div>
                <div class="ms-auto">
                  <div class="dl">
                    <select class="form-select shadow-none">
                      <option value="0" selected>Monthly</option>
                      <option value="1">Daily</option>
                      <option value="2">Weekly</option>
                      <option value="3">Yearly</option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- title -->
              <div class="table-responsive">
                <table class="table mb-0 table-hover align-middle text-nowrap">
                  <thead>
                    <tr>
                      <th class="border-top-0">Products</th>
                      <th class="border-top-0">License</th>
                      <th class="border-top-0">Support Agent</th>
                      <th class="border-top-0">Technology</th>
                      <th class="border-top-0">Tickets</th>
                      <th class="border-top-0">Sales</th>
                      <th class="border-top-0">Earnings</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="m-r-10"><a class="btn btn-circle d-flex btn-info text-white">EA</a>
                          </div>
                          <div class="">
                            <h4 class="m-b-0 font-16">Elite Admin</h4>
                          </div>
                        </div>
                      </td>
                      <td>Single Use</td>
                      <td>John Doe</td>
                      <td>
                        <label class="badge bg-danger">Angular</label>
                      </td>
                      <td>46</td>
                      <td>356</td>
                      <td>
                        <h5 class="m-b-0">$2850.06</h5>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="m-r-10"><a class="btn btn-circle d-flex btn-orange text-white">MA</a>
                          </div>
                          <div class="">
                            <h4 class="m-b-0 font-16">Monster Admin</h4>
                          </div>
                        </div>
                      </td>
                      <td>Single Use</td>
                      <td>Venessa Fern</td>
                      <td>
                        <label class="badge bg-info">Vue Js</label>
                      </td>
                      <td>46</td>
                      <td>356</td>
                      <td>
                        <h5 class="m-b-0">$2850.06</h5>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="m-r-10"><a class="btn btn-circle d-flex btn-success text-white">MP</a>
                          </div>
                          <div class="">
                            <h4 class="m-b-0 font-16">Material Pro Admin</h4>
                          </div>
                        </div>
                      </td>
                      <td>Single Use</td>
                      <td>John Doe</td>
                      <td>
                        <label class="badge bg-success">Bootstrap</label>
                      </td>
                      <td>46</td>
                      <td>356</td>
                      <td>
                        <h5 class="m-b-0">$2850.06</h5>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <div class="m-r-10"><a class="btn btn-circle d-flex btn-purple text-white">AA</a>
                          </div>
                          <div class="">
                            <h4 class="m-b-0 font-16">Ample Admin</h4>
                          </div>
                        </div>
                      </td>
                      <td>Single Use</td>
                      <td>John Doe</td>
                      <td>
                        <label class="badge bg-purple">React</label>
                      </td>
                      <td>46</td>
                      <td>356</td>
                      <td>
                        <h5 class="m-b-0">$2850.06</h5>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- Table -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Recent comment and chats -->
      <!-- ============================================================== -->
      <div class="row">
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
        <!-- column -->
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Temp Guide</h4>
              <div class="d-flex align-items-center flex-row m-t-30">
                <div class="display-5 text-info"><i class="wi wi-day-showers"></i>
                  <span>30<sup>°</sup></span>
                </div>
                <div class="m-l-10">
                  <h3 class="m-b-0">Friday</h3><small>Karachi, Pakistam</small>
                </div>
              </div>
              <table class="table no-border mini-table m-t-20">
                <tbody>
                  <tr>
                    <td class="text-muted">Wind</td>
                    <td class="font-medium">ESE 17 mph</td>
                  </tr>
                  <tr>
                    <td class="text-muted">Humidity</td>
                    <td class="font-medium">83%</td>
                  </tr>
                  <tr>
                    <td class="text-muted">Pressure</td>
                    <td class="font-medium">28.56 in</td>
                  </tr>
                  <tr>
                    <td class="text-muted">Cloud Cover</td>
                    <td class="font-medium">78%</td>
                  </tr>
                </tbody>
              </table>
              <ul class="row list-style-none text-center m-t-30">
                <li class="col-3">
                  <h4 class="text-info"><i class="wi wi-day-sunny"></i></h4>
                  <span class="d-block text-muted">09:30</span>
                  <h3 class="m-t-5">29<sup>°</sup></h3>
                </li>
                <li class="col-3">
                  <h4 class="text-info"><i class="wi wi-day-cloudy"></i></h4>
                  <span class="d-block text-muted">11:30</span>
                  <h3 class="m-t-5">32<sup>°</sup></h3>
                </li>
                <li class="col-3">
                  <h4 class="text-info"><i class="wi wi-day-hail"></i></h4>
                  <span class="d-block text-muted">13:30</span>
                  <h3 class="m-t-5">36<sup>°</sup></h3>
                </li>
                <li class="col-3">
                  <h4 class="text-info"><i class="wi wi-day-sprinkle"></i></h4>
                  <span class="d-block text-muted">15:30</span>
                  <h3 class="m-t-5">34<sup>°</sup></h3>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- ============================================================== -->
      <!-- Recent comment and chats -->
      <!-- ============================================================== -->
    </div>
    <!-- footer and scripts-->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/admin/components/footer.php' ?>
</body>

</html>