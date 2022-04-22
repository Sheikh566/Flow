<?php
include $_SERVER['DOCUMENT_ROOT'] . '/flow/helpers/database.php';
$db = new Database();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include 'components/file.php';
  ?>
</head>

<body>
  <?php
  include 'components/nav.php';
  ?>

  
  <?php
  include 'components/footer.php';
  include  'components/scripts_file.php';
  ?>
</body>

</html>