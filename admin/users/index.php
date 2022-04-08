<?php 
  include $_SERVER['DOCUMENT_ROOT'].'/flow/helpers/database.php';
  
  $db = new Database();
  $db->select('users', '*');
  $users = $db->res;

  if (isset($_GET['m'])) {
      $id = $_GET['id'];
      $db->delete('users', "user_id = $id");
      if ($db->res) {
          header('location:./');
      }
  }
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
                                                <th scope="col">Email</th>
                                                <th scope="col">Password</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            while ($row = mysqli_fetch_assoc($users)) {
                                          ?>
                                            <tr>
                                                <th scope="row"><?php echo $row['user_id'] ?></th>
                                                <td><?php echo $row['user_name'] ?></td>
                                                <td><?php echo $row['user_email'] ?></td>
                                                <td><?php echo $row['user_password'] ?></td>
                                                <td>
                                                    <a href="./edit.php?id=<?php echo $row['user_id'] ?>" class="text-info"><i class="mdi mdi-pencil"></i>Edit</a> |
                                                    <i class="mdi mdi-delete text-danger fst-normal" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['user_id']?>">Delete</i>  
                                                </td>
                                            </tr>
                                             <!-- Modal -->
                                             <div class="modal fade" id="exampleModal<?php echo $row['user_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Deleting user "<?php echo $row['user_name'] ?>"</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-danger" id="deleleBtn">
                                                                <a href="./?m=delete&id=<?php echo $row['user_id'] ?>" class="text-light">Delete</a>
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
    <?php include $_SERVER['DOCUMENT_ROOT'].'/flow/admin/components/footer.php' ?>
</body>
</html>