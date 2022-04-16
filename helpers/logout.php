<?php 
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  session_destroy();
  if (isset($_GET['lastPage'])) {
    header('location:'.$_GET['lastPage']);
  } else {
    header("location:http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT']."/flow");
  }
?>