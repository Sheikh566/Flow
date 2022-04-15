<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/flow/helpers/database.php';
$db = new Database();

// dropdown options fetch
$db->select('albums', "album_id, album_title");
$album_options = $db->res;
$db->select('artists', "artist_id, artist_name");
$artist_options = $db->res;

if (isset($_POST['submit'])) {
  $title = $_POST['title'];
  $album_id = $_POST['album'];
  $artist_id = $_POST['artist'];
  $year = $_POST['year'];
  $language = $_POST['language'];
  $format = $_POST['format'];
  $fileName = $_FILES['music_file']['name'];
  $fileTmp = $_FILES['music_file']['tmp_name'];
  $path = '/uploads/'.strtolower($format)."/".$fileName;
  $thumbnail = addslashes(file_get_contents($_FILES['thumbnail']['tmp_name']));

  $db->insert('music', [
    'music_title' => $title,
    'music_album' => $album_id,
    'music_artist' => $artist_id,
    'music_year' => $year,
    'music_language' => $language,
    'music_format' => $format,
    'music_path' => $path,
    'music_thumbnail' => $thumbnail
  ]);
  if ($db->res) {
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/flow/uploads/';
    move_uploaded_file($fileTmp, $uploadDir.strtolower($format)."/".$fileName);
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
                  <label for="album" class="form-label">Album</label>
                    <select name="album" class="form-select shadow-none form-control-line" required>
                      <option disabled selected value> -- select the album -- </option>
                      <option value="None">None</option>
                      <?php while($row = mysqli_fetch_assoc($album_options)) {?>
                        <option value="<?php echo $row['album_id'] ?>"><?php echo $row['album_title'] ?></option>
                      <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                  <label for="year" class="form-label">Year</label>
                  <input type="number" min="1900" max="<?php echo date("Y")+1; ?>" class="form-control" name="year" aria-describedby="Name" required>
                </div>
                <div class="mb-3">
                  <label for="language" class="form-label">Language</label>
                    <select name="language" class="form-select shadow-none form-control-line" required>
                    <option disabled selected value> -- select the language -- </option>
                    <option value="None">None</option>
                    <option value="REGIONAL">REGIONAL</option>
                    <option value="ENGLISH">ENGLISH</option>
                    </select>
                </div>
                <div class="mb-3">
                  <label for="format" class="form-label">Format</label>
                    <select name="format" class="form-select shadow-none form-control-line" required>
                      <option disabled selected value> -- select the format -- </option>
                      <option value="AUDIO">AUDIO</option>
                      <option value="VIDEO">VIDEO</option>
                    </select>
                </div>
                <div class="mb-3">
                  <label for="music_file" class="form-label">Music File</label>
                  <input type="file" class="form-control" name="music_file" aria-describedby="music file" accept=".mp3,.mp4">
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