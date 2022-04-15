<?php
include $_SERVER['DOCUMENT_ROOT'] . '/flow/helpers/database.php';
$db = new Database();
$db->select('artists', "artist_id, artist_name");
$artist_options = $db->res;

$db = new Database();
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $db->select('albums', '*', "album_id = $id");
  $album = mysqli_fetch_assoc($db->res);
} else {
  header('location:./');
}
if (isset($_POST['submit'])) {
  $title = '"' . $_POST['title'] . '"';
  $year = '"' . $_POST['year'] . '"';
  $artist = '"' . $_POST['artist'] . '"';

  // Append photo col. if photo is given in FORM
  $cols = ['album_title' => $title, 'album_year' => $year, 'album_artist' => $artist];
  if (file_exists($_FILES['thumbnail']['tmp_name'])) {
    $image = addslashes(file_get_contents($_FILES['thumbnail']['tmp_name']));
    $cols = array_merge($cols, ['album_thumbnail' => '"' . $image . '"']);
  }

  $db->update('albums', $cols, "album_id = $id");
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
                  <input type="text" class="form-control" name="title" aria-describedby="Name" value="<?php echo $album['album_title'] ?>" required>
                </div>
                <div class="mb-3">
                  <label for="artist" class="form-label">Artist</label>
                  <select id='artist' name="artist" class="form-select shadow-none form-control-line" required>
                    <?php while ($row = mysqli_fetch_assoc($artist_options)) { ?>
                      <option value="<?php echo $row['artist_id'] ?>"><?php echo $row['artist_name'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="year" class="form-label">Year</label>
                  <input type="number" min="1900" max="<?php echo date("Y") + 1; ?>" class="form-control" name="year" aria-describedby="Name" value="<?php echo $album['album_year'] ?>" required>
                </div>
                <div class="mb-3">
                  <label for="photo" class="form-label">Thumbnail</label>
                  <input type="file" class="form-control" name="thumbnail" aria-describedby="Photo">
                  <span class="fs-6">Note: Leave empty if you don't need to update thumbnail</span>
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
    $('ol.breadcrumb').append('<li class="breadcrumb-item">Create</li>');
    // Selects original option
    $("select#artist option[value=<?php echo $album['album_artist'] ?>]").prop("selected", true);
  </script>
</body>

</html>