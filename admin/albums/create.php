<?php
include $_SERVER['DOCUMENT_ROOT'] . '/flow/helpers/database.php';

$db = new Database();
$db->select('artists', "artist_id, artist_name");
$artist_options = $db->res;

if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $year = $_POST['year'];
  $artist_id = $_POST['artist'];
  $thumbnail = addslashes(file_get_contents($_FILES['thumbnail']['tmp_name']));
  $db->insert('albums', [
    'album_title' => $title, 
    'album_year' => $year, 
    'album_artist' => $artist_id, 
    'album_thumbnail' => $thumbnail, 
  ]);
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
                  <label for="title" class="form-label">Title</label>
                  <input type="text" class="form-control" name="title" aria-describedby="Name" required>
                </div>
                <div class="mb-3">
                  <label for="artist" class="form-label">Artist</label>
                    <select name="artist" class="form-select shadow-none form-control-line" required>
                    <option disabled selected value> -- select the artist -- </option>
                      <?php while($row = mysqli_fetch_assoc($artist_options)) {?>
                        <option value="<?php echo $row['artist_id'] ?>"><?php echo $row['artist_name'] ?></option>
                      <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                  <label for="year" class="form-label">Year</label>
                  <input type="number" min="1900" max="<?php echo date("Y")+1; ?>" class="form-control" name="year" aria-describedby="Name" required>
                </div>
                <div class="mb-3">
                  <label for="thumbnail" class="form-label">Thumbnail</label>
                  <input type="file" class="form-control" name="thumbnail" aria-describedby="Photo">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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
    $('ol.breadcrumb').append('<li class="breadcrumb-item">Create</li>')
  </script>
</body>

</html>