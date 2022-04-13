<?php
include $_SERVER['DOCUMENT_ROOT'] . '/flow/helpers/database.php';

$db = new Database();
$db->select('artists', '*');
$artists = $db->res;
if (isset($_GET['m'])) {
    $id = $_GET['id'];
    $db->delete('artists', "artist_id = $id");
    if ($db->res) {
        header('location:./');
    }
}
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
                <?php while ($row = mysqli_fetch_assoc($artists)) { ?>
                    <div class="col-lg-2 col-xlg-3 mx-3" style="min-width: 210px">
                        <div class="card py-0" style="min-width: 210px">
                            <div class="card-header py-0 px-2 d-flex justify-content-between">
                                <div>ArtistID: <?php echo $row['artist_id'] ?></div>
                                <div>
                                    <a href="./edit.php?id=<?php echo $row['artist_id'] ?>"><i class="mdi mdi-pencil text-info"></i></a> |
                                    <i class="mdi mdi-delete text-danger" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['artist_id'] ?>"></i>
                                </div>

                            </div>
                            <div class="card-body py-0">
                                <div class="m-t-30">
                                    <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['artist_photo']); ?>" class="rounded-circle" width="150px">
                                    <h4 class="card-title m-t-10"><?php echo $row['artist_name'] ?></h4>
    
                                    
                                </div>
                                <div>
                                        <span>Release: <span class="badge rounded-pill bg-success fs-6">2021</span></span><br>
                                        <span class="badge rounded-pill bg-dark my-2 fs-6">Chahat Fateh Ali Khan</span>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?php echo $row['artist_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Deleting artist "<?php echo $row['artist_name'] ?>"</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-danger" id="deleleBtn">
                                        <a href="./?m=delete&id=<?php echo $row['artist_id'] ?>" class="text-light">Delete</a>
                                    </button>
                                </div>
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