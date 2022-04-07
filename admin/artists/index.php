<?php 
  include $_SERVER['DOCUMENT_ROOT'].'/flow/helpers/database.php';
  
  $db = new Database();
  $db->select('artists', '*');
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/flow/admin/components/headtag.php' ?>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/flow/admin/components/navbar.php' ?>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/flow/admin/components/sidebar.php' ?>

    <div class="page-wrapper">
      <?php include $_SERVER['DOCUMENT_ROOT'].'/flow/admin/components/breadcrumb.php' ?>
      <div class="container-fluid py-0">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body p-0">
                            <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Photo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            while ($row = mysqli_fetch_assoc($db->res)) {
                                          ?>
                                            <tr>
                                                <th scope="row"><?php echo $row['artist_id'] ?></th>
                                                <td><?php echo $row['artist_name'] ?></td>
                                                <td><?php echo $row['artist_email'] ?></td>
                                                <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['artist_photo']); ?>" alt=""></td>
                                            </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    
    <!-- footer and scripts-->
    <?php include $_SERVER['DOCUMENT_ROOT'].'/flow/admin/components/footer.php' ?>
</body>
</html>