<?php 
  include $_SERVER['DOCUMENT_ROOT'].'/flow/helpers/database.php';
  
  $db = new Database();
  $db->select('music', '*');
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
    </div>
    
    <!-- footer and scripts-->
    <?php include $_SERVER['DOCUMENT_ROOT'].'/flow/admin/components/footer.php' ?>
</body>
</html>