<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
include $_SERVER['DOCUMENT_ROOT'] . '/flow/helpers/database.php';$db = new Database();
$db = new Database();

if (isset($_POST['rating'])) {
  $review['review_rating'] = (float) $_POST['rating'];
  $review['review_message'] = $_POST['message'];
  $review['music_id'] = $_POST['music_id'];
  $review['user_id'] = $_POST['user_id'];
  $review['review_datetime'] =$_POST['datetime'];
  
  $db->select('reviews', 'review_id', "`music_id` = ". $review['music_id']. " AND `user_id` = ". $review['user_id'] );

  if (mysqli_num_rows($db->res) > 0) {
    $review_id = mysqli_fetch_assoc($db->res)['review_id'];
    Helper::consoleLog($review_id);
    foreach ($review as $col => $val) {
      $review[$col] = '"'.$val.'"';
    }
    $db->update('reviews', $review, "review_id = $review_id");

  } else {
  $db->insert('reviews', $review);
  if ($db->res) {
    echo "Sucessfully added review";
  }
}
}

?>
