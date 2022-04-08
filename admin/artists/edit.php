<?php
include $_SERVER['DOCUMENT_ROOT'] . '/flow/helpers/database.php';

$db = new Database();
if (isset($_GET['id']))
{
  $id = $_GET['id'];
  $db->select('artists', 'artist_name', "artist_id = $id");
  $artist = mysqli_fetch_assoc($db->res);

} else {
  header('location:./');
}
if (isset($_POST['submit'])) {
  $name = '"'.$_POST['name'].'"';

  // Append photo col. if photo is given in FORM
  $cols = ['artist_name' => $name];
  if (file_exists($_FILES['photo']['tmp_name'])) {
    $image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
    $cols = array_merge($cols, ['artist_photo' => '"'.$image.'"']);
  }

  $db->update('artists', $cols, "artist_id = $id");
  if ($db->res) {
    header('location:./index.php');
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
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body p-5">
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="name" class="form-control" name="name" value="<?php echo $artist['artist_name'] ?>" aria-describedby="Name">
                </div>
                <div class="mb-3">
                  <label for="photo" class="form-label">Photo</label>
                  <input type="file" class="form-control" name="photo" aria-describedby="Photo" accept="image/*">
                  <span class="fs-6">Note: Leave empty if you don't need to update photo</span>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- footer -->
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/flow/admin/components/footer.php' ?>
  <script>
    $('ol.breadcrumb').append('<li class="breadcrumb-item">Edit</li>')
  </script>
</body>

</html>