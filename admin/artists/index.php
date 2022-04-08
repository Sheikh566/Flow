<?php
include $_SERVER['DOCUMENT_ROOT'] . '/flow/helpers/database.php';

$db = new Database();
$db->select('artists', '*');
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/admin/components/headtag.php' ?>
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/admin/components/navbar.php' ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/admin/components/sidebar.php' ?>

    <div class="page-wrapper">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/admin/components/breadcrumb.php' ?>
        <div class="container-fluid py-0">
            <div class="d-flex row">
                <!-- Column -->
                <?php while ($row = mysqli_fetch_assoc($db->res)) { ?>
                    <div class="col-lg-2 col-xlg-3">
                        <div class="card py-0">
                            <div class="card-body py-0">
                                <center class="m-t-30">
                                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['artist_photo']); ?>" class="rounded-circle" width="150px">
                                    <h4 class="card-title m-t-10" ><?php echo $row['artist_name'] ?></h4>
                                </center>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    </div>

    <!-- footer and scripts-->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/admin/components/footer.php' ?>
</body>

</html>