<?php 
  include $_SERVER['DOCUMENT_ROOT'].'/flow/helpers/database.php';
  
  $db = new Database();
  $db->selectJoin('music', 'artists', "music.*, artists.artist_name", "music.music_artist = artists.artist_id");
  $music = $db->res;
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
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/admin/components/breadcrumb.php' ?>
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
                                            <th scope="col">Title</th>
                                            <th scope="col">Artist</th>
                                            <th scope="col">Album</th>
                                            <th scope="col">Year</th>
                                            <th scope="col">Language</th>
                                            <th scope="col">Format</th>
                                            <th scope="col">Path</th>
                                            <th scope="col">Thumbnail</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_assoc($music)) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $row['music_id'] ?></th>
                                                <td><?php echo $row['music_title'] ?></td>
                                                <td><?php echo $row['artist_name'] ?></td>
                                                <td><?php echo $row['music_album'] ?></td>
                                                <td><?php echo $row['music_year'] ?></td>
                                                <td><?php echo $row['music_language'] ?></td>
                                                <td><?php echo $row['music_format'] ?></td>
                                                <td><?php echo $row['music_path'] ?></td>
                                                <td><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['music_thumbnail']); ?>" class="rounded-circle" width="150px"></td>
                                                <td>
                                                    <a href="./edit.php?id=<?php echo $row['music_id'] ?>" class="text-info"><i class="mdi mdi-pencil"></i>Edit</a> |
                                                    <i class="mdi mdi-delete text-danger fst-normal" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['music_id']?>">Delete</i>        
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?php echo $row['music_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Deleting Music "<?php echo $row['music_title'] ?>"</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-danger" id="deleleBtn">
                                                                <a href="./?m=delete&id=<?php echo $row['admin_id'] ?>" class="text-light">Delete</a>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

    <!-- footer and scripts-->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/admin/components/footer.php' ?>
    <script>
        $('#deleteBtn').click(function() {
            $(this).children('a').click();
        })
    </script>
</body>
</html>